<?php
namespace App\Repositories;

use App\Models\People;
use App\Models\ReliefCard;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReliefCardRepository
{
    private $model;
    private $wardRepository;
    private $peopleRepository;
    private $reliefCategoryRepository;

    public function __construct(ReliefCard $model, WardRepository $wardRepository,PeopleRepository $peopleRepository, ReliefCategoryRepository $reliefCategoryRepository )
    {
        $this->model = $model;
        $this->wardRepository = $wardRepository;
        $this->peopleRepository = $peopleRepository;
        $this->reliefCategoryRepository = $reliefCategoryRepository;
    }
    public function all()
    {
        return $this->model->paginate(10);
    }
    public function search($request)
    {
//        if ($request->has('search') && $request->get('search')) {
//            $search = $request->get('search');
////            $data = ReliefCard::whereHas('wards', function ($query) use ($search) {
////                $query->where('number', 'like', "%$search%")->orderBy('number', 'ASC')
////                    ->orwhere('name', 'LIKE',"%$search%" );
////
////            })->where('status','=', true)->paginate(10);
//
//            $data = $this->model
//                ->where('card_number', 'LIKE', "%$search%")
//                ->orderBy('card_number', 'ASC')
//                ->paginate($request->get('per_page') ? $request->get('per_page') : 10);
////              ->paginate(5);
//
//            return $data->appends(array('search' => $search));
//        }
//        if ($request->has('search') && $request->get('search') || $request->has('ward_id') && $request->get('ward_id')) {
//            $search =$request->get('search');
//            $ward_id =$request->get('ward_id');
//
//            $data = $this->model->where('ward_id', $ward_id)
//                ->where('card_number', 'LIKE', "%$search%")
//                ->paginate($request->get('per_page') ? $request->get('per_page') : 10);
//            return $data->appends(array('ward_id' => $ward_id, 'search' => $search));
//        }
        if ($request->has('search') && $request->get('search')) {
            $search =$request->get('search');

            $data = $this->model->where('card_number', 'LIKE', "%$search%")
                ->paginate ($request->get('per_page') ? $request->get('per_page') : 10);
            return $data->appends(array('search' => $search));
        }
        return $this->all();
    }


    public function create($request): bool
    {
        if ($request->has('card_number') && $request->get('card_number')) {
            $this->model->card_number = $request->card_number;
        }
        if ($request->has('ward_id') && $request->get('ward_id')) {
            $this->model->ward_id = $request->ward_id;
        }
        if ($request->has('people_id') && $request->get('people_id')) {
            $this->model->people_id = $request->people_id;
        }
        if ($request->has('category_id') && $request->get('category_id')) {
            $this->model->category_id = $request->category_id;
        }

        return $this->model->save();

    }
    public function update($request, $slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Relief Card Not Found');
        }
        if ($request->has('card_number') && $request->get('card_number')) {
            $item->card_number = $request->card_number;
        }
        if ($request->has('ward_id') && $request->get('ward_id')) {
            $item->ward_id = $request->ward_id;
        }
        if ($request->has('people_id') && $request->get('people_id')) {
            $item->people_id = $request->people_id;
        }
        if ($request->has('category_id') && $request->get('category_id')) {
            $item->category_id = $request->category_id;
        }

        return $item->save();
    }

    public function delete($slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Relief Card Not Found');
        }

        return $item->delete();
    }

    public function get($slug)
    {

        $item = $this->model->findBySlug($slug);
        if (!$item) {
            throw new NotFoundHttpException('Relief Card Not Found');
        }
        return $item;
    }

    public function getAllWards()
    {
        return $this->wardRepository->all();
    }

    public function getAllReliefCategories()
    {
        return $this->reliefCategoryRepository->all();
    }

    public function getAllPeople()
    {
        return $this->peopleRepository->getAllPeople();
    }




}

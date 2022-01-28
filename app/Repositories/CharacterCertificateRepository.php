<?php
namespace App\Repositories;

use App\Models\CharacterCertificate;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CharacterCertificateRepository
{
    private $model;
    private $peopleRepository;
//    private $wardRepository;
    public function __construct(CharacterCertificate  $model, PeopleRepository $peopleRepository)
    {
        $this->model = $model;
        $this->peopleRepository = $peopleRepository;
//        $this->wardRepository = $wardRepository;
    }
    public function all()
    {
        return $this->model->paginate(10);
    }
    public function search($request)
    {
        if ($request->has('search') && $request->get('search')) {
            $search = $request->get('search');
            $data = $this->model
                ->where('serial', 'LIKE', "%$search%")
                ->orderBy('serial', 'ASC')
                ->paginate($request->get('per_page') ? $request->get('per_page') : 10);
//              ->paginate(5);serial

            return $data->appends(array('search' => $search));
        }
        return $this->all();
    }

    public function create($request): bool
    {
        if ($request->has('serial') && $request->get('serial')){
            $this->model->serial = $request->serial;
        }
        if ($request->has('people_id') && $request->get('people_id')){
            $this->model->people_id = $request->people_id;
        }
        if ($request->has('issue_date') && $request->get('issue_date')){
            $this->model->issue_date = $request->issue_date;
        }

        return $this->model->save();

    }
    public function update($request, $slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Character Certificate Not Found');
        }
        if ($request->has('serial') && $request->get('serial')){
            $item->serial = $request->serial;
        }
        if ($request->has('people_id') && $request->get('people_id')){
            $item->people_id = $request->people_id;
        }
        if ($request->has('issue_date') && $request->get('issue_date')){
            $item->issue_date = $request->issue_date;
        }

        return $item->save();
    }

    public function delete($slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Character Certificate Not Found');
        }

        return $item->delete();
    }

//    public function getAllWards()
//    {
//        return $this->wardRepository->all();
//    }
    public function getAllPeople()
    {
        return $this->peopleRepository->getAllPeople();
    }
    public function get($slug)
    {

        $item = $this->model->findBySlug($slug);
        if (!$item) {
            throw new NotFoundHttpException('Character Certificate Not Found');
        }
        return $item;
    }

}

<?php
namespace App\Repositories;

use App\Models\Market;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MarketRepository
{
    private $model;

    public function __construct(Market $model, WardRepository $wardRepository)
    {
        $this->model = $model;
        $this->wardRepository = $wardRepository;
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
                ->where('name', 'LIKE', "%$search%")->orderBy('name', 'ASC')
                ->paginate($request->get('per_page') ? $request->get('per_page') : 10);
//              ->paginate(5);

            return $data->appends(array('search' => $search));
        }
        return $this->all();
    }

    public function create($request)
    {
        if ($request->has('name') && $request->get('name')) {
            $this->model->name = $request->name;
        }
        if ($request->has('number') && $request->get('number')) {
            $this->model->number = $request->number;
        }
        if ($request->has('area') && $request->get('area')) {
            $this->model->area = $request->area;
        }
        if ($request->has('total_shop') && $request->get('total_shop')) {
            $this->model->total_shop = $request->total_shop;
        }
        if ($request->has('details') && $request->get('details')) {
            $this->model->details = $request->details;
        }
        if ($request->has('ward_id') && $request->get('ward_id')) {
            $this->model->ward_id = $request->ward_id;
        }
        if ($request->has('longitude') && $request->get('longitude')) {
            $this->model->longitude = $request->longitude;
        }
        if ($request->has('latitude') && $request->get('latitude')) {
            $this->model->latitude = $request->latitude;
        }




        return $this->model->save();

    }
    public function update($request, $slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Market Not Found');
        }
        if ($request->has('name') && $request->get('name')) {
            $item->name = $request->name;
        }
        if ($request->has('number') && $request->get('number')) {
            $item->number = $request->number;
        }
        if ($request->has('area') && $request->get('area')) {
            $item->area = $request->area;
        }
        if ($request->has('total_shop') && $request->get('total_shop')) {
            $item->total_shop = $request->total_shop;
        }
        if ($request->has('details') && $request->get('details')) {
            $item->details = $request->details;
        }
        if ($request->has('ward_id') && $request->get('ward_id')) {
            $item->ward_id = $request->ward_id;
        }
        if ($request->has('longitude') && $request->get('longitude')) {
            $item->longitude = $request->longitude;
        }
        if ($request->has('latitude') && $request->get('latitude')) {
            $item->latitude = $request->latitude;
        }



        return $item->save();
    }

    public function delete($slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Market Not Found');
        }

        return $item->delete();
    }

    public function getAllWards()
    {
        return $this->wardRepository->all();
    }

    public function get($slug){

        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Market Not Found');
        }

        return $item;

    }

}

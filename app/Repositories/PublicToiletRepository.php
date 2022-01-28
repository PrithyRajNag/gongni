<?php
namespace App\Repositories;

use App\Models\PublicToilet;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PublicToiletRepository
{
    private $model;
    private $wardRepository;

    public function __construct(PublicToilet $model, WardRepository $wardRepository)
    {
        $this->model = $model;
        $this->wardRepository= $wardRepository;
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

    public function create($request): bool
    {
//        (Public Toilet Name field)
        if ($request->has('name') && $request->get('name')) {
            $this->model->name = $request->name;
        }
        if ($request->has('public_toilet_number') && $request->get('public_toilet_number')) {
            $this->model->public_toilet_number = $request->public_toilet_number;
        }
        if ($request->has('maintain_people_name') && $request->get('maintain_people_name')) {
            $this->model->maintain_people_name = $request->maintain_people_name;
        }
        if ($request->has('phone_number') && $request->get('phone_number')) {
            $this->model->phone_number = $request->phone_number;
        }
        if ($request->has('address') && $request->get('address')) {
            $this->model->address = $request->address;
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
            throw new NotFoundHttpException('Public Toilet Not Found');
        }
        if ($request->has('name') && $request->get('name')) {
            $item->name = $request->name;
        }
        if ($request->has('public_toilet_number') && $request->get('public_toilet_number')) {
            $item->public_toilet_number = $request->public_toilet_number;
        }
        if ($request->has('maintain_people_name') && $request->get('maintain_people_name')) {
            $item->maintain_people_name = $request->maintain_people_name;
        }
        if ($request->has('phone_number') && $request->get('phone_number')) {
            $item->phone_number = $request->phone_number;
        }
        if ($request->has('address') && $request->get('address')) {
            $item->address = $request->address;
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
            throw new NotFoundHttpException('Public Toilet Not Found');
        }

        return $item->delete();
    }

    public function getAllWards(){

        return $this->wardRepository->all();
    }

    public function get($slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Public Toilet Not Found');
        }

        return $item;
    }

}

<?php
namespace App\Repositories;

use App\Models\StreetLamp;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StreetLampRepository
{
    private $model;
    public function __construct(StreetLamp $model)
    {
        $this->model = $model;
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
                ->where('lamp_name', 'LIKE', "%$search%")->orderBy('lamp_name', 'ASC')
                ->paginate($request->get('per_page') ? $request->get('per_page') : 10);
//              ->paginate(5);

            return $data->appends(array('search' => $search));
        }

        return $this->all();
    }

    public function create($request): bool
    {
        if ($request->has('lamp_name') && $request->has('lamp_name'))
        {
            $this->model->lamp_name = $request->lamp_name;
        }
        if ($request->has('details') && $request->has('details'))
        {
            $this->model->details = $request->details;
        }
        if ($request->has('area') && $request->has('area'))
        {
            $this->model->area = $request->area;
        }
        if ($request->has('road') && $request->has('road'))
        {
            $this->model->road = $request->road;
        }
        if ($request->has('category') && $request->has('category'))
        {
            $this->model->category = $request->category;
        }
        if ($request->has('installation_date') && $request->has('installation_date'))
        {
            $this->model->installation_date = $request->installation_date;
        }
        if ($request->has('longitude') && $request->has('longitude'))
        {
            $this->model->longitude = $request->longitude;
        }
        if ($request->has('latitude') && $request->has('latitude'))
        {
            $this->model->latitude = $request->latitude;
        }

        return $this->model->save();

    }
    public function update($request, $slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Street Lamp Not Found');
        }
        if ($request->has('lamp_name') && $request->has('lamp_name'))
        {
            $item->lamp_name = $request->lamp_name;
        }
        if ($request->has('details') && $request->has('details'))
        {
            $item->details = $request->details;
        }
        if ($request->has('area') && $request->has('area'))
        {
            $item->area = $request->area;
        }
        if ($request->has('road') && $request->has('road'))
        {
            $item->road = $request->road;
        }
        if ($request->has('category') && $request->has('category'))
        {
            $item->category = $request->category;
        }
        if ($request->has('installation_date') && $request->has('installation_date'))
        {
            $item->installation_date = $request->installation_date;
        }
        if ($request->has('longitude') && $request->has('longitude'))
        {
            $item->longitude = $request->longitude;
        }
        if ($request->has('latitude') && $request->has('latitude'))
        {
            $item->latitude = $request->latitude;
        }


        return $item->save();
    }

    public function delete($slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Street Lamp Not Found');
        }

        return $item->delete();
    }

    public function get($slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Street Lamp Not Found');
        }

        return $item;
    }




}

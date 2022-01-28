<?php
namespace App\Repositories;

use App\Models\WasteManagement;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class WasteManagementRepository
{
    private $model;
    private $wardRepository;

    public function __construct(WasteManagement $model, WardRepository $wardRepository)
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
        if ($request->has('search') && $request->get('search'))
        {
           $search = $request->get('search');
           $data = $this->model
               ->where('name', 'LIKE', "%$search%")->orderBy('name', 'ASC')
               ->paginate($request->get('per_page') ? $request->get('per_page') : 10);

           return $data->appends(array('search' => $search));
        }

        return $this->all();
    }

    public function create($request): bool
    {
        if ($request->has('name') && $request->get('name'))
        {
            $this->model->name = $request->name;
        }
        if ($request->has('phone_number') && $request->get('phone_number'))
        {
            $this->model->phone_number = $request->phone_number;
        }
        if ($request->has('contractual_period') && $request->get('contractual_period'))
        {
            $this->model->contractual_period = $request->contractual_period;
        }
        if ($request->has('job_type') && $request->get('job_type'))
        {
            $this->model->job_type = $request->job_type;
        }
        if ($request->has('join_date') && $request->get('join_date'))
        {
            $this->model->join_date = $request->join_date;
        }
        if ($request->has('salary') && $request->get('salary'))
        {
            $this->model->salary = $request->salary;
        }
        if ($request->has('ward_id') && $request->get('ward_id'))
        {
            $this->model->ward_id = $request->ward_id;
        }
        if($request->hasFile('file'))
        {
            $fileName = time() . '.' . $request->file->getClientOriginalName();
            $request->file->StoreAS('uploads', $fileName);
            $this->model->file = $fileName;
        }

        return $this->model->save();

    }
    public function update($request, $slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Waste Management People Not Found');
        }
        if ($request->has('name') && $request->get('name'))
        {
            $item->name = $request->name;
        }
        if ($request->has('phone_number') && $request->get('phone_number'))
        {
            $item->phone_number = $request->phone_number;
        }
        if ($request->has('contractual_period') && $request->get('contractual_period'))
        {
            $item->contractual_period = $request->contractual_period;
        }
        if ($request->has('job_type') && $request->get('job_type'))
        {
            $item->job_type = $request->job_type;
        }
        if ($request->has('join_date') && $request->get('join_date'))
        {
            $item->join_date = $request->join_date;
        }
        if ($request->has('salary') && $request->get('salary'))
        {
            $item->salary = $request->salary;
        }
        if ($request->has('ward_id') && $request->get('ward_id'))
        {
            $item->ward_id = $request->ward_id;
        }
        if ($request->hasFile('file'))
        {
            if ($item->file != null && Storage::exists('uploads/' . $item->file))
            {
                Storage::delete('uploads/' . $item->file);
            }
            $fileName = time() . '.' . $request->file->getClientOriginalName();

            $request->file->storeAs('uploads', $fileName);
            $item->file = $fileName;
        }

        return $item->save();
    }

    public function delete($slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Waste Management People Not Found');
        }

        return $item->delete();
    }

    public function get($slug)
    {
        $item = $this->model->findBySlug($slug);
        if (!$item) {
            throw new NotFoundHttpException('Waste Management People Not Found');
        }
        return $item;
    }

    public function getAllWards()
    {
        $data = $this->wardRepository->all();
        return $data;
    }

}

<?php
namespace App\Repositories;

use App\Models\OfficialForm;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OfficialFormRepository
{
    private $model;

    public function __construct(OfficialForm $model)
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
                ->where('name', 'LIKE', "%$search%")->orderBy('name', 'ASC')
                ->paginate($request->get('per_page') ? $request->get('per_page') : 10);
//              ->paginate(5);

            return $data->appends(array('search' => $search));
        }
        return $this->all();
    }


    public function create($request): bool
    {
        if ($request->has('name') && $request->get('name')) {
            $this->model->name = $request->name;
        }
        if ($request->hasFile('file'))
        {
            $fileName = time() . '.'. $request->file->getClientOriginalName();
//            $request->file->move(storage_path('uploads'), $fileName);
            $request->file->storeAs('uploads', $fileName);
            $this->model->file = $fileName;
        }

        return $this->model->save();

    }
    public function update($request, $slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Form not Found');
        }
        if ($request->has('name') && $request->get('name')) {
            $item->name = $request->name;
        }
        if ($request->hasFile('file')) {
            if ($item->file != null && Storage::exists('uploads/' . $item->file) ) {
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
            throw new NotFoundHttpException('File Not Found');
        }

        return $item->delete();
    }
    public function get($slug){

        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Official Form Not Found');
        }

        return $item;

    }

}

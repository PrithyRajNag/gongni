<?php
namespace App\Repositories;

use App\Models\OfficialOrder;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OfficialOrderRepository
{
    private $model;
    public function __construct(OfficialOrder $model)
    {
        $this->model = $model;
    }
    public function all()
    {
        return $this->model->paginate();
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
        if ($request->has('name') && $request->get('name'))
        {
            $this->model->name = $request->name;
        }
        if ($request->has('date') && $request->get('date'))
        {
            $this->model->date = $request->date;
        }
        if ($request->hasFile('file'))
        {
//            $file = $request->File('file');
            $fileName = time() . '.' . $request->file->getClientOriginalName('file');
            $request->file->StoreAs('uploads', $fileName);
            $this->model->file = $fileName;

        }

        return $this->model->save();

    }
    public function update($request, $slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Official Order Not Found');
        }
        if ($request->has('name') && $request->get('name'))
        {
            $item->name = $request->name;
        }
        if ($request->has('date') && $request->get('date'))
        {
            $item->date = $request->date;
        }
        if ($request->hasFile('file'))
        {
            if ($item->file != null && Storage::exists('uploads/' . $item->file))
            {
                Storage::delete('uploads/'. $item->file);
            }
            $fileName = time() . '.' . $request->file->getClientOriginalName('file');
            $request->file->StoreAs('uploads', $fileName);
            $item->file = $fileName;
        }

        return $item->save();
    }

    public function delete($slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Official Order Not Found');
        }

        return $item->delete();
    }

    public function get($slug)
    {
        $item = $this->model->findBySlug($slug);
        if (!$item) {
            throw new NotFoundHttpException('Official Order Not Found');
        }
        return $item;

    }

}

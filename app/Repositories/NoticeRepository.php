<?php

namespace App\Repositories;

use App\Models\Notice;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NoticeRepository
{
    private $model;

    public function __construct(Notice $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->paginate(10);;
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
        if ($request->has('issue_date') && $request->get('issue_date')) {
            $this->model->issue_date = $request->issue_date;
        }
        if ($request->has('expire_date') && $request->get('expire_date')) {
            $this->model->expire_date = $request->expire_date;
        }
        if ($request->hasFile('cover')) {
            $fileName = time() . '.' . $request->cover->getClientOriginalName();
//            $request->cover->move(storage_path('uploads'), $fileName);

//            $request->cover->store_path('uploads', $fileName);
            $request->cover->storeAs('uploads', $fileName);

            $this->model->cover = $fileName;
        }
        return $this->model->save();

    }

    public function update($request, $slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Notice Not Found');
        }
        if ($request->has('name') && $request->get('name')) {
            $item->name = $request->name;
        }
        if ($request->has('issue_date') && $request->get('issue_date')) {
            $item->issue_date = $request->issue_date;
        }
        if ($request->has('expire_date') && $request->get('expire_date')) {
            $item->expire_date = $request->expire_date;
        }
        if ($request->hasFile('cover')) {
            if ($item->cover != null && Storage::exists('uploads/' . $item->cover) ) {

                Storage::delete('uploads/' . $item->cover);
            }


            $fileName = time() . '.' . $request->cover->getClientOriginalName();

//            $request->cover->move(storage_path('uploads'), $fileName);
            $request->cover->storeAs('uploads', $fileName);


            //            $request->cover->move(public_path('uploads'));
//            $request->cover->move(storage_path(), $fileName);
//            $request->cover->store();


//            if (\Storage::exists('upload/avtar.png')) {



            $item->cover = $fileName;
        }

        return $item->save();
    }

    public function get($slug)
    {
        $item = $this->model->findBySlug($slug);
        if (!$item) {
            throw new NotFoundHttpException('Notice Not Found');
        }
        return $item;
    }

    public function delete($slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Notice Not Found');
        }

        return $item->delete();
    }

}

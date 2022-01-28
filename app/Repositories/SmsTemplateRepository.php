<?php
namespace App\Repositories;

use App\Models\Sms;
use App\Models\SmsTemplate;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SmsTemplateRepository
{
    private $model;
    public function __construct(SmsTemplate $model)
    {
        $this->model = $model;
    }
    public function all()
    {
        return $this->model->all();
    }

    public function create($request): bool
    {
        if ($request->has('title') && $request->get('title'))
        {
            $this->model->title = $request->title;
        }
        if ($request->has('description') && $request->get('description'))
        {
            $this->model->description = $request->description;
        }

        return $this->model->save();

    }


    public function update($request, $id)
    {
        $item = $this->model->find($id);

        if (!$item) {
            throw new NotFoundHttpException();
        }



        return $item->save();
    }

    public function delete($slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('SMS Template Not Found');
        }

        return $item->delete();
    }
    public function get($slug)
    {
        $item = $this->model->findBySlug($slug);
        if (!$item) {
            throw new NotFoundHttpException('SMS Template Not Found');
        }
        return $item;
    }

}

<?php
namespace App\Repositories;

use App\Models\Commissioner;
use App\Models\People;
use App\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CommissionerRepository
{
    private $userModel;
    private $peopleModel;

    public function __construct(User $userModel, People $peopleModel)
    {
        $this->userModel = $userModel;
        $this->peopleModel = $peopleModel;
    }
    public function all()
    {
        $user = User::role('commissioner')->paginate(10);
        return $user;
    }

    public function search($request)
    {
        if ($request->has('search') && $request->get('search')) {
            $search = $request->get('search');
            $data = $this->userModel
                ->where('first_name', 'LIKE', "%$search%")->orderBy('first_name', 'ASC')
                ->paginate($request->get('per_page') ? $request->get('per_page')  : 10);

            return $data->appends (array ('search' => $search));
        }
        return $this->all();
    }

    public function get($slug)
    {
        $item = $this->userModel->findBySlug($slug);
        if (!$item) {
            throw new NotFoundHttpException('Commissioner Not Found');
        }
        return $item;
    }


    public function getAllAlivePeople()
    {
        $people =  $this->peopleModel->where('ward_id', auth()->user()->ward_id)->where('is_alive', true)
            ->paginate(10);
        return $people;
    }
    public function searchPeople($request)
    {
        if ($request->has('search') && $request->get('search')) {
            $search = $request->get('search');
            $data = $this->peopleModel
                ->where('first_name', 'LIKE', "%$search%")->orderBy('first_name', 'ASC')
                ->paginate($request->get('per_page') ? $request->get('per_page')  : 10);

            return $data->appends (array ('search' => $search));
        }
        return $this->getAllAlivePeople();
    }
    public function getPeopleInfo($slug)
    {
        $item = $this->peopleModel->findBySlug($slug);
        if (!$item) {
            throw new NotFoundHttpException('People Not Found');
        }
        return $item;
    }
}

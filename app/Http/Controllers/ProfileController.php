<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateUserPasswordRequest;
use App\Repositories\ProfileRepository;
use App\Repositories\WardRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    private $repository;

    public function __construct(ProfileRepository $repository)
    {
        $this->repository = $repository;
    }


    public function show($slug)
    {
        $data = $this->repository->get($slug);
//        return $data;
        return view('profile.view', compact('data'));
    }

    public function edit($slug)
    {
        $data = $this->repository->get($slug);
        $wards = $this->repository->getAllWards();
        $bloodGroups = $this->repository->getAllBloodGroups();
//        return $data;
        return view('profile.update_profile', compact('data','wards', 'bloodGroups'));
    }

    public function update(UpdateProfileRequest $request, $slug)
    {
        $data = $this->repository->update($request, $slug);
        return redirect()->route( 'profile.show', $slug)->with('profile_success','Successfully Profile Updated');

    }
    public function passUpdateIndex(){
        return view('profile.update_pass');
    }
    public function passUpdate(UpdateUserPasswordRequest $request, $slug)
    {
        $data = $this->repository->passUpdate($request, $slug);
        Auth::logout();
        return redirect()->route( 'login');
    }

}

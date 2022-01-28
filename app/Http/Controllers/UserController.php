<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\BloodGroup;
use App\Models\EmployeeDocument;
use App\Repositories\UserRepository;
use App\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class UserController extends Controller
{
    private $repository;
    private $indexRoute;

    public function __construct(UserRepository $repository, $indexRoute = 'user.index')
    {
        $this->repository = $repository;
        $this->indexRoute = $indexRoute;
    }

    public function index(Request $request)
    {
        $contentData = $this->repository->search($request);
        return view($this->indexRoute, compact('contentData'));
    }

    public function create()
    {
        $wards = $this->repository->getAllWards();
        $roles = $this->repository->getAllRoles();
        $bloodGroups = $this->repository->getAllBloodGroups();
        return view('user.create', compact('wards', 'roles', 'bloodGroups'));
    }

    public function store(CreateUserRequest $request)
    {
//        @dd($request->file('file'));
//        return $request->all();
        $data = $this->repository->create($request);
        return redirect()->route('employee.index')->with('success', 'Successfully Employee Created');
    }

    public function edit($slug)
    {
        $data = $this->repository->get($slug);
//        return $data->employeeDocuments;
        $wards = $this->repository->getAllWards();
        $roles = $this->repository->getAllRoles();
        $bloodGroups = $this->repository->getAllBloodGroups();
//            return $data->getRoleNames();

        return view('user.edit', compact('data', 'wards', 'roles', 'bloodGroups'));
    }

    public function update(UpdateUserRequest $request, $slug)
    {

//        dd($request->file('file'));
//        return $request->all();
        $data = $this->repository->update($request, $slug);
        return redirect()->route('employee.index')->with('success', 'Successfully Employee Updated');
    }

    public function show($slug)
    {
        $data = $this->repository->get($slug);
//        return $data->employeeDocuments;
        return view('user.info', compact('data'));
    }

    public function delete($slug)
    {
        $data = $this->repository->get($slug);
        return view('user.delete', compact('data'));
    }

    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route('employee.index')->with('success', 'Employee Deleted Successfully');
    }
    public function downloadImage($slug)
    {
        $document = User::where('slug', $slug)->firstOrFail();
        $pathToCover = storage_path('app/public/images/' . $document->cover);
        return response()->download($pathToCover);
    }
    public function downloadFile($id)
    {
//        $zip = new ZipArchive();
//        $fileName = 'employeeDocuments.zip';
//        $document = User::where('slug', $slug)->firstOrFail();
//        $pathToFile = storage_path('app/uploads/employeeDocuments/' . $document->file);
//        if ($zip->open(storage_path($fileName),ZipArchive::CREATE)==TRUE)
//        {
//            $files = File::files($pathToFile);
//            foreach ($files as $file)
//            {
//                $relativeName = basename($file);
//                $zip->addFile($file, $relativeName);
//            }
//            $zip->close();
//        }
//        return response()->download(storage_path($fileName));


        $document = EmployeeDocument::findOrFail($id);
        $pathToFile = storage_path('app/uploads/' . $document->file_name);
        return response()->download($pathToFile);
//        $filePath = '/app/uploads/' . $document->file_name;
////        return response()->download($filePath);
//        Storage::download($document->file_name);
//        return redirect()->back();
    }

//    public function downloadPDF($slug)
//    {
////        $document = User::where('slug', $slug)->firstOrFail();
//        $document = User::all();
//        $bloodGroups = BloodGroup::all('name');
//        $pdf = PDF::loadView('user.document.pdf', compact('document', 'bloodGroups'));
//
//        return $pdf->download('user.pdf');
//    }

//    public function documentCreate()
//    {
//        return view('user.document.create');
//    }
}

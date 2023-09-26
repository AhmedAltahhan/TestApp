<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\StoreStudentRequest;
use App\Services\StudentService;

class StudentController extends Controller
{

    public function __construct(private StudentService $studentService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = $this->studentService->all();
        return view('Web.Admin.Student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Web.Admin.Student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $user = $this->studentService->store($request->validated());
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->studentService->destroy($id);
        return redirect()->route('students.index');
    }

    public function result()
    {
        $results = $this->studentService->result();
        return view('Web.Admin.Student.result', compact('results'));
    }
    
    public function search(SearchRequest $request)
    {
        $students =  $this->studentService->search($request->validated());
        $search = $request->search;
        return view('Web.Admin.Student.index',compact('students','search'));
    }
}

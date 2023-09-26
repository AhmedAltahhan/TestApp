<?php

namespace App\Http\Controllers\Web\Student;

use App\Http\Controllers\Controller;
use App\Services\StudentService;
use App\Http\Requests\UpdateUserRequest;

class ProfileController extends Controller
{
    public function __construct(private StudentService $studentService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth()->user()->id;
        $students = $this->studentService->profile($id);
        return view('Web.Student.profile.index', compact('students'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = $this->studentService->edit($id);
        return view('Web.Student.Profile.update',compact('student','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $this->studentService->update(['id' =>$request->user],$request->validated());
        return redirect()->route('information.index');
    }
}

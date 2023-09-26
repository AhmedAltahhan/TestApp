<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Services\AdminService;

class ProfileController extends Controller
{
    public function __construct(private AdminService $adminService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth()->user()->id;
        $admins = $this->adminService->index($id);
        return view('Web.Admin.Profile.index', compact('admins'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = $this->adminService->edit($id);
        return view('Web.Admin.Profile.update',compact('admin','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request)
    {
       $this->adminService->update(['id' =>$request->user],$request->validated());
       return redirect()->route('profile.index');
    }
}

<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Services\TestService;
use App\Http\Requests\StoreTestRequest;
use App\Models\Test;

class TestController extends Controller
{
    public function __construct(private TestService $testService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tests = $this->testService->all();
        return view('Web.Admin.Test.index', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $test = null;
        return view('Web.Admin.Test.store', compact('test'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestRequest $request)
    {
        $this->testService->store(['id' =>$request->test],$request->validated());
        return redirect()->route('tests.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $test = Test::findOrFail($id);
        return view('Web.Admin.Test.store', compact('test'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->testService->destroy($id);
        return redirect()->route('tests.index');
    }

    public function search(SearchRequest $request)
    {
        $tests =  $this->testService->search($request->validated());
        $search = $request->search;
        return view('Web.Admin.Test.index',compact('tests','search'));
    }
}

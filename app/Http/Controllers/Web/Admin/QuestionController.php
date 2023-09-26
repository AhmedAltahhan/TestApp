<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Services\QuestionService;
use App\Http\Requests\StoreQuestionRequest;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Test;

class QuestionController extends Controller
{
    public function __construct(private QuestionService $questionService)
    {
    }
    /** 
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = $this->questionService->all();
        return view('Web.Admin.Question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tests = Test::get();
        return view('Web.Admin.Question.create', compact('tests'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionRequest $request)
    {
        $this->questionService->store($request->validated());
        return redirect()->route('questions.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question = Question::findOrFail($id);
        $answers = Answer::whereQuestionId($id)->get();
        $tests = Test::get();
        return view('Web.Admin.Question.update', compact('id','question','answers','tests'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreQuestionRequest $request)
    {
       $this->questionService->update(['id' =>$request->question],$request->validated());
       return redirect()->route('questions.index');
    }

    /** 
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->questionService->destroy($id);
        return redirect()->route('tests.index');
    }
    
    public function search(SearchRequest $request)
    {
        $questions =  $this->questionService->search($request->validated());
        $search = $request->search;
        return view('Web.Admin.Question.index',compact('questions','search'));
    }
}

<?php

namespace App\Http\Controllers\Web\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResultRequest ;
use App\Http\Requests\SearchRequest;
use App\Models\Question;
use App\Models\Result;
use App\Services\TestService;

class TestController extends Controller
{
    public function __construct(private TestService $testService)
    {
    }

    public function test()
    {
        $tests = $this->testService->all();
        return view('Web.Student.test', compact('tests'));
    }

    public function start($id)
    {
        $user = Auth()->user()->id;
        $results = Result::whereId($id)->whereUserId($user)->get();
        $is_exist = Result::whereId($id)-> count();
        if($is_exist > 0)
            return view('Web.Student.results',compact('results'));
        $questions = $this->testService->question($id);
        $question = Question::whereTestId($id)->get();
        $number = count($question);
        return view('Web.Student.index', compact('questions','number'));
    }

    public function result(ResultRequest $request )
    {

        // return $correct = Question::whereTestId($request->test_id)->get();
        // return $request;
        // return $request->test_id;

        $user = Auth()->user()->id;

        $result = $this->testService->results([$user],$request->validated());
        // return $final_result= $this->testService->results($user,$request->test_id,$result);
        // return redirect()->route('results');
        $results = Result::whereId($result->id)->get();
        return view('Web.Student.results',compact('results'));

    }
    public function search(SearchRequest $request)
    {
        $tests =  $this->testService->search($request->validated());
        $search = $request->search;
        return view('Web.Student.test',compact('tests','search'));
    }
}

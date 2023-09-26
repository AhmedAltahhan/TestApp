<?php

namespace App\Services;

use App\Models\Question;
use App\Models\Result;
use App\Models\Test;

class TestService
{

    public function all()
    {
        $tests = Test::with('questions')->latest()->paginate(6);
        return $tests;
    }

    public function store($id,array $data)
    {
        $test = Test::updateOrCreate(['id' => $id],$data);
        return $test;
    }

    public function destroy(string $id)
    {
        Test::whereId($id)->delete();
    }

    public function result()
    {
        $results = Result::with('user')->with('test')->latest()->paginate(6);
        return $results;
    }

    public function search(array $data)
    {
        $search = $data['search'];
        $tests=Test::where(function($query) use ($search){
            $query->where('name','like',"%$search%");
        })->with('questions')->latest()->paginate(1);
        return $tests;
    }

    public function question($id)
    {
        $tests = Question::with('answers')->whereTestId($id)->get();
        return $tests;
    }

    public function results($user,array $data)
    {
        $num = $data['id'];
        $x = 100 / $num;
        $result = 0;
        $correct = Question::whereTestId($data['test_id'])->get();
        foreach($correct as $answer)
        {
            $a= $answer->correct_answer;
            foreach( $data['answers'] as $ans)
            {
                if($ans == $a)
                {
                    $result = $x + $result ;
                }
            }
        }
        if($result > 50)
            $status = "successful";
        else
            $status = "failed";
        return Result::create([
            'result' => $result,
            'test_id' => $data['test_id'],
            'user_id' => $user[0],
            'status' => $status,
        ]);
    }
}

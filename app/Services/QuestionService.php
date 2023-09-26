<?php

namespace App\Services;

use App\Models\Answer;
use App\Models\Question;

class QuestionService
{

    public function all()
    {
        $questions = Question::with('test')->latest()->paginate(6);
        return $questions;
    }

    public function store(array $data)
    {
        $question = Question::Create([
            'title' => $data['title'],
            'correct_answer' => $data['correct_answer'],
            'test_id' => $data['test_id'],
        ]);

        $data['other_answer'][3] = $data['correct_answer'];
        foreach($data['other_answer'] as $answer)
        {
            Answer::Create([
                'name' => $answer,
                'question_id' => $question->id,

            ]);
        }
    }

    public function update($id,array $data)
    {
        Question::whereId($id)->update([
            'title' => $data['title'],
            'correct_answer' => $data['correct_answer'],
            'test_id' => $data['test_id'],
        ]);
        Answer::whereQuestionId($id)->latest()->first()->update([
            'name' => $data['correct_answer'],
            'question_id' => $data['question'],
        ]);
    }

    public function destroy(string $id)
    {
        Question::whereId($id)->delete();
    }

    public function search(array $data)
    {
        $search = $data['search'];
        $questions=Question::where(function($query) use ($search){
            $query->where('title','like',"%$search%");
        })->paginate(5);
        return $questions;
    }
    
}

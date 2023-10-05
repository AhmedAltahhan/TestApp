<?php

namespace App\Exports;

use App\Models\Result;
use Maatwebsite\Excel\Concerns\FromArray;

class ResultExport implements FromArray
{
    public function array():array
    {
        $list = [];
        $results = Result::all();
        foreach($results as $result)
        {
            $list[]=
            [
                $result->id,
                $result->result,
                $result->status,
                $result->user->name,
                $result->test->name,
            ];
        }
        return $list;
    }
}

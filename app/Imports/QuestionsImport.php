<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuestionsImport implements ToModel, WithHeadingRow
{
    protected $event_id;

    public function __construct($event_id)
    {
        $this->event_id = $event_id;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Question([
            'event_id'  => (int) $this->event_id,
            'text'  => $row['text'],
            'a'  => $row['a'],
            'b'  => $row['b'],
            'c'  => $row['c'],
            'd'  => $row['d'],
            'e'  => $row['e'],
            'answer'    => $row['answer'],
        ]);
    }
}

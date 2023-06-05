<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class QuizResultExport implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return collect($this->data);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Username',
            'Module Name',
            'Total Questions',
            'Correct Answers',
            'Wrong Answers',
            'Created At',
            'Updated At'
        ];
    }
}

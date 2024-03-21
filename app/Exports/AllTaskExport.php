<?php

namespace App\Exports;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AllTaskExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Task::select('title', 'description', 'user_task', 'status', 'process', 'imp', 'create_by', 'approved_by', 'created_date', 'approved_at')->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Title',
            'Description',
            'User Task',
            'Status',
            'Process',
            'Important',
            'Created By',
            'Approved By',
            'Created Date',
            'Approved Date',
        ];
    }
}
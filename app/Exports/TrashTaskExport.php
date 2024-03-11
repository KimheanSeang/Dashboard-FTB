<?php

namespace App\Exports;

use App\Models\TrashTask;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TrashTaskExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return TrashTask::select('title', 'description', 'user_task', 'status', 'process', 'imp', 'created_at', 'updated_at')->get();
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
            'Created At',
            'Updated At',
        ];
    }
}
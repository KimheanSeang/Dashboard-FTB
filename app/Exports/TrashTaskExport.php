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
        return TrashTask::select('title', 'description', 'user_task', 'status', 'process', 'imp', 'create_by', 'approved_by', 'created_date', 'approved_at')->get();
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

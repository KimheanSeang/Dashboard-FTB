<?php

namespace App\Http\Controllers\todo;


use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AllTaskExport;
use App\Exports\TrashTaskExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function ExportAllTask()
    {
        return Excel::download(new AllTaskExport, 'AllTask.xlsx');
    }

    public function ExportTrashTask()
    {
        return Excel::download(new TrashTaskExport, 'Trash.xlsx');
    }
}
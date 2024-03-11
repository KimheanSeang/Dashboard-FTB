<?php

namespace App\Http\Controllers\doc;

use App\Http\Controllers\Controller;
use App\Models\RecoveryFile;
use App\Models\UploadFile;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RecoverController extends Controller
{
    public function DeleteRecover($id)
    {
        RecoveryFile::findOrFail($id)->delete();
        $notification = array(
            'message' => 'File in Recover Delete Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);

    }

    public function BackupRecover($id)
    {
        // Retrieve the file details from the RecoveryFile table
        $recoveryFile = RecoveryFile::findOrFail($id);

        // Create a new record in the UploadFile table
        UploadFile::create([
            'filename' => $recoveryFile->filename,
            'title' => $recoveryFile->title,
            'description' => $recoveryFile->description,
            'uploaded_by' => $recoveryFile->uploaded_by,
            'date_upload' => Carbon::now(), // Set the current timestamp as the value
        ]);

        // Delete the record from the RecoveryFile table
        $recoveryFile->delete();

        $notification = [
            'message' => 'File recovered successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UploadFile extends Model
{
    protected $table = 'upload_file';
    protected $guarded = [];
    protected $fillable = ['filename', 'title', 'description', 'uploaded_by', 'deleted_by'];
}

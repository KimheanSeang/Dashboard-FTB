<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'document_upload';
    protected $guarded = [];
    protected $fillable = ['filename', 'title', 'description', 'uploaded_by', 'deleted_by'];
}

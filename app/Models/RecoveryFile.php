<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecoveryFile extends Model
{
    use HasFactory;

    protected $table = 'recover';

    protected $fillable = [
        'filename',
        'delete_by',
        'title',
        'description',
        'deleted_by',
        'uploaded_by',
    ];
}

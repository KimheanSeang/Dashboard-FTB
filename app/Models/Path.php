<?php

namespace App;

class Path
{
    public static function uploadDocument($filename)
    {
        return storage_path('app/public/upload/document/' . $filename);
    }
}
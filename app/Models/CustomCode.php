<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomCode extends Model
{
    use HasFactory;

    // protected $table = 'custom_codes';
    public $timestamps = false;

    protected $fillable = [
        'header_code',
        'footer_code',
    ];
}

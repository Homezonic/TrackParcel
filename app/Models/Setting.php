<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'tracking_initials',
        'tracking_numbers',
        'site_name',
        'site_description',
        'keyword',
        'site_logo',
        'site_icon',
        'site_email',
        'tawkto_id',
    ];
}

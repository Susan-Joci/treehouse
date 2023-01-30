<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'status',
        'created_at',
        'updated_at'
    ];
}

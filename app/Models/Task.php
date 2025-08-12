<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'long_description'];
    // protected $guarded = ['password']; // oposto do $fillable, porém é mais perigoso usar
}

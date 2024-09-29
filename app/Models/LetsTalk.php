<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetsTalk extends Model
{
    use HasFactory;
    protected $fillable = [
        "first_name",
        "last_name",
        "personal_phone",
        "personal_email",
        "company",
        "message"
    ];
}

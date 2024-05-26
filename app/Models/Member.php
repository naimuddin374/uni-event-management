<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Enums\MemberType;



class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'student_id', // Changed from 'id' to 'student_id' to avoid conflicts with the primary key
        'session',
        'email',
        'phone',
        'image',
        'social_link',
        'member_type'
    ];

    protected $casts = [
        'member_type' => MemberType::class,
    ];
}
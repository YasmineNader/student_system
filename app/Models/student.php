<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class student extends Authenticatable
{
    use HasFactory, Notifiable;
    
protected $table="students";
protected $fillable = ['name','email','password'];
protected $hidden =['created_at','updated_at', 'remember_token',];
}

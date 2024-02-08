<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements AuthAuthenticatable
{
    use HasFactory, Authenticatable;
    protected $primaryKey = "userId";
    protected $guarded = ["userId"];
    public $timestamps = false;
}

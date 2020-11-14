<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = "members";

    protected $fillable = ['idmember','ktp','name','dob','email'
    ,'phonenumber','address','upline','firstproduct','joindate'];
}

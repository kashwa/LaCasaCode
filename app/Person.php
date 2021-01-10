<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = ['first_name', 'last_name', 'country_code', 'phone_number', 'email', 'gender', 'birthdate', 'avatar'];
    protected $table = 'persons';
    public $timestamps = false;
}

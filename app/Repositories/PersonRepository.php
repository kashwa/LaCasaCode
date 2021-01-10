<?php


namespace App\Repositories;


use App\Person;

class PersonRepository
{
    public function create($data)
    {
        return Person::create($data);
    }
}

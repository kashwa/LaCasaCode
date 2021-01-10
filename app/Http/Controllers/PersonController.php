<?php

namespace App\Http\Controllers;

use App\Helper\UploaderHelper;
use App\Http\Requests\PersonPostRequest;
use App\Repositories\PersonRepository;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    use UploaderHelper;

    private $personRepository;
    public function __construct(PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    public function create(PersonPostRequest $request)
    {
        $avatar = $request->get('avatar');
        $personalData = $request->except('avatar');
        if ($request->has('avatar')) {
            $photo = $this->upload($request->file('avatar'), 'persons');
            $personalData['avatar'] = $photo;
        }

        $person = $this->personRepository->create($personalData);
        return response()->json($person, 201);
    }
}

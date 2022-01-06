<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function store(UserRequest $request){
      $user = User::create($request->validated());

      return new UserResource($user);
    }
}

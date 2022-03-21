<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    protected User $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function getAll(): Collection
    {
        return User::all();
    }

    public function create($request)
    {
        return $this->model->create([
            'name' => $request['name'],
            'password' => bcrypt($request['password']),
            'email' => $request['email']
        ]);
    }
}

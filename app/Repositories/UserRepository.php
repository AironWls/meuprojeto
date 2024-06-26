<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;

class UserRepository
{
    public function list(Request $request)
    {
        if ( $request->filled('search') ) {
            return User::where('name', 'like', "%{$request->search}%")->paginate(10);
        }
        return User::paginate(10);
    }
}

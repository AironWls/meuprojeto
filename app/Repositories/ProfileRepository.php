<?php

namespace App\Repositories;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileRepository
{
    public function list(Request $request)
    {
        if ( $request->filled('search') ) {
            return Profile::where('name', 'like', "%{$request->search}%")->paginate(10);
        }
        return Profile::paginate(10);
    }
}

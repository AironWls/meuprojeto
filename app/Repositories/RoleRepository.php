<?php

namespace App\Repositories;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleRepository
{
    public function list(Request $request)
    {
        if ( $request->filled('search') ) {
            return Role::where('name', 'like', "%{$request->search}%")->paginate(10);
        }
        return Role::paginate(10);
    }

    public function store(Request $request)
    {
        $roles = [[]];
        foreach($request->name as $name) {
            array_push($roles, ['name' => $name, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        }
        array_shift($roles);
        $result = DB::table('roles')->insert($roles);
        return $result;
    }
}

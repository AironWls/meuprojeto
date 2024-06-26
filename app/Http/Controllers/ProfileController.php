<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Role;
use App\Repositories\ProfileRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function __construct(private ProfileRepository $repository)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $list = $this->repository->list($request);
        return view('profiles.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileRequest $request)
    {
        $profile = Profile::create($request->all());
        if ( !is_null( $profile->id )) {
            return to_route('profiles.index')->with('status', 'Cadastrado com sucesso!');
        }
        return to_route('profiles.index')->with('status', 'Erro ao cadastrar!')->with('alert-class', 'alert-warning');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        if ( !is_null($profile->id) ) {
            return view('profiles.show', compact('profile'));
        }

        return to_route('profiles.index')->with('status', 'Recurso não encontrado!')->with('alert-class', 'alert-warning');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        if ( !is_null($profile->id) ) {
            return view('profiles.edit', compact('profile'));
        }

        return to_route('profiles.index')->with('status', 'Recurso não encontrado!')->with('alert-class', 'alert-warning');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        if ( !is_null($profile->id) ) {
            $profile->name = $request->name;
            $profile->save();
            return to_route('profiles.index')->with('status', 'Atualizado com sucesso!');
        }
        return to_route('profiles.index')->with('status', 'Recurso não encontrado!')->with('alert-class', 'alert-warning');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        if ( !is_null($profile->id) ) {
            $profile->delete();
            return response()->json(['status' => 'Removido com sucesso!']);
        }
        return response()->json(['status' => 'Erro ao remover!'])->with('alert-class', 'alert-warning');
    }

    public function status(Profile $profile)
    {
        if ( !is_null($profile->id) ) {
            $profile->status = 1 - $profile->status;
            $profile->save();
            return response()->json(['status' => 'Removido com sucesso!', 'rstatus' => $profile->status]);
        }
        return response()->json(['status' => 'Erro ao remover!', 'rstatus' => $profile->status])->with('alert-class', 'alert-warning');
    }

    public function destroySelected(Request $request)
    {
        Profile::destroy(array_values($request->id));
    }

    public function add_role_to_profile(Profile $profile)
    {
        if ( !is_null($profile->id) ) {
            $roles = Role::whereDoesntHave('profiles', function (Builder $query) use (&$profile) {
                $query->where('profiles.id', $profile->id);
            })->get();
            return view('profiles.role', compact('profile', 'roles'));
        }

        return to_route('profiles.index')->with('status', 'Recurso não encontrado!')->with('alert-class', 'alert-warning');
    }

    public function save_role_to_profile(Request $request, Profile $profile)
    {
        if ( !is_null($profile->id) ) {
            $profile->roles()->attach(array_values($request->role_id), ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
            return to_route('users.index')->with('status', 'Cadastrado com sucesso!');
        }
        return to_route('users.index')->with('status', 'Recurso não encontrado!')->with('alert-class', 'alert-warning');
    }

    public function destroy_role_to_profile(Request $request, Profile $profile)
    {
        if ( !is_null($profile->id) ) {
            $profile->roles()->detach($request->role_id);
            return response()->json(['status', 'Removido com sucesso']);
        }
        return to_route('users.index')->with('status', 'Recurso não encontrado!')->with('alert-class', 'alert-warning');
    }
}

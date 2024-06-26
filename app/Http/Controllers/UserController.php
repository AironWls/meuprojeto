<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Profile;
use App\Models\User;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private UserRepository $repository){}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $list = $this->repository->list($request);
        return view('users.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profiles = Profile::where('status', 1)->get();
        return view('users.create', compact('profiles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $avatar = null;

        if ( $request->hasFile('avatar') ) {
            $avatar = $request->avatar->store('avatars');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'avatar' => $avatar
        ]);

        if ( !is_null($user->id) ) {
            $user->profiles()->attach($request->profile_id, ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
            return to_route('users.index')->with('status', 'Cadastrado com sucesso!');
        }
        return to_route('users.index')->with('status', 'Erro ao cadastrar!')->with('alert-class', 'alert-warning');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if ( !is_null( $user->id ) ) {
            return view('users.show', compact('user'));
        }
        return to_route('users.index')->with('status', 'Recurso não encontrado!')->with('alert-class', 'alert-warning');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if ( !is_null( $user->id ) ) {
            $profiles = Profile::whereDoesntHave('users', function ( Builder $query ) use ( &$user ) {
                $query->where('users.id', $user->id);
            })->get();
            return view('users.edit', compact('user', 'profiles'));
        }
        return to_route('users.index')->with('status', 'Recurso não encontrado!')->with('alert-class', 'alert-warning');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if ( !is_null( $user->id ) ) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();
            return view('users.edit', compact('user', 'profiles'));
        }
        return to_route('users.index')->with('status', 'Recurso não encontrado!')->with('alert-class', 'alert-warning');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ( !is_null( $user->id ) ) {
            $user->profiles()->detach();
            $user->delete();
            return response()->json(['status' => 'Excluido com sucesso!']);
        }
        return response()->json(['status' => 'Erro ao excluir!']);
    }

    public function status(User $user)
    {
        if ( !is_null($user->id) ) {
            $user->status = 1 - $user->status;
            $user->save();
            return response()->json(['status' => 'Removido com sucesso!', 'rstatus' => $user->status]);
        }
        return response()->json(['status' => 'Erro ao remover!', 'rstatus' => $user->status])->with('alert-class', 'alert-warning');
    }

    public function destroySelected(Request $request)
    {
        User::destroy(array_values($request->id));
    }

    public function add_profile_to_user(User $user)
    {
        if ( !is_null($user->id) ) {
            $profiles = Profile::whereDoesntHave('users', function(Builder $query) use (&$user) {
                $query->where('users.id', $user->id);
            })->get();
            return view('users.profile', compact('user', 'profiles'));
        }
        return response()->json(['status' => 'Erro ao remover!', 'rstatus' => $user->status])->with('alert-class', 'alert-warning');
    }

    public function save_profile_to_user(Request $request, User $user)
    {
        if ( !is_null($user->id) ) {
            $user->profiles()->attach(array_values($request->profile_id), ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
            return response()->json(['status', 'Removido com sucesso']);
        }
        return to_route('users.index')->with('status', 'Recurso não encontrado!')->with('alert-class', 'alert-warning');
    }

    public function destroy_profile_to_user(Request $request, User $user)
    {
        if ( !is_null($user->id) ) {
            $user->profiles()->detach($request->profile_id);
            return response()->json(['status', 'Removido com sucesso']);
        }
        return to_route('users.index')->with('status', 'Recurso não encontrado!')->with('alert-class', 'alert-warning');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Support\Facades\Route;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function __construct(private RoleRepository $repository)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $list = $this->repository->list($request);
        return view('roles.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $routeCollection = Route::getRoutes();
        return view('roles.create', compact('routeCollection'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $result = $this->repository->store($request);
        if ( $result ) {
            return to_route('roles.index')->with('message', 'Salvo com sucesso!');
        }
        return to_route('roles.index')->with('message', 'Erro ao cadastrar!')->with('alert-class', 'alert-warning');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        if ( !is_null( $role->id ) ) {
            return view('roles.show', compact('role'));
        }
        return to_route('roles.index')->with('status', 'Recurso não encontrado')->with('alert-class', 'alert-warning');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        if ( !is_null( $role->id ) ) {
            return view('roles.edit', compact('role'));
        }
        return to_route('roles.index')->with('status', 'Recurso não encontrado')->with('alert-class', 'alert-warning');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        if ( !is_null($role->id) ) {
            $role->delete();
            return response()->json(['status' => 'Removido com sucesso!']);
        }
        return response()->json(['status' => 'Erro ao remover!'])->with('alert-class', 'alert-warning');
    }

    public function status(Role $role)
    {
        if ( !is_null($role->id) ) {
            $role->status = 1 - $role->status;
            $role->save();
            return response()->json(['status' => 'Removido com sucesso!', 'rstatus' => $role->status]);
        }
        return response()->json(['status' => 'Erro ao remover!', 'rstatus' => $role->status])->with('alert-class', 'alert-warning');
    }

    public function destroySelected(Request $request)
    {
        Role::destroy(array_values($request->id));
    }
}

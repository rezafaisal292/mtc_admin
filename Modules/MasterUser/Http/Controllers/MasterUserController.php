<?php

namespace Modules\MasterUser\Http\Controllers;

use App\Models\Role;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class MasterUserController extends Controller
{
 
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {

        $data = User::fetch($request);
        return view('masteruser::index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $d = new User;
        $role = to_dropdown(Role::get(), 'id', 'display_name');
        return view('masteruser::form', compact('d', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

        $att = $request->username . ', ' . $request->name;
        $request['password'] =  Hash::make('12345678');
        User::create($request->only('username', 'name', 'email', 'password'));

        $role = Role::find($request->role);
        $user = User::FindByName($request->name);
        $user->attachRole($role->name);
        $user->attachPermissions($role->permissions->pluck('name'));
        return redirect('masteruser')->with(['success' => '`' . $att . '` Berhasil Disimpan']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('masteruser::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(User $masteruser)
    {
        $d = $masteruser;
        $role = to_dropdown(Role::get(), 'id', 'display_name');
        return view('masteruser::form', compact('d', 'role'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, User $masteruser)
    {

        $att = $masteruser->username . ', ' . $masteruser->name;
        $masteruser->update($request->all());

        return redirect('masteruser')->with(['success' => '`' . $att . '` Berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(User $masteruser)
    {
        $att = $masteruser->username . ', ' . $masteruser->name;
        $role = $masteruser->roles->first()->name;
        $masteruser->detachRole($role);
        $permission = $masteruser->permissions->pluck('name');
        $masteruser->detachPermissions($permission);
        $masteruser->delete();
        return redirect('masteruser')->with(['success' => '`' . $att . '` Berhasil dihapus']);
    }
}

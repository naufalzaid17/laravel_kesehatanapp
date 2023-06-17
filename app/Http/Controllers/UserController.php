<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dokter;
use App\Models\Spesialis;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::orderBy('name', 'ASC')->get();
        $spesialis = Spesialis::orderBy('nama', 'ASC')->get();
        return view('admin.user.create', compact('role', 'spesialis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|string|exists:roles,name',
        ]);

        if($request->role == "Dokter"){
            $this->validate($request,[
                'no_telepon' => 'required|min:12',
                'spesialis_id' => 'required'
            ]);
        }

        try {
            $user = User::firstOrCreate([
                'email' => $request->email
            ], [
                'name' => $request->name,
                'password' => bcrypt($request->password),
                'status' => true
            ]);
            if($request->role == "Dokter"){
                $dokter = Dokter::create([
                    'nama' => $request->name,
                    'no_telepon' =>$request->no_telepon,
                    'spesialis_id' => $request->spesialis_id
                ]);
            }
            $user->assignRole($request->role);
            return redirect(route('users.index'))->with(['success' => 'User: ' . $user->name . ' Berhasil Ditambahkan!']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function roles(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all()->pluck('name');
        return view('admin.user.roles', compact('user', 'roles'));
    }

    function setRole(Request $request, $id){
        $this->validate($request, [
            'role' => 'required'
        ]);

        $user = User::findOrFail($id);
        $user->syncRoles($request->role);
        return redirect(route('users.index'))->with(['success' => 'Role Berhasil Di Set!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|exists:users,email',
            'password' => 'nullable|min:6'
        ]);

        try {

            $user = User::findOrFail($id);
            $password = !empty($request->password) ? bcrypt($request->password):$user->password;
        $user->update([
            'email' => $request->email
        ],[
            'name' => $request->name,
            'password' => $password
        ]);
        // $dokter = Dokter::update(['nama' => $request->name]);
        return redirect(route('users.index'))->with(['success' => 'User: ' . $user->name . ' Berhasil Diupdate!']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = user::findOrFail($id);
        $user->delete();
        return redirect()->back()->with(['success' => 'User: ' . $user->name . ' Berhasil Dihapus!']);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Authorizable;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Session;

class UserController extends Controller
{
    use Authorizable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->latest()->paginate(10);

        return view('pages.admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('pages.admin.users.create', compact('roles'));
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
            'first_name' => 'bail|required|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'roles' => 'required|min:1'
        ]);

        $request->merge(['password' => bcrypt($request->get('password'))]);

        DB::transaction(function () use ($request) {
            if ($user = User::create($request->except('roles', 'permissions'))) {
                $this->syncPermissions($request, $user);

                Session::flash('success', 'Penguna baru berhasil ditambahkan.');
            } else {
                Session::flash('error', 'Penguna baru gagal ditambahkan.');
            }
        });

        return redirect()->route('users.index');
    }

    private function syncPermissions(Request $request, $user)
    {
        // Get the submitted roles
        $roles = $request->get('roles', []);
        $permissions = $request->get('permissions', []);

        // Get the roles
        $roles = Role::find($roles);

        // check for current role changes
        if (!$user->hasAllRoles($roles)) {
            // reset all direct permissions for user
            $user->permissions()->sync([]);
        } else {
            // handle permissions
            $user->syncPermissions($permissions);
        }

        $user->syncRoles($roles);

        return $user;
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
        $roles = Role::all();
        $permissions = Permission::all('name', 'id');

        return view('pages.admin.users.edit', compact('user', 'roles', 'permissions'));
        // return dd($roles);
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
            'name' => 'bail|required|min:2',
            'email' => 'required|email|unique:users,email,' . $id,
            'roles' => 'required|min:1'
        ]);

        // Get the user
        $user = User::findOrFail($id);

        DB::transaction(function () use ($request, $user) {
            // Update user
            $user->fill($request->except('roles', 'permissions', 'password'));

            // check for password change
            if ($request->get('password')) {
                $user->password = bcrypt($request->get('password'));
            }

            $this->syncPermissions($request, $user);

            $user->save();

            Session::flash('success', 'Penguna berhasil diperbarui.');
        });

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->hasRole('Admin')) {
            Session::flash('error', 'Penguna admin tidak dapat dihapus.');
            return redirect()->route('users.index');
        }

        if ($user->delete()) {
            Session::flash('success', 'Penguna berhasil dihapus.');
        }
        return redirect()->route('users.index');
    }
}

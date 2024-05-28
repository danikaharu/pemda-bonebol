<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\{StoreUserRequest, UpdateUserRequest};
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view user')->only('index', 'show');
        $this->middleware('permission:create user')->only('create', 'store');
        $this->middleware('permission:edit user')->only('edit', 'update');
        $this->middleware('permission:delete user')->only('destroy');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $users = User::with('roles');

            return Datatables::of($users)
                ->addIndexColumn()
                ->addColumn('role', function ($row) {
                    return $row->getRoleNames()->toArray() !== [] ? $row->getRoleNames()[0] : '-';
                })
                ->addColumn('action', 'admin.user.include.action')
                ->toJson();
        }

        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::get();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $attr = $request->validated();
        $attr['password'] = Hash::make($request->password);

        $user = User::create($attr);

        $user->assignRole($request->role);

        return redirect()
            ->route('admin.user.index')
            ->with('success', __('Data berhasil ditambah.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::get();
        $user->load('roles:id,name');

        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $attr = $request->validated();

        if (is_null($attr['password'])) {
            unset($attr['password']);
        } else {
            $attr['password'] = bcrypt($attr['password']);
        }

        $user->update($attr);

        $user->syncRoles($request->role);

        return redirect()
            ->route('admin.user.index')
            ->with('success', __('Data berhasil diedit.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('admin.user.index')
            ->with('success', __('Data berhasil dihapus.'));
    }
}

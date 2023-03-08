<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        if ($keyword) {
            $users = User::search($keyword)
                ->paginate();
        } else {
            $users = User::paginate();
        }

        $users->keyword = $keyword;

        foreach ($users as $user) {
            switch ($user->role) {
                case User::ADMIN:
                    $user->peran = 'Admin';
                    break;
                case User::DOKTER:
                    $user->peran = 'Dokter';
                    break;
                case User::PERAWAT:
                    $user->peran = 'Perawat';
                    break;
                case User::SUPER_ADMIN:
                    $user->peran = 'Super Admin';
                    break;
                default:
                    $user->peran = 'User';
                    break;
            }
        }

        return view('user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();

        return view('user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'string', 'unique:' . User::class],
            'role' => ['required']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return to_route('user.index')->with('status', 'success')->with('message', 'User baru berhasil ditambahkan');

    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255'],
            'password' => ['confirmed', Rules\Password::defaults()],
            'phone' => ['string', 'unique:' . User::class],
            'role' => ['numeric']
        ]);

        $user->update();

        return to_route('user.index')->with('status', 'success')->with('message', 'Data user telah berhasil di-update');
    }
}

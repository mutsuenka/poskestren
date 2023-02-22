<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $users = User::paginate();

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
        return view('user.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $user = new User();

        $password = Str::random(8);

        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->phone = $input['phone'];
        $user->password = Hash::make($password);
        $user->role = $input['role'];

        $user->save();

        return to_route('user.index')->with('status', 'success')->with('message', 'User baru berhasil ditambahkan');

    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $input = $request->all();

        $user = new User();

        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->phone = $input['phone'];
        $user->role = $input['role'];

        $user->save();

        return to_route('user.index')->with('status', 'success')->with('message', 'Data user telah berhasil di-update');
    }
}

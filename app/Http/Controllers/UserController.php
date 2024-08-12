<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index()
    {
        // Contoh data user, sesuaikan dengan data user yang Anda miliki
        $user = User::get(); // Mengambil user yang sedang login

        return view('users.index', compact('user'));
    }

    public function create()
    {
        return view(
            'users.insert'
        );
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();

        $data['password'] = bcrypt($data['password']);
        User::create($data);

        return back()->with('success', 'User has been created');
    }

    // public function update(UserUpdateRequest $request, $id)
    // {
    //     $data = $request->validated();

    //     if ($data['password'] != '') {
    //         $data['password'] = bcrypt($data['password']);
    //         User::find($id)->update($data);
    //     } else {
    //         User::find($id)->update([
    //             'name' => $request->name,
    //             'email' => $request->email
    //         ]);
    //     }

    //     return back()->with('success', 'User has been updated');
    // }

    public function destroy(string $id)
    {
        User::find($id)->delete();

        return back()->with('success', 'User has been deleted');
    }
}

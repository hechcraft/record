<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index', ['users' => User::all()]);
    }

    public function show(User $user)
    {
        return view('users.show', ['user' => $user, 'types' => UserType::all()]);
    }

    public function update(User $user, Request $request)
    {
        $request->validate([
           'name' => 'min:3',
        ]);

        $user->name = $request->name;
        $user->user_types_id = $request->user_role;

        $user->save();

        return redirect()->route('users');
    }

    public function verification(Request $request)
    {
        User::where('id', '=', $request->post('id'))->update(['is_verified' => 1]);

        return redirect()->back();
    }


    public function delete(User $user)
    {
        $user->delete();
        return redirect()->back();
    }

    public function types()
    {
        return view('userTypes.index', ['types' => UserType::all()]);
    }

    public function typeDelete($id)
    {
        $userType = UserType::destroy($id);
        return redirect()->back();
    }

    public function typeCreate()
    {
        return view('userTypes.create');
    }

    public function typeStore(Request $request)
    {
        UserType::create($request->all());
        return redirect()->route('users.types');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}

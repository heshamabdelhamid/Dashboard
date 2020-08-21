<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Mail\NotifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\User;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::when($request->search, function ($q) use ($request) {
            return $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        })->orderBy('created_at', 'desc')->paginate(10);

        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Mail::to($user->email)->send(new NotifyEmail($user));

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = User::FindOrFail($id);
        return view('dashboard.users.edit', compact('user'));
    }

    public function update($id, Request $request)
    {
        $user = User::FindOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', Rule::unique('users')->ignore($user->id),]
        ]);

        $Array = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if (request()->has('password') && request()->get('password') != '') {
            $request->validate([
                'password' => ['string', 'min:8', 'confirmed']
            ]);
            $Array = $Array + ['password' => Hash::make($request->password)];
        }

        $user->update($Array);

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        User::FindOrFail($id)->delete();
        return redirect()->route('users.index');
    }
}

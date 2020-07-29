<?php

namespace App\Http\Controllers\User;

use App\Models\User\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User\UserData;
use App\Models\Helper\Division;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\Helper\Qualification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\CreateNewPassword;

class UserController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['role_or_permission:Human Resources|update ranks'])->only('index', 'create', 'store');

        $this->middleware(['permission:update ranks'])->except('index', 'create', 'store', 'showPassword', 'storePassword');
    }
    /**
     * Return the index page
     */
    public function index()
    {
        $users = User::all();

        return view('user.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show a specific user
     */
    public function show($id)
    {
        $user = User::find($id);
        $divisions = Division::all();
        $groupedQuals = Qualification::all()->groupBy('type');
        $roles = Role::all();

        return view('user.show', [
            'user' => $user,
            'divisions' => $divisions,
            'groupedQuals' => $groupedQuals,
            'roles' => $roles,
        ]);
    }

    /**
     * Update a specific user
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'shoulder_number' => 'required|string|max:6|unique:user_data,shoulder_number',
            'division' => 'required|exists:divisions,id',
            'ranks' => 'required',
            'ranks.*' => 'required|exists:roles,id',
            'qualifications.*' => 'required|exists:qualifications,id'
        ]);

        $user = User::find($id);
        $user->syncRoles($request->ranks);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->data->shoulder_number = $request->shoulder_number;
        $user->data->division_id = $request->division;

        $user->qualifications()->sync($request->qualifications);

        $user->save();
        $user->data->save();

        return redirect()->route('users.index');
    }

    /**
     * Show page for creating a user
     */
    public function create()
    {
        $divisions = Division::all();
        $roles = Role::all();

        return view('user.create', [
            'divisions' => $divisions,
            'roles' => $roles
        ]);
    }

    /**
     * Store a user in the database
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'shoulder_number' => 'required|string|max:6|unique:user_data,shoulder_number',
            'division' => 'required|exists:divisions,id',
            'ranks' => 'required',
            'ranks.*' => 'required|exists:roles,id'
        ]);

        $token = Str::random(64);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'token' => $token
        ]);

        UserData::create([
            'user_id' => $user->id,
            'shoulder_number' => $request->shoulder_number,
            'division_id' => $request->division,
        ]);

        $user->syncRoles($request->ranks);
        $user->assignRole('Member');

        $user->notify(new CreateNewPassword($token));

        return redirect()->route('users.index');
    }

    /**
     * Show password creation form for a first time user
     */
    public function showPassword(string $token)
    {
        $user = User::where('token', $token)->firstOrFail();

        return view('user.password', [
            'user' => $user,
            'token' => $token
        ]);
    }

    /**
     * Set a new password for a first time user
     */
    public function storePassword(Request $request, string $token)
    {
        $request->validate([
            'password' => 'required|confirmed'
        ]);

        $user = User::where('token', $token)->firstOrFail();
        $user->password = Hash::make($request->password);
        $user->markEmailAsVerified();
        $user->token = null;
        $user->save();

        if (Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
            return redirect()->route('home');
        } else {
            return response('Unauthorized', 403);
        }
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Models\User\User;
use Illuminate\Http\Request;
use App\Models\Helper\Division;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
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
    $roles = Role::all();

    return view('user.show', [
      'user' => $user,
      'divisions' => $divisions,
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
      'email' => 'required|email',
      'shoulder_number' => 'required',
      'division' => 'required|exists:divisions,id',
      'ranks' => 'required',
      'ranks.*' => 'required|exists:roles,id'
    ]);

    $user = User::find($id);
    $user->syncRoles($request->ranks);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->data->shoulder_number = $request->shoulder_number;
    $user->data->division_id = $request->division;

    $user->save();
    $user->data->save();

    return redirect()->route('users.index');
  }
}

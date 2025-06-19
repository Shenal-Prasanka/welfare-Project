<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class UserController extends Controller
{
   //Dashboard show section
    public function show(Request $request)
    { 
    $search = $request->input('search');
    $query = User::where('delete', 0);

    $query = User::query();

    if ($search) {
        $query->where('name', 'like', "%{$search}%");
              
    }
    
    $users = $query->paginate(7);

    return view('admin.user.user_show', compact('users'));
    }

     public function add()
    {
        return view('admin.user.add_show');
    }

    public function store(Request $request)
    {
    $validated = $request->validate([
        'name' => 'required|string|max:255|unique:users,name',
        'email' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/i'],
        'role' => 'required|in:0,1,2,3,4,5,6,7,8,9',
        'password' => 'required|string|min:6',
        
    ]);
    $validated['password'] = bcrypt($validated['password']);
    
    $user = User::create($request->only('name', 'email', 'role', 'password'));


    $user->remember_token = Str::random(60);
    $user->email_verified_at = now();
    $user->save();

    return redirect()->route('user')->with('success', 'welfareShop added successfully!');
    }

    public function edit($id)
{
    $user = User::findOrFail($id);
    return view('admin.user.edit_show',compact('user'));
}

public function update(Request $request, $id)
{
    // Fetch the user first
    $user = User::findOrFail($id);

    // Validation rules
    $validated = $request->validate([
        'name' => 'required|string|max:255|unique:users,name,' . $user->id,
        'email' => 'required|email|unique:users,email,' . $user->id,
        'role' => 'required|string|max:255',
    ]);

    // Update user
    $user->update($validated);

    return redirect()->route('user')->with('success', 'User updated successfully!');
}
public function view($id)
{
    $user = User::findOrFail($id);
    return view('admin.user.view_show', compact('user'));
}
public function delete($id)
{
    $user = User::findOrFail($id);
    $user->delete = 1;
    $user->save();

    return redirect()->route('user')->with('success', 'User deleted successfully!');
}
public function apply()
{
  return view('user.request'); 
}
}
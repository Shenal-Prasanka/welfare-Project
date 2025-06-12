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
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'role' => 'required|string|max:255',
        'password' => 'required|string|min:6',
        
    ]);
    $validated['password'] = bcrypt($validated['password']);
    $user = User::create($validated); // assign to $user

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
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,'.$id,
        'role' => 'required|string|max:255',
        
    ]);
    $user = User::findOrFail($id);
    $user->update($validated);
    return redirect()->route('user')->with('success', 'Welfare updated successfully!');
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
}
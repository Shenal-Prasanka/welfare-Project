<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Regement;
use App\Models\Unit;
use App\Models\Rank;
use Illuminate\Support\Str;

class UserController extends Controller
{
   //Dashboard show section
    public function show(Request $request)
    { 
    // Fetch all userss with their regements
    $users = User::with('regement')->get(); // eager load regement
    $regements = Regement::with('users')->get(); // Fetch all regements

    // Fetch all userss with their ranks
    $users = User::with('rank')->get(); // eager load rank
    $ranks = Rank::with('users')->get(); // Fetch all ranks

    // Fetch all userss with their units
    $users = User::with('unit')->get(); // eager load unit
    $units = Unit::with('users')->get(); // Fetch all units

    $users = User::where('delete', 0)->get(); // Return all non-deleted records
    return view('admin.user.user_show', compact('users', 'regements', 'ranks', 'units'));
    }

     //Active Deactive section
     public function active($userId)
{
    $user = User::find($userId); // Find the user by ID
        if ($user) {
            if ($user->active) {
                $user->active = 0;
            } else {
                $user->active = 1; 
            }
            $user->save(); // Save the changes
        }
    return back();
}

     public function add()
    {   
        $regements = Regement::all();
        $ranks = Rank::all();
        $units = Unit::all();
        return view('admin.user.add_show',compact('regements', 'ranks', 'units'));
    }

    public function store(Request $request)
    {
    $validated = $request->validate([
        'name' => 'required|string|max:255|unique:users,name',
        'email' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/i'],
        'mobile' => 'required|string|unique:users,mobile',
        'address' => 'required|string',
        'employee_no' => 'required|string|unique:users,employee_no',
        'regement_no' => 'required|string|unique:users,regement_no',
        'regement_id' => 'required|exists:regements,id',
        'unit_id' => 'required|exists:units,id',
        'rank_id' => 'required|exists:ranks,id',
        'role' => 'required|in:0,1,2,3,4,5,6,7,8,9',
        'password' => 'required|string|min:6',
        
    ]);

    $validated['password'] = bcrypt($validated['password']);
    
    $user = User::create($request->only('name', 'email', 'mobile', 'address', 'employee_no', 'regement_no', 'regement_id', 'unit_id', 'rank_id', 'role', 'password'));


    $user->remember_token = Str::random(60);
    $user->email_verified_at = now();
    $user->save();

    return redirect()->route('user')->with('success', 'welfareShop added successfully!');
    }

    public function edit($id)
{
    $user = User::findOrFail($id);
    $regements = Regement::all();
    $units = Unit::all();
    $ranks = Rank::all();
    return view('admin.user.edit_show',compact('user', 'regements', 'units', 'ranks'));
}

public function update(Request $request, $id)
{
     // Fetch the user first
    $user = User::findOrFail($id);

    // Validation rules
    $validated = $request->validate([
        'name' => 'required|string|max:255|unique:users,name,' . $user->id,
        'email' => 'required|email|unique:users,email,' . $user->id,
        'mobile' => 'required|string|unique:users,mobile,' . $user->id,
        'address' => 'required|string',
        'employee_no' => 'required|string|unique:users,employee_no,' . $user->id,
        'regement_no' => 'required|string|unique:users,regement_no,' . $user->id,
        'regement_id' => 'required|exists:regements,id',
        'unit_id' => 'required|exists:units,id',
        'rank_id' => 'required|exists:ranks,id',
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
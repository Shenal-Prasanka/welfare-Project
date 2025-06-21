<?php

namespace App\Http\Controllers;
use App\Models\Regement;
use Illuminate\Http\Request;

class RegementController extends Controller
{
    //Dashboard show section
    public function show(Request $request)
{
    $regements = Regement::where('delete', 0)->get(); // Return all non-deleted records
    return view('admin.regement.regement_show', compact('regements'));
}

    //Active Deactive section
    public function active($regementId)
    {
       $regement = Regement::find($regementId); // Find the rank by ID
        if ($regement)
         {
            if($regement->active)
                {
                    $regement->active = 0;
                }
            else
                {
                    $regement->active = 1; 
                }
            $regement->save(); // Save the changes
         }
            return back();       
    }
   
     public function add()
    {
        return view('admin.regement.add_show');
    }

    public function store(Request $request)
    {
     $request->validate([
        'regement' => 'required|string|unique:regements,regement',
        'active' => 'required|boolean',
    ]);

    Regement::create($request->only('regement', 'active'));

    return redirect()->route('regement')->with('success', 'Regement added successfully!');
    }

    public function edit($id)
{
    $regement = Regement::findOrFail($id);
    return view('admin.regement.edit_show', compact('regement'));
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'regement' => 'required|string|max:255|unique:regements,regement,' . $id,
        'active' => 'required|boolean',
    ]);
        $regement = Regement::findOrFail($id);
        $regement->update($validated);
    return redirect()->route('regement',$id)->with('success', 'Regement updated successfully!');
}

public function view($id)
{
    $regement = Regement::findOrFail($id);
    return view('admin.regement.view_show', compact('regement'));
}
public function delete($id)
{
    $regement = Regement::findOrFail($id);
    $regement->delete = 1;
    $regement->save();

    return redirect()->route('regement')->with('success', 'Regement deleted successfully!');
}
}

<?php

namespace App\Http\Controllers;
use App\Models\Unit;
use App\Models\Regement;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    //Dashboard show section
   public function show(Request $request)
{  
     // Fetch all units with their regements
    $units = Unit::with('regement')->get(); // eager load regement
    $regements = Regement::with('units')->get(); // Fetch all regements

    // Handle search and active filters
    $search = $request->input('search');
    $active = $request->input('active');

    $query = Unit::query();

      // Exclude deleted records
    $query->where('delete', 0);

    // Apply search filter
    if ($search) {
        $query->where('unit', 'LIKE', "%{$search}%");
    }

    // Apply active filter
    if ($active !== null && $active !== '') {
        $query->where('active', $active);
    }


    $units = $query->paginate(7);

    return view('admin.unit.unit_show', compact('units','regements'));
}

    //Active Deactive section
    public function active($unitId)
    {
        $unit = Unit::find($unitId); // Find the unit by ID
        if ($unit) {
            if ($unit->active) {
                $unit->active = 0;
            } else {
                $unit->active = 1; 
            }
            $unit->save(); // Save the changes
        }
        return back();       
    }
    
    public function add()
    {
        $regements = Regement::all();
        return view('admin.unit.add_show', compact('regements'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'unit' => 'required|string|unique:units,unit',
            'regement_id' => 'required|exists:regements,id',
            'active' => 'required|boolean',
        ]);

        Unit::create($request->only('unit', 'active', 'regement_id'));

        return redirect()->route('unit')->with('success', 'Unit added successfully.');
    }
    public function edit($unitId)
    {
        $unit = Unit::findOrFail($unitId);
        return view('admin.unit.edit_show', compact('unit'));
    }
    public function update(Request $request, $unitId)
    {
        $validated = $request->validate([
            'unit' => 'required|string|max:255|unique:units,unit,' . $unitId,
            'active' => 'required|boolean',
        ]);

        $unit = Unit::findOrFail($unitId);
        $unit->update($validated);

        return redirect()->route('unit')->with('success', 'Unit updated successfully.');
    }
    public function view($id)
{
    $unit = Unit::findOrFail($id);
    return view('admin.unit.view_show', compact('unit'));
}
public function delete($id)
{
    $unit = Unit::findOrFail($id);
    $unit->delete = 1;
    $unit->save();

    return redirect()->route('unit')->with('success', 'Regement deleted successfully!');
}
}

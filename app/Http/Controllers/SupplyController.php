<?php

namespace App\Http\Controllers;
use App\Models\Supply;
use Illuminate\Http\Request;

class SupplyController extends Controller
{
    //Dashboard show section
    public function show(Request $request)
{
   $supplys = Supply::where('delete', 0)->get(); // Return all non-deleted records
    return view('admin.supply.supply_show', compact('supplys'));
}

    //Active Deactive section
    public function active($supplyId)
    {
       $supply = Supply::find($supplyId); // Find the rank by ID
        if ($supply)
         {
            if($supply->active)
                {
                    $supply->active = 0;
                }
            else
                {
                    $supply->active = 1; 
                }
            $supply->save(); // Save the changes
         }
            return back();       
    }
    
      public function add()
    {
        return view('admin.supply.add_show');
    }

    public function store(Request $request)
    {
     $request->validate([
        'supply' => 'required|string|unique:supplys,supply',
        'active' => 'required|boolean',
        'description' => 'nullable|string',
        
    ]);

    Supply::create($request->only('supply', 'active','description'));

    return redirect()->route('supply')->with('success', 'Supplier added successfully!');
    }

    public function edit($id)
{
    $supply = Supply::findOrFail($id);
    return view('admin.supply.edit_show',compact('supply'));
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'supply' => 'required|string|unique:supplys,supply,' . $id,
        'active' => 'required|boolean',
        'description' => 'nullable|string',
    
    ]);

    $supply = Supply::findOrFail($id);
    $supply->update($validated);

    return redirect()->route('supply')->with('success', 'Supplier updated successfully!');
}

public function view($id)
{
    $supply = Supply::findOrFail($id);
    return view('admin.supply.view_show', compact('supply'));
}
public function delete($id)
{
    $supply = Supply::findOrFail($id);
    $supply->delete = 1;
    $supply->save();

    return redirect()->route('supply')->with('success', 'supplier deleted successfully!');
}
}

<?php

namespace App\Http\Controllers;
use App\Models\Welfare;
use Illuminate\Http\Request;

class WelfareController extends Controller
{   //Dashboard show section
  public function show(Request $request)
{
     $welfares = Welfare::where('delete', 0)->get(); // Return all non-deleted records
    return view('admin.welfare.welfare_show', compact('welfares'));

   
}

    //Active Deactive section
    public function active($welfareId)
    {
       $name = Welfare::find($welfareId); // Find the welfare by ID
        if ($name)
         {
            if($name->active)
                {
                    $name->active = 0;
                }
            else
                {
                    $name->active = 1; 
                }
            $name->save(); // Save the changes
         }
            return back();       
    }
      public function add()
    {
        return view('admin.welfare.add_show');
    }

    public function store(Request $request)
    {
     $request->validate([
        'name' => 'required|string|unique:welfares,name',
        'active' => 'required|boolean',
    ]);

    Welfare::create($request->only('name', 'active'));

    return redirect()->route('welfare')->with('success', 'welfareShop added successfully!');
    }

    public function edit($id)
{
    $name = welfare::findOrFail($id);
    return view('admin.welfare.edit_show',compact('name'));
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255|unique:welfares,name,' . $id,
        'active' => 'required|boolean',
    ]);
    $name = Welfare::findOrFail($id);
    $name->update($validated);
    return redirect()->route('welfare')->with('success', 'Welfare updated successfully!');
}

public function view($id)
{
    $name = Welfare::findOrFail($id);
    return view('admin.welfare.view_show', compact('name'));
}
public function delete($id)
{
    $welfare = Welfare::findOrFail($id);
    $welfare->delete = 1;
    $welfare->save();

    return redirect()->route('welfare')->with('success', 'Welfare deleted successfully!');
}
}






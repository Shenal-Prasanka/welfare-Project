<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //Dashboard show section
   public function show(Request $request)
{  
     // Fetch all units with their products
    $items = Item::with('product')->get(); // eager load products
    $products = Product::with('items')->get(); // Fetch all products

    // Handle search and active filters
    $search = $request->input('search');
    $active = $request->input('active');

    $query = Item::query();

      // Exclude deleted records
    $query->where('delete', 0);

    // Apply search filter
    if ($search) {
        $query->where('item', 'LIKE', "%{$search}%");
    }

    // Apply active filter
    if ($active !== null && $active !== '') {
        $query->where('active', $active);
    }


    $items = $query->paginate(7);

    return view('admin.item.item_show', compact('items','products'));
}

    //Active Deactive section
    public function active($itemId)
    {
        $item = Item::find($itemId); // Find the unit by ID
        if ($item) {
            if ($item->active) {
                $item->active = 0;
            } else {
                $item->active = 1; 
            }
            $item->save(); // Save the changes
        }
        return back();       
    }
    
    public function add()
    {
        $products = Product::all();
        return view('admin.item.add_show', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item' => 'required|string|unique:items,item',
            'product_id' => 'required|exists:products,id',
            'active' => 'required|boolean',
            'serial_number' => 'required|string|unique:items,serial_number',
        ]);

        Item::create($request->only( 'item', 'product_id', 'active', 'serial_number'));

        return redirect()->route('item')->with('success', 'Item added successfully.');
    }
    public function edit($itemId)
    {
        $item = Item::findOrFail($itemId);
        return view('admin.item.edit_show', compact('item'));
    }
    public function update(Request $request, $itemId)
    {
        $validated = $request->validate([
            'item' => 'required|string|max:255|unique:items,item,' . $itemId,
            'active' => 'required|boolean',
            'product_id' => 'required|exists:products,id'  
        ]);

        $item = Item::findOrFail($itemId);
        $item->update($validated);

        return redirect()->route('item')->with('success', 'Item updated successfully.');
    }
    public function view($id)
{
    $item = Item::findOrFail($id);
    return view('admin.item.view_show', compact('item'));
}
public function delete($id)
{
    $item = Item::findOrFail($id);
    $item->delete = 1;
    $item->save();

    return redirect()->route('item')->with('success', 'Item deleted successfully!');
}
}

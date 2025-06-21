<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Product;
use App\Models\Welfare;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //Dashboard show section
   public function show(Request $request)
{  
     // Fetch all units with their products
    $items = Item::with('product')->get(); // eager load products
    $products = Product::with('items')->get(); // Fetch all products

     // Fetch all units with their welfares
    $items = Item::with('welfare')->get(); // eager load welfaress
    $welfares = Welfare::with('items')->get(); // Fetch all welfaress

   $items = Item::with(['welfare', 'product'])
             ->where('delete', 0)
             ->get();
             
    return view('admin.item.item_show', compact('items','products','welfares'));
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
                'welfare_id' => 'required|exists:welfares,id',
                'serial_number' => 'required|string|unique:items,serial_number',
                'price' => 'required|numeric',
                'vat' => 'required|numeric',
                'tax' => 'nullable|numeric',
                'discount' => 'nullable|numeric',
                'total_price' => 'nullable|numeric',
                'active' => 'required|boolean',
        ]);

                $price = floatval($request->price);
                $vatPercentage = floatval($request->vat);
                $taxPercentage = floatval($request->tax);
                $discountPercentage = floatval($request->discount);

                $vatAmount = ($price * $vatPercentage) / 100;
                $taxAmount = ($price * $taxPercentage) / 100;
                $total =($price+$vatAmount+$taxAmount);
                $discountAmount = ($total * $discountPercentage) / 100;
                $sub_total=($total-$discountAmount);

                $item = new Item();
                $item->item = $request->item;
                $item->product_id = $request->product_id;
                $item->welfare_id = $request->welfare_id;
                $item->serial_number = $request->serial_number;
                $item->price = $price;
                $item->vat = $vatAmount; // Store calculated VAT
                $item->tax = $taxAmount; // Store calculated TAX (if needed)
                $item->discount = $discountAmount; // Store calculated Discount (if needed)
                $item->total_price = $sub_total; //store calculate full amount
                $item->active = $request->active;
                $item->save();

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

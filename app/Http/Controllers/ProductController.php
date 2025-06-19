<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supply;
use Illuminate\Http\Request;

class ProductController extends Controller
{
     //Dashboard show section
   public function show(Request $request)
{  
     // Fetch all units with their supply
    $products = Product::with('supply')->get(); // eager load supply
    $supplys = Supply::with('product')->get(); // Fetch all supply

     // Fetch all units with their category
    $products = Product::with('category')->get(); // eager load category
    $categorys = Category::with('product')->get(); // Fetch all category

    // Handle search and active filters
    $search = $request->input('search');
    $active = $request->input('active');

    $query = Product::query();

      // Exclude deleted records
    $query->where('delete', 0);

    // Apply search filter
    if ($search) {
        $query->where('product', 'LIKE', "%{$search}%");
    }

    // Apply active filter
    if ($active !== null && $active !== '') {
        $query->where('active', $active);
    }


    $products = $query->paginate(7);

    return view('admin.product.product_show', compact('products','supplys','categorys'));
}

    //Active Deactive section
    public function active($productId)
    {
        $product = Product::find($productId); // Find the unit by ID
        if ($product) {
            if ($product->active) {
                $product->active = 0;
            } else {
                $product->active = 1; 
            }
            $product->save(); // Save the changes
        }
        return back();       
    }
    
    public function add()
    {
        $supplys = Supply::all();
        $categorys = Category::all();
        return view('admin.product.add_show', compact('supplys','categorys'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product' => 'required|string|unique:products,product',
            'supply_id' => 'required|exists:supplys,id',
            'category_id' => 'required|exists:categories,id',
            'active' => 'required|boolean',
        ]);

        Product::create($request->only('product', 'active', 'supply_id', 'category_id'));

        return redirect()->route('product')->with('success', 'Product added successfully.');
    }
    public function edit($productId)
    {
        $product = Product::findOrFail($productId);
        return view('admin.product.edit_show', compact('product'));
    }
    public function update(Request $request, $productId)
    {
        $validated = $request->validate([
            'product' => 'required|string|max:255|unique:products,product,' . $productId,
            'active' => 'required|boolean',
        ]);

        $product = Product::findOrFail($productId);
        $product->update($validated);

        return redirect()->route('product',$productId)->with('success', 'Product updated successfully.');
    }
    public function view($id)
{
    $product = Product::findOrFail($id);
    return view('admin.product.view_show', compact('product'));
}
public function delete($id)
{
    $product = Product::findOrFail($id);
    $product->delete = 1;
    $product->save();

    return redirect()->route('product')->with('success', 'Product deleted successfully!');
}
}

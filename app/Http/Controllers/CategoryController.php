<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //Dashboard show section
    public function show(Request $request)
{
    $search = $request->input('search');
    $active = $request->input('active');

    $query = Category::where('delete', 0); // Start with delete filter

    // Apply search filter
    if ($search) {
        $query->where('category', 'LIKE', "%{$search}%");
    }

    // Apply active filter
    if ($active !== null && $active !== '') {
        $query->where('active', $active);
    }

    $categorys = $query->paginate(7);

    return view('admin.category.category_show', compact('categorys'));
}

    //Active Deactive section
    public function active($categoryId)
    {
       $category = Category::find($categoryId); // Find the rank by ID
        if ($category)
         {
            if($category->active)
                {
                    $category->active = 0;
                }
            else
                {
                    $category->active = 1; 
                }
            $category->save(); // Save the changes
         }
            return back();       
    }
    
      public function add()
    {
        return view('admin.category.add_show');
    }

    public function store(Request $request)
    {
     $request->validate([
        'category' => 'required|string|unique:categories,category',
        'active' => 'required|boolean',
        'description' => 'nullable|string',
        
    ]);

    Category::create($request->only('category', 'active','description'));

    return redirect()->route('category')->with('success', 'Category added successfully!');
    }

    public function edit($id)
{
    $category = Category::findOrFail($id);
    return view('admin.category.edit_show',compact('category'));
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
       'category' => 'required|string|unique:categories,category,' . $id,
        'active' => 'required|boolean',
        'description' => 'nullable|string',
    
    ]);

    $category = Category::findOrFail($id);
    $category->update($validated);

    return redirect()->route('category')->with('success', 'Category updated successfully!');
}

public function view($id)
{
    $category = Category::findOrFail($id);
    return view('admin.category.view_show', compact('category'));
}
public function delete($id)
{
    $category = Category::findOrFail($id);
    $category->delete = 1;
    $category->save();

    return redirect()->route('category')->with('success', 'category deleted successfully!');
}
}

<?php

namespace App\Http\Controllers;
use App\Models\Rank; // Import the Rank model
use Illuminate\Http\Request;

class RankController extends Controller
{   //Dashboard show section
    public function show(Request $request)
    { $search = $request->input('search');
    $active = $request->input('active');

    $query = Rank::query();

    // Apply search filter
    if ($search) {
        $query->where('rank', 'LIKE', "%{$search}%")
              ->orWhere('type', 'LIKE', "%{$search}%");
    }

    // Apply active filter
    if ($active !== null) {
        $query->where('active', $active);
    }

    $ranks = $query->paginate(7);

    return view('admin.rank.rank_show', compact('ranks'));
    }

    //Active Deactive section
    public function active($rankId)
    {
       $rank = Rank::find($rankId); // Find the rank by ID
        if ($rank)
         {
            if($rank->active)
                {
                    $rank->active = 0;
                }
            else
                {
                    $rank->active = 1; 
                }
            $rank->save(); // Save the changes
         }
            return back();       
    }
   
     public function add()
    {
        return view('admin.rank.add_show');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rank' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'active' => 'required|boolean',
        ]);

        Rank::create([
            'rank' => $request->rank,
            'type' => $request->type,
            'active' => $request->active,
        ]);

        return redirect()->route('rank')->with('success', __('Rank added successfully!'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Rank; // Import the Rank model
use Illuminate\Http\Request;
use Illuminate\Support\Facades;

class RankController extends Controller
{
    // Dashboard show section
    public function show(Request $request)
    {
        $ranks = Rank::where('delete', 0)->get(); // Return all non-deleted records
        return view('admin.rank.rank_show', compact('ranks'));
    }

    // Active Deactive section
    public function active($rankId)
    {
        $rank = Rank::find($rankId); // Find the rank by ID
        if ($rank) {
            if ($rank->active) {
                $rank->active = 0;
            } else {
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
            'rank' => 'required|string|unique:ranks,rank',
            'type' => 'required|string',
            'active' => 'required|boolean',
        ]);

        Rank::create($request->only('rank', 'type', 'active'));

        return redirect()->route('rank')->with('success', 'Rank added successfully.');
    }

    public function edit($id)
    {
        $rank = Rank::findOrFail($id);
        return view('admin.rank.edit_show', compact('rank'));
    }

    public function update(Request $request, $id)
    {
        // Validate input, ignoring the current rank ID for unique check on rank field
        $validated = $request->validate([
            'rank' => 'required|string|max:255|unique:ranks,rank,' . $id,
            'type' => 'required|string|max:255',
            'active' => 'required|boolean',
        ]);

        // Find rank or fail
        $rank = Rank::findOrFail($id);

        // Update with validated data
        $rank->update($validated);

        // Redirect back to edit page with success message
        return redirect()->route('rank', $id)->with('success', 'Rank updated successfully!');
    }

    public function view($id)
    {
        $rank = Rank::findOrFail($id);
        return view('admin.rank.view_show', compact('rank'));
    }

    public function delete($id)
    {
        $rank = Rank::findOrFail($id);
        $rank->delete = 1;
        $rank->save();

        return redirect()->route('rank')->with('success', 'Rank deleted successfully!');
    }
}

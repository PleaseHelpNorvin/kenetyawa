<?php

// BatchController.php
// BatchController.php

namespace App\Http\Controllers;

use App\Models\batch;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    public function addBatch(Request $request)
    {
        $request->validate([
            'batch_name' => 'required|string|max:255|unique:studentbatch', // Added unique rule
        ], [
            'batch_name.required' => 'The batch name is required.',
            'batch_name.max' => 'The batch name must not exceed :max characters.',
            'batch_name.unique' => 'The batch name must be unique.', // Custom error message for unique rule
        ]);

        Batch::create([
            'batch_name' => $request->input('batch_name'),
        ]);

        return redirect()->back()->with('success', 'Batch added successfully');
    }
}

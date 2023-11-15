<?php

// BlockController.php

namespace App\Http\Controllers;

use App\Models\block;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    public function addBlock(Request $request)
    {
        $request->validate([
            'batch_id' => 'required',
            'block_name' => 'required',
        ]);

        block::create([
            'batch_id' => $request->input('batch_id'),
            'block_name' => $request->input('block_name'),
        ]);

        return redirect()->back()->with('success', 'Block added successfully');
    }
}

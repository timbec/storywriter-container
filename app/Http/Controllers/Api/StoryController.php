<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Story;

class StoryController extends Controller
{
    public function store(Request $request)
    {

        \Log::info('Incoming story request', $request->all());

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',  
            'images' => 'nullable|string',
        ]);
    
        $story = \App\Models\Story::create($validated);
    
        // return response()->json(['story' => $story], 201);
        return response()->json([
            'message' => 'Story created successfully.',
            'story' => $story
        ], 201);
        
    }
    

    public function index()
    {
        return Story::latest()->get();
    }
}

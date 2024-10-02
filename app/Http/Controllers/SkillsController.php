<?php

namespace App\Http\Controllers;

use App\Models\Skills;
use Illuminate\Http\Request;

class SkillsController
{
    public function index(Request $request)
    {
        // Fetch skills based on industry_id if provided
        if ($request->has('industry_id')) {
            $industryId = $request->input('industry_id');
            $skills = Skills::where('industry_id', $industryId)->get();
        } else {
            // Fallback to fetching all skills if industry_id is not provided
            $skills = Skills::all();
        }

        return response()->json($skills);
    }
}

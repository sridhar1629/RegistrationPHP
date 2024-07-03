<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use Illuminate\Http\Request;

class IndustryController
{
    public function index()
    {
        $industry = Industry::all();
        return response()->json($industry);
    }
}

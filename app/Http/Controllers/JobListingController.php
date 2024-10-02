<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\JobSkills;
use App\Models\Skills;
use App\Models\Industry;

class JobListingController
{
    /**
     * Store a newly created job listing in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $user_id = session('user_id');
        $location = session('location');
        $company_id = session('company_id');
        $company_name = session('company_name');

        return view('livewire.joblisting', compact('user_id', 'location', 'company_id','company_name'));
    }

    public function store(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'company_id'=>'required|exists:businesses,id',
            'company_name'=> 'required|exists:businesses,name',
            'location'=> 'required|exists:businesses,location',
            'jobtitle' => 'required|string|max:255',
            'benefits' => 'required|string|min:150',
            'salary' => 'required|numeric',
            'duration' => 'required|numeric',
            'industry' => 'required|string|max:255',
            'job_type' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'requirements' => 'required|string|min:150',
            'state' => 'required|array|min:3|max:5',
            'state.*' => 'exists:skills,name',
        ]);

        // Check validation
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $industry = $request->input('industry');
        $industry_id = Industry::where('name',$industry)->first();
        if ($industry_id) {
            $jobListing = JobListing::create([
                'user_id' => $request->input('user_id'),
                'company_id'=>$request->input('company_id'),
                'company_name'=>$request->input('company_name'),
                'location' => $request->input('location'),
                'jobtitle' => $request->input('jobtitle'),
                'duration' => $request->input('duration'),
                'description' => $request->input('benefits'),
                'salary' => $request->input('salary'),
                'industry' => $industry_id->id,
                'degree' => $request->input('job_type'),
                'type' => $request->input('type'),
                'requirements' => $request->input('requirements'),
            ]);
        }

        // Save skills
        $skills = $request->input('state');
        foreach ($skills as $skillName) {
            $skill = Skills::where('name', $skillName)->first();
            if ($skill) {
                JobSkills::create([
                    'joblisting_id' => $jobListing->id,
                    'skill_id' => $skill->id,
                ]);
            }
        }

        return response()->json(['message' => 'Job listing created successfully!', 'jobListing' => $jobListing], 201);
    }
}

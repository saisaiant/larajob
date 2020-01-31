<?php

namespace App\Http\Controllers;

use App\Job;
use App\Company;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\JobPostRequest;

class JobController extends Controller
{
    public function index() {
        $jobs = Job::all()->take(10);
        return view('welcome', compact('jobs'));
    }

    public function company() {
        return view('company.index');
    }

    public function show($id, Job $job) {        
        return view('jobs.show', compact('job'));
    }

    public function create() {
        return view('jobs.create');
    }

    public function store(JobPostRequest $request) {
        $user_id = auth()->user()->id;
        $company = Company::where('user_id', $user_id)->first();
        Job::create([
            'user_id' => $user_id,
            'company_id' => $company->id,
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'description' => request('description'),
            'roles' => request('roles'),
            'category_id' => request('category_id'),
            'position' => request('position'),
            'address' => request('address'),
            'type' => request('type'),
            'status' => request('status'),
            'last_date' => request('last_date'),
        ]);
        return redirect()->back()-with('message', 'Job Posted Successfully');
    }

    public function myjob() {
        $jobs = Job::where('user_id', auth()->user()->id)->get();
        return view('jobs.myjob', compact('jobs'));
    }

    public function edit($id) {
        $job = Job::findOrFail($id);
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, $id) {
        $job = Job::findOrFail($id);
        $job->update($request->all());

        return redirect()->back()->with('message', 'Job Successfully Update');
    }
}

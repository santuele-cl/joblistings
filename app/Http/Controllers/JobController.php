<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // INDEX -> display all resources (e.g. Jobs)
    public function index()
    {
        $jobs = Job::with(["employer", "tags"])->latest()->paginate(10);

        return view('jobs/index', ["jobs" => $jobs]);
    }

    // SHOW -> display a single resource (e.g. Job)
    public function show(Job $job)
    {
        return view('jobs/show', ["job" => $job]);
    }

    // CREATE -> display a resource's create page (e.g. Job Create Page)
    public function create()
    {
        return view('jobs/create');
    }

    // STORE -> action to post/store a resource (e.g. create a new job)
    public function store()
    {
        request()->validate([
            "title" => ["required", "min:3"],
            "salary" => ["required"]
        ]);


        $job = Job::create([
            "title" => request("title"),
            "salary" => request("salary"),
            "employer_id" => 1
        ]);

        return redirect("/jobs");
    }

    // EDIT -> display a resource's edit page (e.g. Job edit page)
    public function edit(Job $job)
    {
        return view('jobs/edit', ["job" => $job]);
    }

    // EDIT -> action to update/patch/put a resource (e.g. update job title and/or salary)
    public function update(Job $job)
    {
        request()->validate([
            "title" => ["required", "min:3"],
            "salary" => ["required"]
        ]);

        $job->updateOrFail([
            "title" => request("title"),
            "salary" => request("salary")
        ]);

        return redirect("/jobs/{$job->id}");
    }

    // EDIT -> action to delete a resource (e.g. delete a job from the DB)
    public function destroy(Job $job)
    {
        $job->deleteOrFail();

        return redirect("/jobs");
    }
}

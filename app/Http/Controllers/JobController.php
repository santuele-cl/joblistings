<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Employer;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class JobController extends Controller
{

    /**
     * INDEX -> display all resources (e.g. Jobs)
     * GET /jobs
     */
    public function index()
    {
        $jobs = Job::with(["employer", "tags"])->latest()->paginate(10);

        return view('jobs/index', ["jobs" => $jobs]);
    }


    /**
     * SHOW -> display a single resource (e.g. Job)
     * GET /jobs/{job:id}
     */
    public function show(Job $job)
    {
        return view('jobs/show', ["job" => $job]);
    }

    /**
     * CREATE -> display a resource's create page (e.g. Job Create Page)
     * GET /jobs/create
     */
    public function create()
    {
        // dd(Auth::user());
        return view('jobs/create');
    }

    /**
     * STORE -> action to post/store a resource (e.g. create a new job)
     * POST /jobs
     */
    public function store()
    {
        request()->validate([
            "title" => ["required", "min:3"],
            "salary" => ["required"]
        ]);

        $employer = Employer::where(["user_id" => Auth::id()])->firstOrFail();

        $job = Job::create([
            "title" => request("title"),
            "salary" => request("salary"),
            "employer_id" => $employer->id
        ]);

        Mail::to($job->employer->user->email)->queue(new JobPosted($job));


        return redirect("/jobs");
    }

    /**
     * EDIT -> display a resource's edit page (e.g. Job edit page)
     * GET /jobs/{job:id}/edit
     */
    public function edit(Job $job)
    {
        Gate::authorize("edit", $job);

        return view('jobs/edit', ["job" => $job]);
    }

    /**
     * EDIT -> action to update/patch/put a resource (e.g. update job title and/or salary)
     * PATCH /jobs/{job:id}
     */
    public function update(Job $job)
    {
        Gate::authorize("edit", $job);

        request()->validate([
            "title" => ["required", "min:3"],
            "salary" => ["required"]
        ]);

        if ($job->title === request("title") && $job->salary === request("salary")) {
            throw ValidationException::withMessages(["root" => "No changes made"]);
        }

        $job->updateOrFail([
            "title" => request("title"),
            "salary" => request("salary")
        ]);

        return redirect("/jobs/{$job->id}");
    }

    /**
     * DELETE -> action to delete a resource (e.g. delete a job from the DB)
     * DELETE /jobs/{job:id}
     */
    public function destroy(Job $job)
    {
        Gate::authorize("edit", $job);

        $job->deleteOrFail();

        return redirect("/jobs");
    }
}

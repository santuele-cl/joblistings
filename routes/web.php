<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});



Route::get('/home', function () {
    return view('home');
});




// Jobs View
Route::get('/jobs', function () {

    $jobs = Job::with(["employer", "tags"])->latest()->paginate(10);

    return view('jobs/index', ["jobs" => $jobs]);
});


// Create View
Route::get('/jobs/create', function () {

    $jobs = Job::with(["employer", "tags"])->paginate(10);

    return view('jobs/create', ["jobs" => $jobs]);
});

// Create
Route::post('/jobs', function () {
    request()->validate([
        "title" => ["required", "min:3"],
        "salary" => ["required"]
    ]);

    // TODO: Authenticate

    $job = Job::create([
        "title" => request("title"),
        "salary" => request("salary"),
        "employer_id" => 1
    ]);

    return redirect("/jobs");
});

// Edit View
Route::get('/jobs/{id}/edit', function ($id) {

    return view('jobs/edit', ["job" => Job::find($id)]);
});

// Edit
Route::patch('/jobs/{id}', function ($id) {
    request()->validate([
        "title" => ["required", "min:3"],
        "salary" => ["required"]
    ]);

    $job = Job::findOrFail($id);

    $job->update([
        "title" => request("title"),
        "salary" => request("salary")
    ]);

    return redirect("/jobs/{$job->id}");
});

// Delete
Route::delete('/jobs/{id}', function ($id) {

    $job = Job::findOrFail($id);

    $job->deleteOrFail();

    return redirect("/jobs");
});



// Job View
Route::get('/jobs/{id}', function ($id) {

    return view('jobs/show', ["job" => Job::find($id)]);
});






Route::get('/contact', function () {
    return view('contact');
});

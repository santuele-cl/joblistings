<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/**
 *
 * Use Route::view( _uri , _view )
 * when displaying static pages
 *
 */
Route::view("/", "home");
Route::view("/home", "home");
Route::view("/contact", "contact");

Route::get("test", function () {
    // Mail::to('receiver-joblistph@email.com')->send(new JobPosted());

    return "Done";
});

/**
 *  1   Route binding model
 *  2   Controller Classes
 *  3   Route::view (sample above)
 *  4   List Your Routes -> php artisan route:list --except-vendor
 *  5   Route Groups
 *  6   Route Resource
 */

Route::resource("/jobs", JobController::class)->middleware("auth");


/**
 * This is a Route Resource for Post
 * shortcut for the above LEARNING01 syntax
 */
Route::resource("/posts", PostController::class);

Route::resource("/register", RegisterUserController::class, ["only" => ["index", "store"]]);

Route::get("/login", [SessionController::class, "create"])->name("login");
Route::post("/login", [SessionController::class, "store"]);
Route::post("/logout", [SessionController::class, "destroy"]);




/**
 * LEARNING01
 *
 * This is a route group A
 * effectively same as the Route Resource for post below
 *
 * ICSSEUD
 */
// Rou

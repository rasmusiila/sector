<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Person;
use App\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

Route::get('/', function () {
    $sectors = Sector::orderBy('created_at', 'asc')->get();
    // TODO: get all sectors
    return view('broken', [
        'sectors' => $sectors
    ]);
});

/**
 * Add A New Person
 */
Route::post('/person', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    // TODO: maybe create a service file for this
    $person = new Person;
    $person->name = $request->name;
    $person->sectors = $request->sectors;
    $person->terms = $request->has('terms');

    $person->save();

    return redirect('/'); // TODO: return with the existing data
});

/**
 * Update An Existing Person
 */
Route::post('/person/{id}', function ($id) {
    //
});

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

// TODO: these functions should not be in this file should they
function getSectors($parentId = null)
{
    $sectors = [];
    foreach (Sector::where('parent_id', $parentId)->get() as $sector) {
        array_push($sectors,
            [
                'item' => $sector,
                'children' => getSectors($sector->registry_id)
            ]
        );
    }
    return $sectors;
}

function toSelect($arr, $depth = 0)
{
    $html = '';
    foreach ($arr as $v) {
        $html .= '<option value="' . $v['item']['registry_id'] . '" ';
        if (session('person') && in_array($v['item']['registry_id'], session('person')->sectors)) {
            $html .= 'selected';
        }
        $html .= '>' . str_repeat("&emsp;", $depth) . $v['item']['name'] . '</option>' . PHP_EOL;
        if (array_key_exists('children', $v)) {
            $html .= toSelect($v['children'], $depth + 1);
        }
    }
    return $html;
}

Route::get('/', function () {
    return view('person', [
        'sectors' => toSelect(getSectors()),
    ]);
});

/**
 * Add A New Person
 */
Route::post('/person', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'sectors' => 'required',
        'terms' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput() // TODO: I don't think this line does anything, see what you can do to keep filled fields
            ->withErrors($validator);
    }

    // TODO: maybe create a service file for this because i believe this section is not very pretty in the controller module
    $person = new Person;
    $person->name = $request->name;
    $person->sectors = $request->sectors;
    $person->terms = $request->has('terms');

    $person->save();

    return redirect('/')
        ->with('person', $person);
});

/**
 * Update An Existing Person
 */
Route::post('/person/{id}', function ($id, Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'sectors' => 'required',
        'terms' => 'required',
    ]);

    if ($validator->fails()) {
        $requested_person = new Person;
        $requested_person->id = $id;
        $requested_person->name = $request->name;
        $requested_person->sectors = $request->sectors;
        $requested_person->terms = $request->has('terms');
        return redirect('/')
            ->with('person', $requested_person)
            ->withInput()
            ->withErrors($validator);
    }

    $person = Person::find($id);

    $person->name = $request->name;
    $person->sectors = $request->sectors;
    $person->terms = $request->has('terms');

    $person->save();

    return redirect('/')
        ->with('person', $person);
});

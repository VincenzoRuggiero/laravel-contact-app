<?php

use Illuminate\Support\Facades\Route;

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

function getContacts()
{
    return [
        1 => ['name' => 'Name 1', 'phone' => '1234567890'],
        2 => ['name' => 'Name 2', 'phone' => '2345678901'],
        3 => ['name' => 'Name 3', 'phone' => '3456789012'],
    ];
}


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/contacts', function () {
        $contacts = getContacts();
        return view('contacts.index', compact('contacts')); // Replaced with compact ['contacts' => $contacts]);
    })->name('contacts.index');

    Route::get('/contacts/create', function () {
        return view('contacts.create');
    })->name('contacts.create');

    Route::get('/contacts/{id}', function ($id) {
        $contacts = getContacts();
        abort_if(!isset($contacts[$id]), 404); // If contact does not exist return a 404 error page
        $contact = $contacts[$id];

        return view('contacts.show')->with('contact', $contact);
    })->name('contacts.show');
});



// If the page does not exist
Route::fallback(function () {
    return "<h1>Sorry the page does not exist!</h1>";
});


/*
Route::get('/contacts/{id}', function ($id) {
    return "Contact " . $id;
})->whereNumber('id'); // ->where('id', '[0-9]+'); // Only numbers accepted


Route::get('/companies/{name?}', function ($name = null) {
    if ($name) {
        return "Company " . $name;
    } else {
        return "All companies";
    }
})->whereAlphaNumeric('name'); // Acceptes numbers and letters

->whereAlpha('name');  
>where('name', '[a-zA-Z]+'); // Only letters accepted
*/
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', function () {
    return '<h1> Hello! MCDS :) </h1>';
});

Route::get('allusers', function () {
    $users = App\Models\User::take(5)->get();
    dd($users);
});

Route::get('showuser/{id}', function (Request $request) {
    $id = $request->id;
    $user = App\Models\User::find($id);
    return view('showuser')->with('user', $user);
});

/*Route::get('users', function () {
    $user = App\Models\User::limit(10)->get();
    $date = date('Y');
    echo Carbon::now(); die;
    foreach ($user as $key => $value) {
        
        $yearUser = Carbon::createFromFormat('Y-m-d', $value["birthdate"])->format('Y');
        $month =  Carbon::createFromFormat('Y-m-d', $value["birthdate"])->format('m');
        $day = Carbon::createFromFormat('Y-m-d', $value["birthdate"])->format('d');
        $yearOld = $date -$yearUser; 
        $fechaCreacion = $value["created_at"];

        //echo $date1->locale($boringLanguage)->diffForHumans($date2);
        $fechaCreacion->diffForHumans();
        Carbon::createFromFormat('Y-m-d', $fechaCreacion)->diffForHumans();
     
       $birthDate =  $value["birthdate"];
       $fullName =  $value["fullname"];
       echo "<br>".$fullName."->".$yearOld." Años - Creado-> ";
    }
});*/

Route::get('challenge', function () {

    foreach(App\Models\User::all()->take(10) as $user) {
        $years     = Carbon::createFromDate($user->birthdate)->diff()->format('%y years old');
        $since     = Carbon::parse($user->created_at);
        $results[] = $user->fullname . " - " . $years . " - created " . $since->diffForHumans() . "<br>";
    }
    dd($results);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('examples', function () {
    $user = App\Models\User::limit(10)->get();
    if (View::exists('examples')) {
        return view('examples')->with('users',$user);
    } 
});


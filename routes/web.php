<?php

use App\Http\Controllers\ApplyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\WishlistController;
use App\Mail\TestMail;
use App\Mail\WelcomeMail;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', function () {
    return view('welcome');
});



Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
   
    Mail::to('aeron.gurung001@gmail.com')->send(new TestMail($details));
   
    dd("Email is Sent.");
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/jobs', JobController::class);
Route::resource('/applies', ApplyController::class);
Route::resource('/stocks', StockController::class);
Route::resource('/employees', EmployeeController::class);
Route::resource('/wishlists', WishlistController::class);

// Route::get('/email', function(){
//     Mail::to('aeron.gurung001@gmail.com')->send(new WelcomeMail());
//     return new WelcomeMail();
// });

Route::get('send-email', function(){
    $details = [
        "title" => "TestName",
        "body" => "12/12/2012"
    ];
    Mail::to("aeron.gurung001@gmail.com")->send(new TestMail($details));
    dd("Mail Send successfully");

});

Route::get('/download/{id}', [EmployeeController::class, 'downloadPDF'])->name('downloadPDF');
<?php

use App\Http\Livewire\Settings;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\AllShipments;
use App\Http\Livewire\EditShipments;
use App\Http\Livewire\ChangePassword;
use App\Http\Livewire\CustomCodeForm;
use App\Http\Livewire\DeleteShipment;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShipmentComponent;
use App\Http\Livewire\TrackingComponent;
use App\Http\Livewire\DeliveredShipments;
use App\Http\Livewire\UndeliveredShipments;

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
    return redirect('/login');
});
Route::get('/trackparcel', Dashboard::class)->name('trackparcel');
Route::get('/login', Login::class)->name('login');
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/createShipment', ShipmentComponent::class)->name('createShipment');
    Route::get('/all-shipments', AllShipments::class)->name('all-shipments');
    Route::get('/shipments/{id}/edit', EditShipments::class)->name('shipments.edit');
    Route::get('/shipments/{id}/delete', DeleteShipment::class)->name('shipments.delete');
    Route::get('/trackrecord/{shipmentId}', TrackingComponent::class)->name('trackrecord');
    Route::get('/settings', Settings::class)->name('settings');
    Route::get('/settings/custom', CustomCodeForm::class)->name('custom-code');
    Route::get('/undelivered-shipments', UndeliveredShipments::class)->name('undelivered-shipments');
    Route::get('/delivered-shipments', DeliveredShipments::class)->name('delivered-shipments');
    Route::get('/change-password', ChangePassword::class)->name('change-password');
});

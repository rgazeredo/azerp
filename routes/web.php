<?php

use App\Http\Controllers\CustomerCompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LineController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\CustomerStatusController;
use App\Http\Controllers\CustomerProfileController;
use App\Http\Controllers\CustomerPersonalController;
use App\Http\Controllers\CustomerContactController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('users', UserController::class)->names('users');
    Route::resource('sectors', SectorController::class)->names('sectors');
    Route::resource('products', ProductController::class)->names('products');
    Route::resource('categories', CategoryController::class)->names('categories');
    Route::resource('lines', LineController::class)->names('lines');
    Route::resource('wallets', WalletController::class)->names('wallets');
    Route::resource('customer-statuses', CustomerStatusController::class)->names('customer.statuses');
    Route::resource('customer-profiles', CustomerProfileController::class)->names('customer.profiles');
    Route::resource('customer-personals', CustomerPersonalController::class)->names('customer-personals');
    Route::resource('customer-companies', CustomerCompanyController::class)->names('customer-companies');
    
    Route::get('customers/contacts/{customerId}/index', [CustomerContactController::class, 'index'])->name('customers.contacts.index');
    Route::get('customers/contacts/{customerId}/create', [CustomerContactController::class, 'create'])->name('customers.contacts.create');
    Route::post('customers/contacts/{customerId}/store', [CustomerContactController::class, 'store'])->name('customers.contacts.store');
    Route::get('customers/contacts/{customerId}/edit/{id}', [CustomerContactController::class, 'edit'])->name('customers.contacts.edit');
    Route::put('customers/contacts/{customerId}/update/{id}', [CustomerContactController::class, 'update'])->name('customers.contacts.update');
    Route::delete('customers/contacts/{customerId}/destroy/{id}', [CustomerContactController::class, 'destroy'])->name('customers.contacts.destroy');

    Route::get('customers/addresses/{customerId}/index', [CustomerAddressController::class, 'index'])->name('customers.addresses.index');
    Route::get('customers/addresses/{customerId}/create', [CustomerAddressController::class, 'create'])->name('customers.addresses.create');
    Route::post('customers/addresses/{customerId}/store', [CustomerAddressController::class, 'store'])->name('customers.addresses.store');
    Route::get('customers/addresses/{customerId}/edit/{id}', [CustomerAddressController::class, 'edit'])->name('customers.addresses.edit');
    Route::put('customers/addresses/{customerId}/update/{id}', [CustomerAddressController::class, 'update'])->name('customers.addresses.update');
    Route::delete('customers/addresses/{customerId}/destroy/{id}', [CustomerAddressController::class, 'destroy'])->name('customers.addresses.destroy');

    Route::get('customers/calls/{customerId}/index', [CustomerCallController::class, 'index'])->name('customers.calls.index');
    Route::get('customers/calls/{customerId}/create', [CustomerCallController::class, 'create'])->name('customers.calls.create');
    Route::post('customers/calls/{customerId}/store', [CustomerCallController::class, 'store'])->name('customers.calls.store');
    Route::get('customers/calls/{customerId}/edit/{id}', [CustomerCallController::class, 'edit'])->name('customers.calls.edit');
    Route::put('customers/calls/{customerId}/update/{id}', [CustomerCallController::class, 'update'])->name('customers.calls.update');
    Route::delete('customers/calls/{customerId}/destroy/{id}', [CustomerCallController::class, 'destroy'])->name('customers.calls.destroy');

    Route::get('budgets/{customer}/create', [BudgetController::class, 'create'])->name('budgets.create');
    Route::post('budgets/{customer}/store', [BudgetController::class, 'store'])->name('budgets.store');
    
});

require __DIR__ . '/auth.php';

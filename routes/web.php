<?php

use App\Http\Livewire\AlpineJquery;
use App\Http\Livewire\Expense\{
    ExpenseList,
    ExpenseCreate,
    ExpenseEdit
};
use App\Http\Livewire\Payment\CreditCard;
use App\Http\Livewire\Plan\{
    PlanList,
    PlanCreate    
};
use App\Models\Expense;
use App\Services\PagSeguro\Subscription\SubscriptionReaderService;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware(['auth:sanctum','verified'])->group(function() {

    Route::prefix('expenses')->name('expenses.')->group(function(){
    
        Route::get('/', ExpenseList::class)->name('index');
        Route::get('/create', ExpenseCreate::class)->name('create');
        Route::get('/edit/{expense}', ExpenseEdit::class)->name('edit');

        Route::get('/{expense}/photo', function($expense){
            $expense = auth()->user()->expenses()->findOrFail($expense);
            
            if(!Storage::disk('public')->get($expense->photo))
                return abort(404, 'Image not found!');

            $image = Storage::disk('public')->get($expense->photo);
            
            $mimeType = File::mimeType(storage_path('app/public/'.$expense->photo));

            return response($image)->header('Content-Type', $mimeType);
        })->name('photo');
    
    });

    Route::prefix('plans')->name('plans.')->group(function(){
    
        Route::get('/', PlanList::class)->name('index');
        Route::get('/create', PlanCreate::class)->name('create');
    
    });
});

Route::get('subscription', CreditCard::class)->name('plan.subscription');


Route::get('/notification', function(){

    $code = '';
    // $sub = (new SubscriptionReaderService())->getSubscriptionByCode($code);
    // dd($sub);
    return (new SubscriptionReaderService())->getSubscriptionByCode($code);
});


Route::get('alpine-jquery', AlpineJquery::class)->name('alpine.jquery');
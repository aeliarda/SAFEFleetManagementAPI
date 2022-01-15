<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\DataLookupController;
use App\Http\Controllers\AccountGroupController;
use App\Http\Controllers\AccountTypeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\OwnerDetailController;
use App\Http\Controllers\AddressController;
use App\Models\new_table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/welcome', function () {
    return 'Hello';
});

Route::get('/getAccountGroup', function(){
    return AccountGroup::all();
});

// Public routes - Non-Social Login
Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);

// Public Routes - Social Login
// Route::get('social-auth/{provider}/callback',[SocialLoginController::class,'providerCallback']);
// Route::get('social-auth/{provider}',[SocialLoginController::class,'redirectToProvider'])->name('social.redirect');

// Protected routes
Route::group(['middleware'=>['auth:sanctum']], function () {

    // Common
    Route::get('/common/searchTransHeader', [CommonController::class,'searchTransHeader']);
    Route::get('/common/getTransHeaderById/{id}', [CommonController::class,'getTransHeaderById']);
    Route::get('/common/getTransDetailByHeaderId/{id}', [CommonController::class,'getTransDetailByHeaderId']);
    Route::get('/common/getItemsByTransTypeId/{transTypeId}', [CommonController::class,'getItemsByTransTypeId']);
    
    Route::post('/common/saveTrans/{id}', [CommonController::class,'saveTrans']);

    // Data Lookup 
    Route::get('/dataLookup/getOwnersByOwnerTypeId/{ownerTypeId}', [DataLookupController::class,'getOwnersByOwnerTypeId']);
    Route::get('/dataLookup/getReceiptInvoiceLookup', [DataLookupController::class,'getReceiptInvoiceLookup']);
    Route::get('/dataLookup/getItemsLookupByTransTypeId/{transTypeId}', [DataLookupController::class,'getItemsLookupByTransTypeId']);
    Route::get('/dataLookup/getChartOfAccounts', [DataLookupController::class,'getChartOfAccounts']);
    Route::get('/dataLookup/getItems', [DataLookupController::class,'getItems']);
    Route::get('/dataLookup/getTaxes', [DataLookupController::class,'getTaxes']);
    Route::get('/dataLookup/getGroups', [DataLookupController::class,'getGroups']);
    Route::get('/dataLookup/getSubGroups', [DataLookupController::class,'getSubGroups']);

    // Auth
    Route::post('/logout', [AuthController::class,'logout']);

    // Samples
    Route::get('/products', [ProductController::class,'index']);
    Route::get('/products/{id}', [ProductController::class,'show']);
    Route::get('/products/search/{name}', [ProductController::class,'search']);
    Route::post('/products', [ProductController::class,'store']);
    Route::put('/products/{id}', [ProductController::class,'update']);
    Route::delete('/products/{id}', [ProductController::class,'destroy']);

    Route::resource('accountGroup', AccountGroupController::class);
    Route::resource('accountType', AccountTypeController::class);
    Route::resource('account', AccountController::class);
    Route::resource('tax', TaxController::class);
    Route::resource('item', ItemController::class);
    Route::resource('owner', OwnerController::class);
    Route::resource('ownerDetail', OwnerDetailController::class);
    Route::resource('address', AddressController::class);
});

// Old dummy codes
// Route::resource('products', ProductController::class);

// Route::get('/products', function(){
//     return Product::all();
// });

// Route::post('/products', function(){
//     return Product::create([
//         'name'=>'Product One',
//         'slug'=>'Product-one',
//         'description'=>'This is production one',
//         'price'=> '99.99'
//     ]);
// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

<?php

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


/*
// removing this as we will be making our own
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
*/

/**
 * Buyers
 */
Route::resource('buyers', 'Buyer\BuyerController', ['only' => ['index', 'show']]);

/**
 * Buyers-Transaction
 */
Route::resource('buyers.transactions', 'Buyer\BuyerTransactionController', ['only' => ['index']]);

/**
 * Buyers-Products
 */
Route::resource('buyers.products', 'Buyer\BuyerProductController', ['only' => ['index']]);

/**
 * Buyers-Sellers
 */
Route::resource('buyers.sellers', 'Buyer\BuyerSellerController', ['only' => ['index']]);

/**
 * Buyers-Catagories
 */
Route::resource('buyers.categories', 'Buyer\BuyerCategoryController', ['only' => ['index']]);

/**
 * Categories
 */
Route::resource('categories', 'Category\CategoryController', ['except' => ['create', 'edit']]);

/**
 * Categories-Products
 */
Route::resource('categories.products', 'Category\CategoryProductController', ['only' => ['index']]);

/**
 * Categories-Products
 */
Route::resource('categories.sellers', 'Category\CategorySellerController', ['only' => ['index']]);

/**
 * Categories-Transactions
 */
Route::resource('categories.transactions', 'Category\CategoryTransactionController', ['only' => ['index']]);

/**
 * Products
 */
Route::resource('products', 'Product\ProductController', ['only' => ['index', 'show']]);

/**
 * Sellers
 */
Route::resource('sellers', 'Seller\SellerController', ['only' => ['index', 'show']]);

/**
 * Transactions
 */
Route::resource('transactions', 'Transaction\TransactionController', ['only' => ['index', 'show']]);

/**
 * Transaction-Category
 */
Route::resource('transactions.categories', 'Transaction\TransactionCategoryController', ['only' => ['index']]);

/**
 * Transaction-Product
 */
Route::resource('transactions.sellers', 'Transaction\TransactionSellerController', ['only' => ['index']]);

/**
 * Transaction-Buyer
 */
 Route::resource('transactions.buyers', 'Transaction\TransactionBuyerController', ['only' => ['index']]);

/**
 * Users
 */
Route::resource('users', 'User\UserController', ['except' => ['create', 'edit']]);

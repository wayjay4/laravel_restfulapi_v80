<?php

namespace App\Providers;

use App\User;
use App\Product;
use App\Mail\UserCreated;
use Illuminate\Http\Request;
use App\Mail\UserMailChanged;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        User::created(function($user){
            // check if request is coming from an API request (i.e. not from frontend)
            // if so, then send email welcome/email-verification
            if($this->isApiRequest()){
                // send the email using retry for 5 times every 100ms if failed
                retry(5, function() use($user) {
                    Mail::to($user)->send(new UserCreated($user));
                }, 100);
            }
        });

        User::updated(function($user){
            // check if request is coming from an API request (i.e. not from frontend) and email was 'changed'
            // if so, then send email welcome/email-verification
            if($user->isDirty('email') && $this->isApiRequest()){
                // send the email using retry for 5 times every 100ms if failed
                retry(5, function() use($user) {
                    Mail::to($user)->send(new UserMailChanged($user));
                }, 100);
            }
        });

        Product::updated(function($product){
            if($product->quantity == 0 && $product->isAvailable()){
                $product->status = Product::UNAVAILABLE_PRODUCT;

                $product->save();
            }
        });
    }

    private function isApiRequest()
    {
        return collect($this->app->request->route()->middleware())->contains('api');
    }
}

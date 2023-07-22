<?php

namespace App\Providers;


// use Illuminate\Support\Facades\Gate;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Product' => 'App\Policies\ProductPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        //$this->registerPolicies();
         //only the user(products owner can see the products)
        // Gate::define('my-product', function(User $user,Product $product){
        //     return $user->id === $product->user_id;
        // });

        //this gate allow only Mawuli to create new user
    //    {{ auth()->user() != null ? auth()->user()->name : "Guest" }}</span>
       //this allow only admin to create user
       
//        Gate::define('can-create',function(User $user){
//         return $user->roles[0]->name === "admin"; 
//    });

    }
}

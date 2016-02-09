<?php

namespace App\Providers;

use App\Models\Book;
use App\Models\Permission;
use App\Models\User;
use App\Policies\BookPolicy;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\App;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
         Book::class => BookPolicy::class, //relacionado o (model book) com a (policy book)
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

       // if( !App::runningInConsole() ){
        
            foreach($this->getPermissions() as $permission) {        
                $gate->define($permission->name, function($user) use($permission) {
                    return $user->hasRole($permission->roles) || $user->isAdmin();
                });
            }
            
       // }

    }

    public function getPermissions()
    {
        return Permission::with('roles')->get();
    }
}

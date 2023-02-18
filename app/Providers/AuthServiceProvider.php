<?php

namespace App\Providers;

use App\Models\Paste;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\PastePolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Paste::class => PastePolicy::class,
        // 'App\Models\Paste' => 'App\Models\PastePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        // The registerPolicies method of the AuthServiceProvider is now invoked automatically by the framework.
        // $this->registerPolicies();
    }
}

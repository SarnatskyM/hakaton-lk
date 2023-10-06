<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Classes;
use App\Models\MediaTypeContent;
use App\Models\Student2Task;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\TopicTheme;
use App\Models\User;
use App\Policies\AdminPolicy;
use App\Policies\PrepodPolicy;
use App\Policies\StudentPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => AdminPolicy::class,
        Permission::class => AdminPolicy::class,
        Role::class => AdminPolicy::class,
        TopicTheme::class => AdminPolicy::class,
        Student2Task::class => PrepodPolicy::class,
        Topic::class => StudentPolicy::class,
        Subject::class => PrepodPolicy::class,
        MediaTypeContent::class => AdminPolicy::class,
        Classes::class => PrepodPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}

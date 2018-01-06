<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    protected static $repositories = [
        'user' => [
            \App\Contracts\Repositories\UserRepository::class,
            \App\Repositories\UserRepositoryEloquent::class,
        ],
        'patient' => [
            \App\Contracts\Repositories\PatientRepository::class,
            \App\Repositories\PatientRepositoryEloquent::class,
        ],
        'patientHistory' => [
            \App\Contracts\Repositories\PatientHistoryRepository::class,
            \App\Repositories\PatientHistoryRepositoryEloquent::class,
        ],
        'specialist' => [
            \App\Contracts\Repositories\SpesicalRepository::class,
            \App\Repositories\SpecialistRepositoryEloquent::class,
        ],
        'contact' => [
            \App\Contracts\Repositories\ContactRepository::class,
            \App\Repositories\ContactRepositoryEloquent::class,
        ],
        'category' => [
            \App\Contracts\Repositories\CategoryRepository::class,
            \App\Repositories\CategoryRepositoryEloquent::class,
        ],
        'post' => [
            \App\Contracts\Repositories\PostRepository::class,
            \App\Repositories\PostRepositoryEloquent::class,
        ],
        'media' => [
            \App\Contracts\Repositories\MediaRepository::class,
            \App\Repositories\MediaRepositoryEloquent::class,
        ],
        'calendar' => [
            \App\Contracts\Repositories\DoctorCalendarRepository::class,
            \App\Repositories\DoctorCalendarRepositoryEloquent::class,
        ],
        'room' => [
            \App\Contracts\Repositories\RoomRepository::class,
            \App\Repositories\RoomRepositoryEloquent::class,
        ],
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        foreach (static::$repositories as $repository) {
            $this->app->singleton(
                $repository[0],
                $repository[1]
            );
        }
    }
}

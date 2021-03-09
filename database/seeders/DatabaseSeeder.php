<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Contracts\Container\BindingResolutionException;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_ENV') != 'production') {
            $this->call([
                UsersTableSeeder::class,
                PrimaryTableSeeder::class
            ]);
        } else {
            throw new BindingResolutionException("Application is in production launching! Seeding is disabled.");
        }
    }
}

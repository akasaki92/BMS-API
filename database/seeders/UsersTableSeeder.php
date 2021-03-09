<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Faker\Factory as Faker;
use Illuminate\Contracts\Container\BindingResolutionException;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_ENV') != 'production') {

            $faker = Faker::create('id_ID');
            for($i = 0; $i <= 3; $i++){
                $name = $faker->name;
                User::create([
                    'username' => strtolower(preg_replace('/\s+/', '', preg_replace('~[^A-Za-z0-9]~','', $name))),
                    'name' => $name,
                    'email' => Str::random(5) . '@gmail.com',
                    'tgl_lahir' => Carbon::now()->subMinutes(rand(1, 55)),
                    'avatar' => Str::random(10). '.jpg',
                    'password' => app('hash')->make('password'),
                    'email_verified_at' => Carbon::now()
                ]);
            }
        } else {
            throw new BindingResolutionException("Application is in production launching! Seeding is disabled.");
        }
    }
}
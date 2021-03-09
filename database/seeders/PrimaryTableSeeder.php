<?php

namespace Database\Seeders;

use App\Models\Inet;
use App\Models\Listrik;
use App\Models\Pulsa;
use App\Models\Tagihan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Contracts\Container\BindingResolutionException;


class PrimaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_ENV') != 'production') {
            $faker = Faker::create();
            for($i = 0; $i <= 3; $i++){
                $id_user = User::all()->random()->id;
                $jenis = $faker->randomElement(['Inet', 'Listrik', 'Pulsa']);
                if ($jenis == 'Inet') {
                    $id_pelanggan = Str::random(12);
                    Inet::create([
                        'users_id' => $id_user,
                        'nama_langganan' => $faker->randomElement(['Indihome', 'BPT', 'Biznet', 'My Republic']),
                        'id_pelanggan' => $id_pelanggan
                    ]);
                    $kat = Inet::where('id_pelanggan', $id_pelanggan)->first();
                } else if ($jenis == 'Listrik') {
                    $id_pelanggan = Str::random(12);
                    Listrik::create([
                        'users_id' => $id_user,
                        'nama_langganan' => $faker->randomElement(['PLN', 'PT. Adaro Energy', 'Group Astra']),
                        'id_pelanggan' => $id_pelanggan,
                        'jenis_pembayaran' => $faker->randomElement(['Prabayar', 'Paskabayar'])
                    ]);
                    $kat = Listrik::where('id_pelanggan', $id_pelanggan)->first();
                } else {
                    $id_pelanggan = '0812' . $faker->randomNumber(8);
                    Pulsa::create([
                        'users_id' => $id_user,
                        'nama_langganan' => $faker->randomElement(['Telkomsel', 'Indosat', 'Xl/Axis']),
                        'nomor_telp' => $id_pelanggan
                    ]);
                    $kat = Pulsa::where('nomor_telp', $id_pelanggan)->first();
                }
                Tagihan::create([
                    'users_id' => $id_user,
                    'kategori' => $jenis,
                    'kategori_id' => $kat->id,
                    'mulai_tagihan' => Carbon::now(),
                    'rentang_waktu' => $faker->numberBetween(1,30),
                    'harga_tagihan' => $faker->numberBetween(1000,300000)
                ]);
            }
        } else {
            throw new BindingResolutionException("Application is in production launching! Seeding is disabled.");
        }
    }
}

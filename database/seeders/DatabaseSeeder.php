<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $clients = DB::connection('mysql')
            ->table('client_databases')
            ->pluck('database_name');

        foreach ($clients as $client) {
            Config::set('database.connections.mysql.database', $client);
            DB::connection('mysql')->reconnect();

            $this->call(PermissionTableSeeder::class);
            $this->call(CreateAdminUserSeeder::class);
            $this->call(RegionTableSeeder::class);
            $this->call(StateTableSeeder::class);
            $this->call(CityTableSeeder::class);
            // $this->call(ProductSeeder::class);
        }
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class RunMigrationsForClients extends Command
{
    protected $signature = 'migrations:run-for-clients';
    protected $description = 'Run migrations for all client databases';

    public function handle()
    {
        $clients = DB::connection('mysql')
            ->table('client_databases')
            ->pluck('database_name');

        foreach ($clients as $client) {
            Config::set('database.connections.mysql.database', $client);

            DB::connection('mysql')->reconnect();

            $connection = DB::connection('mysql');

            $tableExists = $connection->select("SHOW TABLES LIKE 'migrations'");

            if (empty($tableExists)) {
                $this->call('migrate:install', ['--database' => 'mysql']);
            }

            $this->call('migrate');
        }
    }
}

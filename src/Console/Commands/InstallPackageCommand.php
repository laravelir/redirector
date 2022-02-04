<?php

namespace Laravelir\Redirector\Console\Commands;

use Illuminate\Console\Command;

class InstallPackageCommand extends Command
{
    protected $signature = 'redirector:install';

    protected $description = 'Install the redirector Package';

    public function handle()
    {
        $this->line("\t... Welcome To Package Installer ...");


        // if (!empty(File::glob(database_path('migrations\*_create_redirectors_tables.php')))) {

        //     $list  = File::glob(database_path('migrations\*_create_redirectors_tables.php'));
        //     collect($list)->each(function ($item) {
        //         File::delete($item);
        //     });

        //     $this->publishMigration();
        // } else {
        //     $this->publishMigration();
        // }

        $this->info("Package Successfully Installed.\n");
        $this->info("\t\tGood Luck.");
    }

    //       //config
    //       if (File::exists(config_path('redirector.php'))) {
    //         $confirm = $this->confirm("redirector.php already exist. Do you want to overwrite?");
    //         if ($confirm) {
    //             $this->publishConfig();
    //             $this->info("config overwrite finished");
    //         } else {
    //             $this->info("skipped config publish");
    //         }
    //     } else {
    //         $this->publishConfig();
    //         $this->info("config published");
    //     }

    //     //assets
    //     if (File::exists(public_path('redirector'))) {
    //         $confirm = $this->confirm("redirector directory already exist. Do you want to overwrite?");
    //         if ($confirm) {
    //             $this->publishAssets();
    //             $this->info("assets overwrite finished");
    //         } else {
    //             $this->info("skipped assets publish");
    //         }
    //     } else {
    //         $this->publishAssets();
    //         $this->info("assets published");
    //     }

    //     //migration
    //     if (File::exists(database_path("migrations/$migrationFile"))) {
    //         $confirm = $this->confirm("migration file already exist. Do you want to overwrite?");
    //         if ($confirm) {
    //             $this->publishMigration();
    //             $this->info("migration overwrite finished");
    //         } else {
    //             $this->info("skipped migration publish");
    //         }
    //     } else {
    //         $this->publishMigration();
    //         $this->info("migration published");
    //     }

    //     $this->call('migrate');
    // }

    // private function publishConfig()
    // {
    //     $this->call('vendor:publish', [
    //         '--provider' => "Laravelir\Redirector\Providers\redirectorServiceProvider",
    //         '--tag'      => 'config',
    //         '--force'    => true
    //     ]);
    // }

    // private function publishMigration()
    // {
    //     $this->call('vendor:publish', [
    //         '--provider' => "Laravelir\Redirector\Providers\redirectorServiceProvider",
    //         '--tag'      => 'migrations',
    //         '--force'    => true
    //     ]);
    // }

    // private function publishAssets()
    // {
    //     $this->call('vendor:publish', [
    //         '--provider' => "Laravelir\Redirector\Providers\redirectorServiceProvider",
    //         '--tag'      => 'assets',
    //         '--force'    => true
    //     ]);
    // }
}

<?php

namespace Laravelir\Redirector\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallPackageCommand extends Command
{
    protected $signature = 'redirector:install';

    protected $description = 'Install the redirector Package';

    public function handle()
    {
        $this->line("\t... Welcome To Package Installer ...");

        //config
        if (File::exists(config_path('redirector.php'))) {
            $confirm = $this->confirm("redirector.php already exist. Do you want to overwrite?");
            if ($confirm) {
                $this->publishConfig();
                $this->info("config overwrite finished");
            } else {
                $this->info("skipped config publish");
            }
        } else {
            $this->publishConfig();
            $this->info("config published");
        }

        if (!empty(File::glob(database_path('migrations\*_create_redirector_table.php')))) {
            $list  = File::glob(database_path('migrations\*_create_redirector_table.php'));
            collect($list)->each(function ($item) {
                File::delete($item);
                $this->warn("Deleted: " . $item);
            });
            $this->publishMigration();
        } else {
            $this->publishMigration();
        }

        $this->info("Package Successfully Installed.\n");
        $this->info("\t\tGood Luck.");
    }


    private function publishConfig()
    {
        $this->call('vendor:publish', [
            '--provider' => "Laravelir\Redirector\Providers\RedirectorServiceProvider",
            '--tag'      => 'redirector-config',
            '--force'    => true
        ]);
    }

    private function publishMigration()
    {
        $this->call('vendor:publish', [
            '--provider' => "Laravelir\Redirector\Providers\RedirectorServiceProvider",
            '--tag'      => 'redirector-migration',
            '--force'    => true
        ]);
    }
}

<?php

namespace Dovaldev\FilamentSimpleSeo\Commands;

use Illuminate\Console\Command;

class FilamentSimpleSeoCommand extends Command
{
    public $signature = 'filament-simple-seo';

    public $description = 'Install the Filament SEO package';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $this->comment('Publishing SEO Configuration...');
        $this->callSilent('vendor:publish', ['--tag' => 'filament-simple-seo-config']);

        $this->comment('Publishing Filament SEO Migrations...');
        $this->callSilent('vendor:publish', ['--tag' => 'filament-simple-seo-migrations']);
        $this->callSilent('vendor:publish', ['--tag' => 'tags-migrations']);

        $this->info('Filament SEO was installed successfully.');


        return self::SUCCESS;
    }
}

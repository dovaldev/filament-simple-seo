<?php

namespace Dovaldev\FilamentSimpleSeo\Commands;

use Illuminate\Console\Command;

class FilamentSimpleSeoCommand extends Command
{
    public $signature = 'filament-simple-seo';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}

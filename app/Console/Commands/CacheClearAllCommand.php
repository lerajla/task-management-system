<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CacheClearAllCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:clear-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Running multiple clear/cache commands.';

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
     * @return void
     */
    public function handle(): void
    {
        $this->info('Cache invalidation done!');

        $this->call('cache:clear');
        $this->call('config:clear');
        $this->call('route:clear');
        $this->call('view:clear');

        $this->call('config:cache');
        $this->call('route:cache');
        $this->call('view:cache');

        $this->comment("\nDone");
    }
}

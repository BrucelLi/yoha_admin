<?php

namespace App\Console\Commands;

use App\Jobs\TestJob;
use Carbon\Carbon;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        echo 'start' . Carbon::now() . PHP_EOL;
        dispatch(new TestJob('lxl--test'))->delay(Carbon::now()->addMinutes(1));
        echo 'end' . Carbon::now() . PHP_EOL;
    }
}

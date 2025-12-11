<?php

namespace App\Console\Commands;

use App\Events\CustomerBeganTrial;
use Illuminate\Console\Command;

class AddToDo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-to-do';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        CustomerBeganTrial::fire(customerId: 123);
        $this->info('AddToDo command executed successfully.');
    }
}

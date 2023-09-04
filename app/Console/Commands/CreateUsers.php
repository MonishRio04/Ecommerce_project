<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
// use App\Modals\User;
use App\Models\User;

class CreateUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'show:users';//{parameter}

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
        ob_start();
        // $this->table($headers, User::get());
        $table = ob_get_flush();
        User::get()->toArray();
        return 0;
    }
}

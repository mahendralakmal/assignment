<?php

namespace App\Console\Commands;

use App\Students;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class cronEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

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
        $students = Students::all();

        Mail::send(['html' => 'emails.cron-email'], array(['students' => $students]), function ($message) {
            $message->from('name@example.com');
            $message->subject('Student Details');
        });
    }
}

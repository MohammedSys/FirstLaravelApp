<?php

namespace App\Console\Commands;

use App\Mail\NotifyStd;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email Every Day for Students';

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
        //$users = User::select('email')->get();
        $emails = User::pluk('email')->toArray();
        $data = ['title'=>'Programming','body'=>'php'];
        foreach ($emails as $email){
            print "<p>alert($email)</p>";
            Mail::To($email)->send(new NotifyStd($data));
        }
    }
}

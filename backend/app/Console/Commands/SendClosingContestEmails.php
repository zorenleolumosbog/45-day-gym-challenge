<?php

namespace App\Console\Commands;

use App\Mail\ClosingContest;
use App\Models\User;
use App\Models\V1\Option;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendClosingContestEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send-closing-contest-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending closing contest emails';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $start_of_week = Option::where('name', 'current_week')->first()?->value;
        $end_of_week = Option::where('name', 'end_of_week')->first()?->value;
        
        if($start_of_week < $end_of_week) {
            $today = Carbon::now('America/New_York');
            $weekday_schedule = Option::where('name', 'closing_weekday_schedule')->first()?->value;
            $hour_schedule = Option::where('name', 'closing_hour_schedule')->first()?->value;
            
            if($today->dayOfWeek == $weekday_schedule && $today->hour == $hour_schedule) {
                $users = User::whereNull('is_admin')->get();
                
                foreach ($users as $user) {
                    $contest = [
                        'name' => $user->name,
                        'email_subject' => Option::where('name', 'closing_email_subject')->first()?->value,
                        'email_body' => Option::where('name', 'closing_email_body')->first()?->value
                    ];
    
                    Mail::to($user->email)->send(new ClosingContest($contest));
                }
            }
        }
    }
}

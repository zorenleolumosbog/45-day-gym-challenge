<?php

namespace App\Console;

use App\Models\V1\Option;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            $start_datetime = Option::where('name', 'start_datetime')->first();
            $start_datetime->update([
                'value' => Carbon::today()->startOfDay()
            ]);
            
            $end_datetime = Option::where('name', 'end_datetime')->first();
            $end_datetime->update([
                'value' => Carbon::today()->addDays(7)->startOfDay()
            ]);

            Option::where('name', 'current_week')
                ->increment('value', 1, ['updated_at' => Carbon::now()]);
        });
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

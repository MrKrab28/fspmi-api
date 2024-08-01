<?php

namespace App\Console;

use App\Events\BelumBayarIuran;
use App\Models\User;
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
            $users = User::all();
            foreach ($$users as $user) {
                if ($user->iuran->count() > 0) {
                    $iuran = $user->iuran->latest()->first();

                    if ($iuran->status == 'Belum Terbayar') {
                        BelumBayarIuran::dispatch("Ingat untuk membayar iuran bulan ini");
                    }
                } else {
                    BelumBayarIuran::dispatch("Ingat untuk membayar iuran bulan ini");
                }
            }
        })->monthly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}

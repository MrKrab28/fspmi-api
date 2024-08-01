<?php

namespace App\Listeners;

use App\Events\BelumBayarIuran;
use Ladumor\OneSignal\OneSignal;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class KirimNotifikasiFCM
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BelumBayarIuran $event): void
    {
        $fields['include_player_ids'] = ['All'];
        $message = $event->message;

        OneSignal::sendPush($fields, $message);
    }
}

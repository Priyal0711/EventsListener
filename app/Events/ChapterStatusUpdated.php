<?php

namespace App\Events;

use App\Models\Chapter;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Log;

class ChapterStatusUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $chapter;

    public function __construct(Chapter $chapter)
    {
        $this->chapter = $chapter;
        // dd($this->chapter);
    }
}



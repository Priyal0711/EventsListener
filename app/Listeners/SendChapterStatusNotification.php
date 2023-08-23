<?php

namespace App\Listeners;

use App\Events\ChapterStatusUpdated;
use App\Jobs\SendChapterStatusJob;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;


class SendChapterStatusNotification 
{
    use InteractsWithQueue;


    public function handle(ChapterStatusUpdated $event)
    {
        $chapter = $event->chapter; 
        $email = Auth::user()->email;
        $chapter->email = $email;
        SendChapterStatusJob::dispatch($chapter);
        // SendChapterStatusEmail::dispatch($chapter);

    }
}




<?php

namespace App\Jobs;

use App\Mail\ChapterStatusNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendChapterStatusJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    public $chapter;
    public $email;
    public function __construct($chapter)
    {
        $this->chapter = $chapter; // Set the property
        $this->email = $this->chapter->email;
        // dd($this->email);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
    Mail::to($this->email)->send(new ChapterStatusNotification($this->chapter));
        
    }
}

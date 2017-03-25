<?php

namespace App\Listeners;

use App\Events\CommentCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCommentAddedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  CommentCreated  $event
     * @return void
     */
    public function handle(CommentCreated $event)
    {
        /*
        * 컨트롤러에 있었을 때의 코드
        * Mail::to($comment->post->user)->send(new CommentCreated($comment));
        *
        * [차이점]
        * 메일을 보내는데 필요한 $comment 데이터를 이벤트(CommentCreated)를 통해 전달 받습니다.
        */

        \Illuminate\Support\Facades\Mail::to($event->comment->post->user)->send(new \App\Mail\CommentCreated($event->comment));
    }
}

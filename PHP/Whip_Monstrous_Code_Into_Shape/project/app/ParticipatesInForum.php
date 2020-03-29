<?php


namespace App;


trait ParticipatesInForum
{
    public function startConversation(Conversation $conversation)
    {
        // create a new thread for the current user.
    }

    public function replyTo(Conversation $conversation, Reply $reply)
    {
        // have the user reply to a conversation with the given reply.
    }
}

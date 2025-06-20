<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.Users.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// Broadcast::channel('chat.{receiverId}', function ($user, $receiverId) {
//     return true; // No authentication for now
// });

// Broadcast::channel('chat.{receiverId}', function () {
//     return true;
// });

Broadcast::channel('chat', function () {
    return true;
});

Broadcast::channel('chat{leadId}', function ($user, $leadId) {
    // Return true if this user is authorized to listen
    return true; // Or add logic like: $user->id === Lead::find($leadId)->assigned_user_id;
});
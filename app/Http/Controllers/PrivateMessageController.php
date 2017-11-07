<?php

namespace App\Http\Controllers;

use App\User;
use App\PrivateMessage;
use Illuminate\Http\Request;

class PrivateMessageController extends Controller
{
    public function getUserNotifications(Request $request)
    {
        $notifications = PrivateMessage::where('read', 0)
            ->where('receiver_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return response(['data' => $notifications], 200);
    }

    public function getPrivateMessages(Request $request)
    {
        $pms = PrivateMessage::where('receiver_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return response(['data' => $pms], 200);
    }

    public function getPrivateMessageById(Request $request)
    {
        $pm = PrivateMessage::where('id', $request->input('id'))->first();

        //Verificar se a mensagem foi lida
        if ($pm->read == 0) {
            $pm->read = 1;
            $pm->save();
        }

        return response(['data' => $pm], 200);
    }

    public function getPrivateMessageSent(Request $request)
    {
        $pms = PrivateMessage::where('sender_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return response(['data' => $pms], 200);
    }

    public function sendPrivateMessage(Request $request)
    {
        $attributes = [
            'sender_id' => $request->input('sender_id'),
            'receiver_id' => $request->input('receiver_id'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
            'read' => 0
        ];

        $pm = PrivateMessage::create($attributes);
        $data = PrivateMessage::where('id', $pm->id)->first();

        return response(['data' => $data], 201);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Messages;
use App\Models\Leads;
use MongoDB\BSON\ObjectId;
use App\Events\NewMessage;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    //
    public function index()
    {
        //echo auth()->id();
        $users = Leads::where('owner', new ObjectId(auth()->id()))->get();
        $leads = Leads::raw(function ($collection) {
            $page = request('page', 1);
            $limit = (env('PAGE_LIMIT')) ? env('PAGE_LIMIT') : 10;
            $skip = ($page - 1) * $limit;
            return $collection->aggregate([
                
                // 1. Join with messages where 'to' equals this lead's _id
                ['$lookup' => [
                    'from' => 'messages',
                    'let' => ['leadId' => '$_id'],
                    'pipeline' => [
                        ['$match' => [
                            '$expr' => [
                                '$and' => [
                                    ['$eq' => ['$$leadId', '$to']],
                                    ['$eq' => ['$from', new ObjectId(auth()->id())]]
                                ]
                            ]
                        ]],
                        ['$sort' => ['created_at' => -1]],
                        ['$limit' => 1] // Only latest message
                    ],
                    'as' => 'last_message'
                ]],

                // 2. Unwind message array (could be empty if no messages)
                ['$unwind' => [
                    'path' => '$last_message',
                    'preserveNullAndEmptyArrays' => true
                ]],

                // 3. Project relevant fields
                ['$project' => [
                    'lead_id' => '$_id',
                    'lead_name' => '$name',
                    'lead_email' => '$email',
                    'lead_created_at' => '$created_at',
                    'last_message_text' => '$last_message.message',
                    'last_message_from' => '$last_message.from',
                    'last_message_created_at' => '$last_message.created_at'
                ]],

                // Apply Pagination
                ['$skip' => $skip],
                ['$limit' => $limit]
            ]);
        });
        //print_r(compact('leads'));
        return view('chat', compact('leads'));
    }

    public function getUserMessages(Request $request) {
        $leadId = $request->leadid;
        $from = auth()->id();
        $messages = Messages::where(function ($query) use ($from, $leadId) {
            $query->where('from', new ObjectId($from))->where('to', new ObjectId($leadId)); 
        })->orderBy('created_at', 'asc')->get();
        $renderData = [
            'messages' => compact('messages'),
            'custname' => $request->name,
            'lastmsg' => $request->lastmsg,
            'leadid' => $leadId         
        ];
        
        return view('chat.message', $renderData);
        //print_r(compact('messages'));
    }

    public function show(Users $user)
    {
        echo auth()->id().'--';
        print_r($user->id);
       // exit();
        $messages = Messages::where(function($q) use ($user) {
            $q->where('from', auth()->id());
            $q->where('to', $user->id);
        })->orWhere(function($q) use ($user) {
            $q->where('from', $user->id);
            $q->where('to', auth()->id());
        })->orderBy('created_at', 'asc')->get();

        return view('chat.show', compact('user', 'messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'to' => 'required|exists:users,id',
            'message' => 'required|string'
        ]);

        $message = Messages::create([
            'from' => auth()->id(),
            'to' => $request->to,
            'message' => $request->message
        ]);

        broadcast(new NewMessage($message))->toOthers();

        return response()->json($message);
    }
}

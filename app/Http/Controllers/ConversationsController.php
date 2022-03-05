<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessage;
use App\Http\Requests\StoreMessageRequest;
use App\Models\User;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repository\ConversationRepository;

class ConversationsController extends Controller
{
    /**
     * récuperation de CoversationsRepository
     */
    private $conversationRepository;
    private $authManager;

    public function __construct(ConversationRepository $conversationRepository, AuthManager $authManager)
    {
        $this->conversationRepository = $conversationRepository;
        $this->authManager = $authManager;
    }

    public function index(){
     return view('conversations.index');
    }

    public function show(User $user){
        $me = $this->authManager->user();
        $messages = $this->conversationRepository->getMessagesFor($me->id, $user->id)->paginate(50);
        $unread = $this->conversationRepository->unreadCount($me->id);

        if(isset($unread[$user->id])){
            $this->conversationRepository->readAllFrom($user->id, $me->id);
            unset($unread[$user->id]);
        }

        return view('conversations.show',[
            'users'=> $this->conversationRepository->getConversations($me->id),
            'user'=> $user,
            'messages'=> $messages,
            'unread'=> $unread
        ]);
    }

    public function store(User $user, StoreMessageRequest $request)
    {
        $this->conversationRepository->createMessages(
            $request->get('content'),
            $this->authManager->user()->id,
            $user->id
        );
        return redirect(route('conversations.show',[ $user->id]));
    }


}

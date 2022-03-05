<?php

namespace App\Repository;

use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class ConversationRepository{

/**
 * Récuperé les utilisateur
 */

private $user;
private $message;

public function __construct(User $user, Message $message)
{
    $this->user = $user;
    $this->message = $message;
}

public function getConversations (int $userId)
{
$conversations = $this->user->newQuery()
        ->select('name', 'id')
        ->where('id','!=', $userId)
        ->get();

return $conversations;
}


public function createMessages(string $content, int $from, int $to)
{
    return $this->message->newQuery()->create([
        'content'=>$content,
        'from_id'=>$from,
        'to_id'=>$to,
        'created_at'=> Carbon::now()
    ]);

}

public function getMessagesFor(int $from, int $to):Builder{

    return $this->message->newQuery()
       ->whereRaw( "((from_id = $from AND to_id = $to) OR (from_id = $to AND to_id = $from))")
       ->orderBy( 'created_at', 'DESC')
       ->with([
           'from'=> function ($query) { return $query->select('name', 'id');}
       ]);


}

/**
 * permet de récuperé tout les message non lu de l'utilisateur
 */

 public function unreadCount(int $userId){

    return $this->message->newQuery()
            ->where('to_id', $userId)
            ->groupBy('from_id')
            ->selectRaw('from_id, COUNT(id) as count')
            ->whereRaw('read_at IS NULL')
            ->get()
            ->pluck('count', 'from_id');
 }

 /**
  * marque comme lu tous les message de cet utilisateur
  */


  public function readAllFrom(int $from , int $to){
    $this->message
    ->where('from_id', $from)
    ->where('to_id', $to)
    ->update(['read_at' => Carbon::now()]);
  }
}

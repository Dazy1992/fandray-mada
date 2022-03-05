<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'from_id',
        'to_id',
        'read_at',
        'created_ad'
    ];

    public $timestamps = false;

    protected $dates = ['created_at', 'read_at'];
/**
 * relation avec user(message arrivé)
 */
    public function from(){
        return $this->belongsTo(User::class, 'from_id');
    }

   public function serializeDate(DateTimeInterface $date){
        return $date->format('c');
    }
}

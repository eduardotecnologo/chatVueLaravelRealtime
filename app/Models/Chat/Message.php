<?php

namespace App\Chat\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Message extends Model
{
    protected $fillable = ['body'];

    public function user(){
        $this->belongsTo(User::class);
    }
}

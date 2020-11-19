<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class UserLike extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'gift_id'
    ];

    public function user()
    {
        return $this->hasOne(\App\User::class, 'id', 'user_id');
    }

    public function gift()
    {
        return $this->hasOne(\App\GiftDetail::class, 'id', 'gift_id');
    }
}

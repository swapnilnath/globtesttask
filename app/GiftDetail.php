<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class GiftDetail extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'gift_name',
        'store_id',
        'gift_image','description','price','post_gift_detail'
    ];
}

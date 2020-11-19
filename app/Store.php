<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Store extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'store_name',
        'email',
        'store_image','mobile','address','status'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $guarded = ['id'];

    // protected $hidden = ['id', 'type_id', 'created_at', 'updated_at'];
}

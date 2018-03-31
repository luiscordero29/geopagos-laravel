<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kblais\Uuid\Uuid;

class Favorite extends Model
{
    use Uuid;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'favorites';
}

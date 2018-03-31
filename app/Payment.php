<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kblais\Uuid\Uuid;

class Payment extends Model
{
    use Uuid;
    
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'payments';
}

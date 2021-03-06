<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kblais\Uuid\Uuid;

class UserPayment extends Model
{
    use Uuid;
    
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'users_payments';

    /**
     * User
     */
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}

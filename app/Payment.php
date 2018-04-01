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

    /**
     * UserPayment
     */
    public function userpayment()
    {
        return $this->hasOne('App\UserPayment', 'payment_id', 'id');
    }
}

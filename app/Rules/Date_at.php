<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Date_at implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $date_at = explode('/', $value);
        $date_at = date($date_at[2].'-'.$date_at[1].'-'.$date_at[0]);
        return date('Y-m-d') <= $date_at;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La fecha debe ser superior o igual al de hoy';
    }
}

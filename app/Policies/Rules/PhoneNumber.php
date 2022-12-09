<?php

namespace App\Policies\Rules;


use Illuminate\Contracts\Validation\Rule;

class PhoneNumber implements Rule
{


    /**
     * @param $attribute
     * @param $value
     * @return bool|int
     */
    public function passes($attribute, $value)
    {
        return preg_match("/^7[7680][0-9]{7}$/", $value);

    }

    /**
     * @return string
     */
    public function message(): string
    {
       return "telephone invalide";
    }
}

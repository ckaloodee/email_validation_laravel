<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MyValidEmailValidationRule implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $pattern = '/\A(?=[a-zA-Z0-9@.!#$%&\'*+=?^_‘{|}~-]{6,254}\z)(?=[a-zA-Z0-9.!#$%&\'*+=?^_‘{|}~-]{1,64}@)[a-zA-Z0-9!#$%&\'*+=?^_‘{|}~-]+(?:\.[a-zA-Z0-9!#$%&\'*+=?^_‘{|}~-]+)*@(?:(?=[a-zA-Z0-9-]{1,63}\.)[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+(?=[a-zA-Z0-9-]{1,63}\z)[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\z/iu';
        return preg_match($pattern, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'invalid_email_code';
    }

}

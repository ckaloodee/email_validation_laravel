<?php

declare(strict_types=1);

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MyValidEmailValidationRule implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     *   The attribute.
     * @param string $value
     *   The given email value.
     *
     * @return bool
     */
    public function passes(string $attribute, string $value): bool
    {
        $pattern = '/\A(?=[a-zA-Z0-9@.!#$%&\'*+=?^_‘{|}~-]{6,254}\z)(?=[a-zA-Z0-9.!#$%&\'*+=?^_‘{|}~-]{1,64}@)[a-zA-Z0-9!#$%&\'*+=?^_‘{|}~-]+(?:\.[a-zA-Z0-9!#$%&\'*+=?^_‘{|}~-]+)*@(?:(?=[a-zA-Z0-9-]{1,63}\.)[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+(?=[a-zA-Z0-9-]{1,63}\z)[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\z/iu';
        return preg_match($pattern, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'invalid_email_code';
    }
}

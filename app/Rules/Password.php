<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class Password implements Rule
{
    /**
     * The minimum length of the password.
     *
     * @var int
     */
    protected $length = 3;

    /**
     * Indicates if the password must contain one uppercase character.
     *
     * @var bool
     */
    protected $requireUppercase = false;

    /**
     * Indicates if the password must contain one numeric digit.
     *
     * @var bool
     */
    protected $requireNumeric = false;

    /**
     * Indicates if the password must contain one special character.
     *
     * @var bool
     */
    protected $requireSpecialCharacter = false;

    /**
     * The message that should be used when validation fails.
     *
     * @var string
     */
    protected $message;

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->requireUppercase && Str::lower($value) === $value) {
            return false;
        }

        if ($this->requireNumeric && !preg_match('/[0-9]/', $value)) {
            return false;
        }

        if ($this->requireSpecialCharacter && !preg_match('/[\W_]/', $value)) {
            return false;
        }

        return Str::length($value) >= $this->length;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        if ($this->message) {
            return $this->message;
        }

        switch (true) {
            case $this->requireUppercase
                && !$this->requireNumeric
                && !$this->requireSpecialCharacter:
                return __(':attribute iň bolmanda :length nyşany bolmaly we azyndan bir baş harpdan ybarat bolmaly.', [
                    'length' => $this->length,
                ]);

            case $this->requireNumeric
                && !$this->requireUppercase
                && !$this->requireSpecialCharacter:
                return __(':attribute iň bolmanda :length nyşany bolmaly we azyndan bir sandan ybarat bolmaly.', [
                    'length' => $this->length,
                ]);

            case $this->requireSpecialCharacter
                && !$this->requireUppercase
                && !$this->requireNumeric:
                return __(':attribute iň bolmanda :length nyşany bolmaly we azyndan bir aýratyn nyşandan ybarat bolmaly.', [
                    'length' => $this->length,
                ]);
            case $this->requireUppercase
                && $this->requireNumeric
                && !$this->requireSpecialCharacter:
                return __(':attribute iň bolmanda :length nyşany bolmaly we azyndan bir baş harp hem-de bir sandan ybarat bolmaly.', [
                    'length' => $this->length,
                ]);

            case $this->requireUppercase
                && $this->requireSpecialCharacter
                && !$this->requireNumeric:
                return __(':attribute iň bolmanda :length nyşany bolmaly we azyndan bir baş harp hem-de bir aýratyn nyşandan ybarat bolmaly.', [
                    'length' => $this->length,
                ]);

            case $this->requireUppercase
                && $this->requireNumeric
                && $this->requireSpecialCharacter:
                return __(':attribute iň bolmanda :length nyşany bolmaly we azyndan bir baş harp, bir san hem-de bir aýratyn nyşandan ybarat bolmaly.', [
                    'length' => $this->length,
                ]);

            case $this->requireNumeric
                && $this->requireSpecialCharacter
                && ! $this->requireUppercase:
                return __(':attribute iň bolmanda :length nyşany bolmaly we azyndan bir aýratyn nyşan hem-de bir san bolmaly.', [
                    'length' => $this->length,
                ]);

            default:
                return __(':attribute iň bolmanda :length nyşandan ybarat bolmaly.', [
                    'length' => $this->length,
                ]);
        }
    }

    /**
     * Set the minimum length of the password.
     *
     * @param int $length
     * @return $this
     */
    public function length(int $length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Indicate that at least one uppercase character is required.
     *
     * @return $this
     */
    public function requireUppercase()
    {
        $this->requireUppercase = true;

        return $this;
    }

    /**
     * Indicate that at least one numeric digit is required.
     *
     * @return $this
     */
    public function requireNumeric()
    {
        $this->requireNumeric = true;

        return $this;
    }

    /**
     * Indicate that at least one special character is required.
     *
     * @return $this
     */
    public function requireSpecialCharacter()
    {
        $this->requireSpecialCharacter = true;

        return $this;
    }

    /**
     * Set the message that should be used when the rule fails.
     *
     * @param string $message
     * @return $this
     */
    public function withMessage(string $message)
    {
        $this->message = $message;

        return $this;
    }
}

<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidCnpj implements ValidationRule
{
    private const LENGTH = 14;
    private const FIRST_CHECK_DIGIT = 5;
    private const FIRST_CHECK_POSITION = 12;
    private const SECOND_CHECK_DIGIT = 6;
    private const SECOND_CHECK_POSITION = 13;

    private string $value;

    /**
     * Run the validation rule.
     *
     * @param \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $this->value = only_numbers($value);

        if (!$this->validateLength()) {
            $fail("O campo {$attribute} deve ter exatamente " . self::LENGTH . " dígitos.");
            return;
        }

        if (!$this->validateSingleCharacters()) {
            $fail("O campo {$attribute} não deve conter todos os dígitos iguais.");
            return;
        }

        if (!$this->validateFirstCheckDigit()) {
            $fail("O campo {$attribute} possui um primeiro dígito verificador inválido.");
            return;
        }

        if (!$this->validateSecondCheckDigit()) {
            $fail("O campo {$attribute} possui um segundo dígito verificador inválido.");
        }
    }

    private function validateLength(): bool
    {
        return strlen($this->value) == self::LENGTH;
    }

    private function validateSingleCharacters(): bool
    {
        $length = self::LENGTH - 1;
        return !preg_match(sprintf('/(\d)\1{%d}/', $length), $this->value);
    }

    private function calcCheckDigit(int $checkDigit, int $position): bool
    {
        for ($i = 0, $sum = 0; $i < $position; $i++) {
            $sum += $this->value[$i] * $checkDigit;
            $checkDigit = ($checkDigit == 2) ? 9 : $checkDigit - 1;
        }
        $remainder = $sum % 11;
        $digit = $remainder < 2 ? 0 : 11 - $remainder;

        return $this->value[$position] == $digit;
    }

    private function validateFirstCheckDigit(): bool
    {
        return $this->calcCheckDigit(
            self::FIRST_CHECK_DIGIT,
            self::FIRST_CHECK_POSITION
        );
    }

    private function validateSecondCheckDigit(): bool
    {
        return $this->calcCheckDigit(
            self::SECOND_CHECK_DIGIT,
            self::SECOND_CHECK_POSITION
        );
    }
}

<?php

if (!function_exists('only_numbers')) {
    /**
     * Remove all non-numeric characters from a string.
     *
     * @param string $string
     * @return string
     */
    function only_numbers(string $string): string
    {
        return preg_replace('/[^0-9]/', '', $string);
    }
}

if (!function_exists('enum_values')) {
    /**
     * Get the values of an enum.
     *
     * @param string $enum
     * @return array
     */
    function enum_values(string $enum): array
    {
        return array_values($enum::toArray());
    }
}

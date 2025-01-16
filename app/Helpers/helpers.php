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

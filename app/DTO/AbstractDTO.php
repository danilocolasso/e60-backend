<?php

namespace App\DTO;

use JsonSerializable;

abstract class AbstractDTO implements JsonSerializable
{
    public function jsonSerialize(): array
    {
        $data = get_object_vars($this);

        return $this->toSnakeCaseArray($data);
    }

    /**
     * Recursively convert array/object structure into snake_case keys.
     *
     * @param mixed $value The current item to transform (array, object, or scalar).
     * @return mixed
     */
    private function toSnakeCaseArray(mixed $value): mixed
    {
        if ($value instanceof JsonSerializable) {
            return $this->toSnakeCaseArray($value->jsonSerialize());
        }

        if (is_array($value)) {
            $result = [];
            foreach ($value as $key => $item) {
                $snakeKey = is_string($key) ? $this->camelToSnake($key) : $key;
                $result[$snakeKey] = $this->toSnakeCaseArray($item);
            }
            return $result;
        }

        return $value;
    }

    /**
     * Convert "camelCase" or "PascalCase" to "snake_case".
     */
    private function camelToSnake(string $input): string
    {
        $snake = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $input));
        return ltrim($snake, '_');
    }
}

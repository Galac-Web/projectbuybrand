<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Between implements CastsAttributes
{
    /** @var string */
    private $min;

    /** @var string */
    private $max;

    /** @var string */
    private $delimeter;

    public function __construct(string $min = 'min', string $max = 'max', string $delimeter = '_')
    {
        $this->min = $min;
        $this->max = $max;
        $this->delimeter = $delimeter;
    }
    
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function get($model, string $key, $value, array $attributes): object
    {
        return (object) [
            $this->min => $attributes[$this->postfix($key, 'min')],
            $this->max => $attributes[$this->postfix($key, 'max')],
        ];
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, string $key, $value, array $attributes): array
    {
        return [
            $this->postfix($key, 'min') => $value[0],
            $this->postfix($key, 'max') => $value[1],
        ];
    }

    private function postfix(string $key, string $type): string
    {
        return sprintf('%s%s%s', $key, $this->delimeter, $this->$type);
    }
}

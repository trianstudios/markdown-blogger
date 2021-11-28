<?php


namespace trianstudios\Press;


use Illuminate\Support\Str;

class Press
{

    protected array $fields = [];

    public function configNotPublished(): bool
    {
        return is_null(config('press'));
    }

    public function driver()
    {
        $driver = Str::title(config('press.driver'));

        $class = 'trianstudios\\Press\\Drivers\\' . $driver . 'Driver';

        return new $class;
    }

    public function path()
    {
        return config('press.routesPrefix', 'blogs');
    }

    public function fields(array $fields)
    {
        $this->fields = array_merge($this->fields, $fields);
    }

    public function availableFields() : array
    {
        return array_reverse($this->fields);
    }
}
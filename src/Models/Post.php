<?php


namespace trianstudios\Press\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory(): \trianstudios\Press\Database\Factories\PostFactory
    {
        return \trianstudios\Press\Database\Factories\PostFactory::new();
    }

    public function extra($field)
    {
        return optional(json_decode($this->extra))->$field;
    }

}
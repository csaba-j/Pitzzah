<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pizza extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'category',
        'img',
        'price'
    ];

    /**
     * Gets all the pizzas from the database.
     */
    public static function getAll() {
        return Pizza::all();
    }

    /**
     * Gets a single pizza from the database based on its id.
     */
    public static function getById($id) {
        return Pizza::find($id);
    }
}

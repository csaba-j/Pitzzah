<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

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

    public static function getAll() {
        return Pizza::all();
    }

    public static function getById($id) {
        return Pizza::find($id);
    }
}

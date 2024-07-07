<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = ['name','packageType','location','price','features','details','image'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}

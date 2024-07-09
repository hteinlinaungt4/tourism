<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = ['name','packageType','location','price','features','details','image1','image2','image3','image4','image5'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}

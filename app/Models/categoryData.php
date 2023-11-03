<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class categoryData extends Model
{
    use HasFactory;

    public $table="category_data";
    public $timestamps=true;

    protected $fillable=['title','image'];
}

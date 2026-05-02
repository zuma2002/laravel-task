<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'customers-100000';
    protected $primaryKey = 'Index'; // Laravel needs to know this is the ID
    public $incrementing = true;    // Ensure this is true if Index is an auto-incrementing number
    protected $keyType = 'int';      // Set to 'string' if your Index isn't a number

    public $timestamps = false;
    protected $guarded = [];
}

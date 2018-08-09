<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $fillable = ['name', 'lat', 'long', 'company_id'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessFortunate extends Model
{
    protected $table = 'less_fortunates';

    public $primaryKey = 'id';

    public $timestamps = true;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';

    public $primaryKey = 'id';

    public $timestamps = true;
}

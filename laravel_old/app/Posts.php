<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';

    /**
     * Define guarded columns
     *
     * @var array
     */
    protected $guarded = array('id');
}

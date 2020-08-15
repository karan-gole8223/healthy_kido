<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Post extends Model
{
    //table name
    protected $table ='posts';
    //primary key
    public $primaryKey ='id';
    //timestamps
    public $timeStamps = 'true';

    public function user()
    {
        return $this-> belongsTo('App\User');
    }
}

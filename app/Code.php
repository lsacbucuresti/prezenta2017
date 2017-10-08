<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected  $table = 'codes';

    public $timestamps = false;

    protected $guarded = ['id'];

    public function getAdmin(){
        return $this->hasOne('App\Admin','id','admin_id')->select('username');
    }
}

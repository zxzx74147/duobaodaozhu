<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Item extends Model
{
    protected $table = 'item_dbd';//

    public function item_jd(){
        return $this->hasOne('App\Model\ItemJD', 'id', 'jd_item_id');
    }
}

<?php

namespace App\Models;


class Coupon extends BaseModel
{
    //
    protected $table = 'coupon';

    /**
     * 列表
     * @param $pid
     * @return mixed
     */
    public function getList(){
       return $this->get();
    }


}

<?php

namespace App\Models;


use Illuminate\Support\Facades\DB;

class UserCoupon extends BaseModel
{
    //
    protected $table = 'user_coupon';
    static $status = ['未使用','已使用','已过期'];
    /**
     * 列表
     * @param $pid
     * @return mixed
     */
    public function getList(){
       return DB::table($this->table .' as uc')
           ->join('coupon as c','c.id','=','uc.coupon_id')
           ->select('uc.*','c.name')
           ->get();
    }


}

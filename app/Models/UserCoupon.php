<?php

namespace App\Models;


use Illuminate\Support\Facades\DB;

/**
 * App\Models\UserCoupon
 *
 * @property int $id
 * @property int $user_id
 * @property int $coupon_id
 * @property int $add_time
 * @property int $status 0 未使用 1已使用 2过期
 * @property int|null $out_time 过期时间
 * @property int|null $order_id 关联订单
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserCoupon whereAddTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserCoupon whereCouponId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserCoupon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserCoupon whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserCoupon whereOutTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserCoupon whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserCoupon whereUserId($value)
 * @mixin \Eloquent
 */
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

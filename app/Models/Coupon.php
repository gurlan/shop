<?php

namespace App\Models;


/**
 * App\Models\Coupon
 *
 * @property int $id
 * @property string|null $name
 * @property float $require
 * @property float $cheap
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Coupon whereCheap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Coupon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Coupon whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Coupon whereRequire($value)
 * @mixin \Eloquent
 */
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

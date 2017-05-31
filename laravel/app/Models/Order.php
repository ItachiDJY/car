<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	//重定义表名
    public $table = 'order';
    //指定主键
    public $primaryKey = 'order_id';
    //默认添加开始时间和结束时间 默认开启true
    public $timestamps = false;
    //
    protected $dateFormat = 'U';
    //
    protected $fillable = ['order_id' , 'order_no' , 'user_id' , 'order_status' , 'create_time' , 'pay_status' , 'order_amount' , 'coupon_amount' , 'discount_amount' , 'final_amount' , 'car_id' , 'region_id' , 'pop_type' , 'pop_time' , 'pop_address' , 'return_type' , 'return_time' , 'return_address' , 'pre_days' ,'service_amount' , 'foregift','is_delete'];
    //被重写的字段
    protected $guarded = [''];
    //隐藏字段
    protected $hidden = [];

    //订单列表展示
    // public function orderlist()
    // {
    //     return $this->get()->paginate(5);
    // }

    //删除订单
    public function dele($data)
    {
        return $this->where($data)
                    ->delete();
    }

    //加入回收站后展示
    public function recycleadd()
    {
        return $this->where('is_delete','!=',1)->simplePaginate(5);
    }

    //回收站列表展示
    // public function recycle_list()
    // {
    //     return $this->where('is_delete','=',1)->paginate(5);
    // }

    //回收站列表展示
    public function recycle_list()
    {
        return $this->where('is_delete','=',1)->get()->toArray();
    }
}

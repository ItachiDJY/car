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
    protected $fillable = ['order_id' , 'order_no' , 'user_phone' , 'order_status' , 'create_time' , 'pay_status' , 'order_amount' , 'coupon_amount' , 'discount_amount' , 'final_amount' , 'plate_number' , 'region_id' , 'pop_type' , 'pop_time' , 'pop_address' , 'return_type' , 'return_time' , 'return_address' , 'pre_days' ,'service_amount' , 'foregift' , 'is_delete'];
    //被重写的字段
    protected $guarded = [''];
    //隐藏字段
    protected $hidden = [];

     //删除订单
    public function dele($data)
    {
        return $this->where($data)
                    ->delete();
    }

    //加入回收站后展示 
    public function recycleadd()
    {
        return $this->where('is_delete','!=',1)->get()->toArray();
    }
    
    //回收站列表展示
    public function recycle_list()
    {
        return $this->where('is_delete','=',1)->get()->toArray();
    }

    //添加订单
    public function add_order($data)
    {
        $this->fill($data);
        return $this->save();
    }

    //订单详情查询 单条数据
    public function order_detail($data)
    {
        return $this->where('order_id',$data)->first()->toArray();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store_phone extends Model
{
	//重定义表名
    public $table = 'store_phone';
    //指定主键
    public $primaryKey = 'phone_id';
    //默认添加开始时间和结束时间 默认开启true
    public $timestamps = false;
    //
    protected $dateFormat = 'U';
    //
    protected $fillable = ['phone_id' , 'store_phone' , 'store_id'];
    //被重写的字段
    protected $guarded = ['*'];
    //隐藏字段
    protected $hidden = [];

    //查询一条数据
    public function get_one($data)
    {
        return $this->where($data)->first()->toArray();
    }

    //查询多条数据
    public function get_all()
    {
        return $this->get()->toArray();
    }

    
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
	//重定义表名
    public $table = 'information';
    //指定主键
    public $primaryKey = 'car_id';
    //默认添加开始时间和结束时间 默认开启true
    public $timestamps = false;
    //
    protected $dateFormat = 'U';
    //
    protected $fillable = ['car_id' , 'plate_number' , 'car_status' , 'car_img' , 'deploy_id' , 'renta_num' , 'region_id'];
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
    public function get_all($data)
    {
        return $this->where($data)->get()->toArray();
    }

    
}


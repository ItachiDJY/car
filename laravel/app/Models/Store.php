<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
	//重定义表名
    public $table = 'store';
    //指定主键
    public $primaryKey = 'store_id';
    //默认添加开始时间和结束时间 默认开启true
    public $timestamps = false;
    //
    protected $dateFormat = 'U';
    //
    protected $fillable = ['store_id' , 'store_name' , 'parent_id'];
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
        return $this->where($data)->get()->toArray();
    }

    //根据一级城市id 查询该ID下对应的门店
    public function get_tree($arr , $parent_id)
    {
        $result = [];
        if ($arr) {
            foreach ($arr as $key=>$val) {
                if ($val['parent_id'] == $parent_id) {
                    $result[$key] = $val;
                    $result[$key]['city'] = $this->get_tree($arr , $val['store_id']);
                }
                
            }
        }

        return $result;
    }
}


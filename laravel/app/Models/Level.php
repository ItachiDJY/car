<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    //表名
    protected  $table='member';
    //指定主键
    protected  $primaryKey='member_id';
    ////被重写的字段
    protected  $guarded=["*"];
    //默认添加开始时间和结束时间，默认开启ture
    public $timestamps=false;
    protected $fillable = ['member_name','min_consum','max_consum','point_change'];
    //查看所有的方法
    public function selectAll()
    {
        return $this->get()->toArray();
    }
    //查询单条
    public function select($id)
    {
        return $this->where('member_id',$id)->get()->toArray();
    }
    //添加
    public function add($data)
    {
        $this->fill($data);
        return $this->save();
    }
    //删除
    public function del($id)
    {
        return $this->whereIn('member_id',$id)->delete();
    }
    //修改操作
    public function updates($data,$id)
    {
        return $this->where('member_id',$id)->update($data);
    }
}
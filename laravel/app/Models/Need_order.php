<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Need_order extends Model
{
    //表名
    protected  $table='need_order';
    //指定主键
    protected  $primaryKey='need_id';
    ////被重写的字段
    protected  $guarded=['*'];
    //默认添加开始时间和结束时间，默认开启ture
    public $timestamps=false;
    protected $fillable = ['need_id','city','pop_time','lease','lease_num','brand','audi_brand','contacts','link_phone','email','company','status'];
    //查看所有的方法
    public function selectAll(){
        return $this->get()->toArray();
    }
    //查询单条
    public function select($car_id){
        return $this->where('need_id',$car_id)->get()->toArray();
    }
    //添加操作   返回id值
    public function insert($data)
    {
        $this->fill($data);  		 // 设置值  data为数组
        $this->save();

        return $this->attributes['need_id'];
    }
    //添加操作 
    public function adds($data)
    {
        $this->fill($data);
        $info = $this->save();
        return $info;
    }
    //删除
    public function del($id){
        return $this->whereIn('need_id',$id)->delete();
    }
    //修改操作
    public function updates($data,$id){

        $resume= $this->where('need_id',$id);
        return $resume->update($data);
    }
}


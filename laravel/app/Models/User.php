<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //表名
    protected  $table='user';
    //指定主键
    protected  $primaryKey='user_id';
    ////被重写的字段
    protected  $guarded=["*"];
    //默认添加开始时间和结束时间，默认开启ture
    public $timestamps=false;
    protected $fillable = ['user_name','user_pwd','pwd_hash','user_phone','user_email','user_photo','user_point','user_level','id_type','id_number'];
    //查看所有的方法
    public function selectAll()
    {
        return $this->get()->toArray();
    }
    //查询单条
    public function select($id)
    {
        return $this->where('user_id',$id)->get()->toArray();
    }
    //删除
    public function del($id)
    {
        return $this->whereIn('user_id',$id)->delete();
    }
    //修改操作
    public function updates($data,$id)
    {
        return $this->where('user_id',$id)->update($data);
    }
}
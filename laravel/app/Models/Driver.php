<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model 
{
	//表名
	protected  $table='driver';
	//指定主键
    protected  $primaryKey='driver_id';
    ////被重写的字段
    protected  $guarded=['*'];
    //默认添加开始时间和结束时间，默认开启ture
    public $timestamps=false;
    protected $fillable = ['driver_name','region_id','driver_phone','driver_sex','idcard','license_img','status'];
	//查看所有的方法
	public function selectAll(){
		return $this->get()->toArray();
	}
	//查询单条
	public function select($driver_id){
        return $this->where('driver_id',$driver_id)->get()->toArray();
    }
    //添加操作   返回id值
    public function insert($data)
    {
    	$this->fill($data);  		 // 设置值  data为数组
		$this->save();
        
        return $this->attributes['driver_id'];  
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
        $data=$this->find($id);
       return $data->delete();
    }
    //修改操作
    public function updates($data,$id){
       
        $resume= $this->where('driver_id',$id);
        return $resume->update($data);
    }
}


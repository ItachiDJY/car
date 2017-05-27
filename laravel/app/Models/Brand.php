<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model 
{
	//表名
	protected  $table='brand';
	//指定主键
    protected  $primaryKey='brand_id';
    ////被重写的字段
    protected  $guarded=["*"];
    //默认添加开始时间和结束时间，默认开启ture
    public $timestamps=false;
    protected $fillable = ['brand_name','brand_logo','parent_id','path'];
	//查看所有的方法
	public function selectAll(){
		return $this->get()->toArray();
	}
	//查询单条
	public function select($id){
        return $this->where('brand_id',$id)->first()->toArray();
    }
    //添加操作   返回id值
    public function insert($data)
    {
    	$this->fill($data);  		 // 设置值  data为数组
		$this->save();
        
        return $this->attributes['brand_id'];  
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
    //批量删除
    public function pdel($ids){
       // $data=$this->get();
        return $this->whereIn('brand_id',$ids)->delete();
    }
    //修改操作
    public function updates($data,$id){
       
        $resume= $this->where('brand_id',$id);
        return $resume->update($data);
    }

    /*//修改操作
    public function brandSelect(){
       
       return $this ->orderBy("depath")->get()->toArray();
       
    }*/


}


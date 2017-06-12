<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model 
{
	//表名
	protected  $table='store';
	//指定主键
    protected  $primaryKey='store_id';
    ////被重写的字段
    protected  $guarded=['*'];
    //默认添加开始时间和结束时间，默认开启ture
    public $timestamps=false;
    protected $fillable = ['store_name','parent_id'];
	//查看所有的方法
	public function selectAll(){
		return $this->get()->toArray();
	}
	//查询单条
	public function select($id){
        return $this->where('parent_id',$id)->get()->toArray();
    }
    //添加操作   返回id值
    public function insert($data)
    {
    	$this->fill($data);  		 // 设置值  data为数组
		$this->save();
        
        return $this->attributes['store_id'];  
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
       
        $resume= $this->where('store_id',$id);
        return $resume->update($data);
    }

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


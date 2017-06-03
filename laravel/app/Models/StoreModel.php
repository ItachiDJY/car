<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreModel extends Model
{

    //表名
    protected  $table='store';


    //递归子级          封装的方法
    public function get_cat_son($store_id)
    {
        static $result=array();
        $cat_son = $this->where('parent_id',$store_id)->get()->toArray();
        if($cat_son)
        {
            foreach($cat_son as $k1=>$v1)
            {
                $result[]=$v1;
                $this->get_cat_son($v1['store_id']);
            }
        }
        return $result;

    }


    //根据城市名称查出城市id
    public function get_id($city_name)
    {
        $data = $this->where('store_name',$city_name)->first();
        return $data->store_id;

    }



    //递归查询分类       封装的方法
    public function get_cat_childs($cat_list,$parent_id)
    {
        $result=array();
        if(!empty($cat_list))
        {
            foreach($cat_list as $key=>$value)
            {
                if($value['parent_id']==$parent_id)
                {
                    $result[$key]=$value;
                    $result[$key]['son']=$this->get_cat_childs($cat_list,$value['store_id']);
                }
            }
        }
        return $result;
    }



}

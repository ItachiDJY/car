<?php

namespace App\Model;
use DB;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //指定别的表名
    public $table = 'admin';

    //指定别的主键
    protected $primaryKey = 'id';

   //关闭时间戳
    public $timestamps = false;

   /**
    * 查询一条sql语句
    * 返回单个StdClass对象
    */
    public function selectOne($table,$field,$value)
    {
        return DB::table($table)->where($field, $value)->first();
    }

    /**
     * 查询某个字段的值
     * 返回值
     * 介绍：如果你不需要完整的一行，可以使用value方法从结果中获取单个值，该方法会直接返回指定列的值：
     * $email = DB::table('users')->where('name', 'John')->value('email');
     */


    /**
     * 如果想要获取包含单个列值的数组，可以使用lists方法，在本例中，我们获取所有title的数组：
     * $titles = DB::table('roles')->lists('title');
     */

    /**
     *查询所有数据
     * 返回对象
     */
    public function selectAll($table,$field,$value)
    {
        return DB::table($table)->where($field, $value)->get();
    }

    /**
     *插入一条数据
     * 返回受影响的行数
     */
    public function add($table,$data)
    {
        return DB::table($table)->insert($data);
    }

    /**
     *删除
     * 返回受影响的行数
     */
    public function del($table,$field,$value)
    {
        return DB::table($table)->where($field,'=',$value)->delete();
    }
}

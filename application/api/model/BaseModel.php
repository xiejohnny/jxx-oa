<?php
/**
 * 基础模型
 * @author jxx
 * @time 2017/4/3
 */
namespace app\api\model;

use think\Model;
use think\DB;

class BaseModel extends Model
{
	protected $resultSetType = 'collection';

    /**
     * 获取一条数据
     * @param array $where 条件
     * @return array
     * @author jxx
     * @time 2017/4/2
     */
	static public function getRow($where=[])
    {
        $class = static::class;
        $object = new $class();
        $data = Db::table($object->table);
        if(isset($object->baseWhere) && $object->baseWhere){
            $where = array_merge($object->baseWhere, $where);
        }
        $row = $data->where($where)->find();
        return $row;
    }

    /**
     * 根据ID获取一条数据
     * @param int $id 主键ID
     * @return array
     * @author jxx
     * @time 2017/4/2
     */
	static public function getRowById($id=0)
    {
        $row = self::getRow(['id' => $id]);
        return $row;
    }

    /**
     * 获取数据列表
     * @param array $where 条件
     * @param int $page 页数
     * @param int $pagesize 每页条数
     * @return array
     * @author jxx
     * @time 2017/4/2
     */
    static public function getList($where=[], $page=0, $pagesize=10)
    {
        $class = static::class;
        $object = new $class();
        $data = Db::table($object->table);
        if(isset($object->baseWhere) && $object->baseWhere){
            $where = array_merge($object->baseWhere, $where);
        }
        if($where){
            $data = $data->where($where);
        }
        $data = $data->order('id DESC');
        if($page > 0){
            $data = $data->paginate(['page' => $page, 'list_rows' => $pagesize]);
            if($data) $data = $data->toArray();
        }else{
            $data = $data->select();
        }
        return $data;
    }

    /**
     * 添加一条数据
     * @param array $postData 提交参数
     * @return bool|array
     * @author jxx
     * @time 2017/6/10
     */
    static public function addRow($postData=[])
    {
        $postData['created_at'] = date('Y-m-d H:i:s');
        $postData['updated_at'] = date('Y-m-d H:i:s');
        $class = static::class;
        $insert = new $class($postData);
        $insert->allowField(true)->save();
        return $insert ? $insert : false;
    }

    /**
     * 根据ID修改一条数据
     * @param int $id 主键ID
     * @param array $postData 修改数据
     * @return bool
     * @author jxx
     * @time 2017/6/10
     */
    static public function updateRowById($id=0, $postData=[])
    {
        $postData['updated_at'] = date('Y-m-d H:i:s');
        $class = static::class;
        $insert = new $class();
        $insert->allowField(true)->save($postData, ['id' => $id]);
        return $insert ? true : false;
    }

    /**
     * 修改一条数据
     * @param array $where 条件
     * @param array $postData 修改数据
     * @return bool
     * @author jxx
     * @time 2017/10/4
     */
    static public function updateRow($where=[], $postData=[])
    {
        $postData['updated_at'] = date('Y-m-d H:i:s');
        $class = static::class;
        $insert = new $class();
        $insert->allowField(true)->save($postData, $where);
        return $insert ? true : false;
    }
}
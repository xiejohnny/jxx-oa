<?php
/**
 * 基础模型
 * @author jxx
 * @time 2017/4/3
 */
namespace app\api\model;

use think\Model;

class BaseModel extends Model
{
	protected $resultSetType = 'collection';

	static public $_returns = [];

    /**
     * 获取一条数据
     * @param array $where 条件
     * @return array
     * @author jxx
     * @time 2017/4/2
     */
	static public function getRow($where=[])
    {
        $row = self::get($where);
        if($row) return $row->toArray();
        return [];
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
        $row = self::get(['id'=>$id]);
        if($row) return $row->toArray();
        return [];
    }

    /**
     * 获取数据列表
     * @return array
     * @author jxx
     * @time 2017/4/2
     */
    static public function getList()
    {
        return self::all()->toArray();
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
     * 修改一条数据
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
}
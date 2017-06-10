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
}
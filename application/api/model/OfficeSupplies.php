<?php
/**
 * 办公用品模型
 * @author jxx
 * @time 2018/5/1
 */
namespace app\api\model;

class OfficeSupplies extends BaseModel
{
    protected $table = 'office_supplies';

    /**
     * 获取用品列表
     * @param string $keyword 搜索关键字
     * @param int $page 页码
     * @param int $pagesize 每页数量
     * @return array
     * @author jxx
     * @time 2017/9/9
     */
    static public function getList($keyword='', $page=0, $pagesize=10)
    {
        $where = [];
        if($keyword){
            $where['name'] = ['like', '%'.$keyword.'%'];
        }
        $data = parent::getList($where, $page, $pagesize);
        return $data;
    }
}
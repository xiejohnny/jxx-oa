<?php
/**
 * 角色模型
 * @author jxx
 * @time 2017/4/4
 */
namespace app\api\model;

class Role extends BaseModel
{
    protected $table = 'role';

    /**
     * 根据角色名称获取角色信息
     * @param string $name 角色名称
     * @return array
     * @author jxx
     * @time 2017/6/10
     */
    static public function getInfoByName($name='')
    {
        $row = Role::getRow(['name' => $name]);
        return $row;
    }

    /**
     * 获取角色列表
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
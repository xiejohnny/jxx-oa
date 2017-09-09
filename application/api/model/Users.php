<?php
/**
 * 用户模型
 * @author jxx
 * @time 2017/4/3
 */
namespace app\api\model;

class Users extends BaseModel
{
    protected $table = 'users';

    /**
     * 根据用户名获取用户信息
     * @param string $username 用户名
     * @return array
     * @author jxx
     * @time 2017/4/2
     */
	static public function getInfoByUsername($username='')
    {
        $row = Users::getRow(['username' => $username]);
        return $row;
    }

    /**
     * 获取员工列表
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
            $where['username'] = ['like', '%'.$keyword.'%'];
        }
        $data = parent::getList($where, $page, $pagesize);
        return $data;
    }
}
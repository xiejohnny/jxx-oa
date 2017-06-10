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
}
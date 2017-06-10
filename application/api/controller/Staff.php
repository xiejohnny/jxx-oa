<?php
/**
 * 员工控制器
 * @author jxx
 * @time 2017/4/2
 */
namespace app\api\controller;
use app\api\model\Users;

class Staff extends BaseController
{
    /**
     * 员工列表
     * @author jxx
     * @time 2017/4/2
     */
    public function getList()
    {
    	$users = Users::getList();

    	return view('list', ['users' => $users]);
    }
}
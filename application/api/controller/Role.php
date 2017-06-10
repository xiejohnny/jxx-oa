<?php
/**
 * 角色控制器
 * @author jxx
 * @time 2017/4/4
 */
namespace app\api\controller;
use app\api\model\Roles;

class Role extends BaseController
{
    /**
     * 角色列表
     * @author jxx
     * @time 2017/4/4
     */
    public function getList()
    {
    	$roles = Roles::getList();

    	return view('list', ['roles' => $roles]);
    }
}
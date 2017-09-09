<?php
/**
 * 菜单模型
 * @author jxx
 * @time 2017/4/3
 */
namespace app\api\model;

class Menu extends BaseModel
{
    protected $table = 'menu';

    /**
     * 获取菜单列表
     * @return array
     * @author jxx
     * @time 2017/4/3
     */
	static public function getMenuList()
	{
		return Menu::order('pid', 'ASC')->select();
	}

    /**
     * 获取处理过的菜单列表
     * @return array
     * @author jxx
     * @time 2017/4/9
     */
	static public function getHandleList()
    {
        //当前链接
        $reqPath = '/'.request()->path();
        $list = Menu::getMenuList();
        $list = Menu::menusHandle($list, $reqPath);
        return $list;
    }

    /**
     * 菜单处理
     * @param array $menus 菜单列表
     * @param string $reqPath 当前页面地址
     * @return array
     * @author jxx
     * @time 2017/4/4
     */
    static public function menusHandle($menus=[], $reqPath='')
    {
        foreach($menus as $key=>$val){
            if($val['url'] == $reqPath){
                $menus[$key]['js_active'] = 1;
                $menus = Menu::setPidActice($menus, $val['pid']);
            }
        }
        return $menus;
    }

    /**
     * 设置父级菜单active状态
     * @param array $menus 菜单列表
     * @param int $pid 父级ID
     * @return array
     * @author jxx
     * @time 2017/4/4
     */
    static public function setPidActice($menus=[], $pid=0)
    {
        foreach($menus as $key=>$val){
            if($val['id'] == $pid){
                $menus[$key]['js_active'] = 1;
                return Menu::setPidActice($menus, $val['pid']);
            }
        }
        return $menus;
    }
}
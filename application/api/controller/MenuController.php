<?php
/**
 * 菜单控制器
 * @author jxx
 * @time 2017/4/9
 */
namespace app\api\controller;
use app\api\model\Menu;

class MenuController extends BaseController
{
    var $is_ajax = true;
    /**
     * 菜单列表
     * @author jxx
     * @time 2017/4/9
     */
    public function getList()
    {
        $list = Menu::getHandleList();
        $list = get_tree($list);

        if($list){
            output_json(20000, '', $list);
        }
        output_json(20400, '没有数据');
    }

    /**
     * 获取菜单信息
     * @author jxx
     * @time 2017/6/10
     */
    public function getInfo()
    {
        $postData = request()->post();
        $info = Menu::getRowById($postData['id']);

        if($info){
            output_json(20000, '', $info);
        }
        output_json(20400, '没有数据');
    }
}
<?php
/**
 * 角色控制器
 * @author jxx
 * @time 2017/4/4
 */
namespace app\api\controller;
use app\api\model\Role;
use app\api\validate\RoleValidate;

class RoleController extends BaseController
{
    /**
     * 角色列表
     * @author jxx
     * @time 2017/4/4
     */
    public function getList()
    {
        $postData = request()->post();
        $page = $postData['page'] ? $postData['page'] : 1;
        $pagesize = $postData['pagesize'] ? $postData['pagesize'] : 10;
        $list = Role::getList($postData['keyword'], $page, $pagesize);

        if($list){
            output_json(20000, '成功', ['list' => $list['data'], 'pagesize' => $list['per_page'], 'total' => $list['total']]);
        }

        output_json(20400, '没有数据');
    }

    /**
     * 获取角色信息
     * @author jxx
     * @time 2017/6/10
     */
        public function getInfo()
    {
        $postData = request()->post();
        $info = Role::getRowById($postData['id']);

        if($info){
            output_json(20000, '成功', $info);
        }
        output_json(20400, '没有数据');
    }

    /**
     * 添加角色
     * @author jxx
     * @time 2017/6/10
     */
    public function add()
    {
        $postData = request()->post();
        //请求参数验证
        $validate = new RoleValidate($postData);
        $result = $validate->scene('add')->check($postData);
        if(true !== $result)
        {
            output_json(40000, $validate->getError());
        }
        $add = Role::addRow($postData);

        if($add){
            output_json(20000, '添加成功', ['id' => $add['id']]);
        }
        output_json(43000, '添加失败');
    }

    /**
     * 编辑角色
     * @author jxx
     * @time 2017/6/10
     */
    public function edit()
    {
        $postData = request()->post();
        //请求参数验证
        $validate = new RoleValidate($postData);
        $result = $validate->scene('edit')->check($postData);
        if(true !== $result)
        {
            output_json(40000, $validate->getError());
        }
        $update = Role::updateRowById($postData['id'], $postData);

        if($update){
            output_json(20000, '修改成功');
        }
        output_json(43000, '修改失败');
    }

    /**
     * 删除角色
     * @author jxx
     * @time 2017/6/10
     */
    public function delete()
    {
        $postData = request()->post();
        //请求参数验证
        $validate = new RoleValidate($postData);
        $result = $validate->scene('del')->check($postData);
        if(true !== $result)
        {
            output_json(40000, $validate->getError());
        }
        $update = Role::updateRowById($postData['id'], ['is_del' => 1]);

        if($update){
            output_json(20000, '删除成功');
        }
        output_json(43000, '删除失败');
    }
}
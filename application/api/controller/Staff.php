<?php
/**
 * 员工控制器
 * @author jxx
 * @time 2017/4/2
 */
namespace app\api\controller;
use app\api\model\Users;
use app\api\validate\StaffValidate;

class Staff extends BaseController
{
    /**
     * 员工列表
     * @author jxx
     * @time 2017/4/2
     */
    public function getList()
    {
        $postData = request()->post();
        $page = $postData['page'] ? $postData['page'] : 1;
        $pagesize = 10;
        $list = Users::getList([], $page, $pagesize);
        $total = Users::getCount();

        if($list){
            output_json(20000, '', ['list' => $list, 'pagesize' => $pagesize, 'total' => $total]);
        }
        output_json(20400, '没有数据');
    }

    /**
     * 获取员工信息
     * @author jxx
     * @time 2017/6/10
     */
    public function getInfo()
    {
        $postData = request()->post();
        $info = Users::getRowById($postData['id']);

        if($info){
            output_json(20000, '', ['info'=>$info]);
        }
        output_json(20400, '没有数据');
    }

    /**
     * 添加员工
     * @author jxx
     * @time 2017/6/10
     */
    public function add()
    {
        $postData = request()->post();
        //请求参数验证
        $validate = new StaffValidate($postData);
        $result = $validate->scene('add')->check($postData);
        if(true !== $result)
        {
            output_json(40000, $validate->getError());
        }
        if(!$postData['nickname']) $postData['nickname'] = $postData['username'];
        $postData['salt'] = create_salt();
        $postData['password'] = create_password($postData['password'], $postData['salt']);
        $add = Users::addRow($postData);

        if($add){
            output_json(20000, '添加成功', ['id' => $add['id']]);
        }
        output_json(43000, '添加失败');
    }

    /**
     * 编辑员工
     * @author jxx
     * @time 2017/6/10
     */
    public function edit()
    {
        $postData = request()->post();
        //请求参数验证
        $validate = new StaffValidate($postData);
        $result = $validate->scene('edit')->check($postData);
        if(true !== $result)
        {
            output_json(40000, $validate->getError());
        }
        //修改密码
        if($postData['password']){
            $info = Users::getRowById($postData['id']);
            $postData['password'] = create_password($postData['password'], $info['salt']);
        }
        $update = Users::updateRowById($postData['id'], $postData);

        if($update){
            output_json(20000, '修改成功');
        }
        output_json(43000, '修改失败');
    }

    /**
     * 冻结员工
     * @author jxx
     * @time 2017/6/10
     */
    public function freeze()
    {
        $postData = request()->post();
        //请求参数验证
        $validate = new StaffValidate($postData);
        $result = $validate->scene('freeze')->check($postData);
        if(true !== $result)
        {
            output_json(40000, $validate->getError());
        }
        $update = Users::updateRowById($postData['id'], ['is_freeze' => 1]);

        if($update){
            output_json(20000, '冻结成功');
        }
        output_json(43000, '冻结失败');
    }
}
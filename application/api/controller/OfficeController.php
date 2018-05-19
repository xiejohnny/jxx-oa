<?php
/**
 * 行政办公控制器
 * @author jxx
 * @time 2018/5/1
 */
namespace app\api\controller;
use app\api\model\OfficeSupplies;
use app\api\validate\OfficeValidate;

class OfficeController extends BaseController
{
    /**
     * 办公用品列表
     * @author jxx
     * @time 2018/5/1
     */
    public function getSuppliesList()
    {
        $postData = request()->post();
        $page = $postData['page'] ? $postData['page'] : 1;
        $list = OfficeSupplies::getList($postData['keyword'], $page);

        if($list){
            output_json(20000, '', ['list' => $list['data'], 'pagesize' => $list['per_page'], 'total' => $list['total']]);
        }
        output_json(20400, '没有数据');
    }

    /**
     * 获取办公用品信息
     * @author jxx 2018/5/19
     */
    public function getSuppliesInfo()
    {
        $postData = request()->post();
        $info = OfficeSupplies::getInfoById($postData['id']);

        if($info){
            output_json(20000, '', $info);
        }
        output_json(20400, '没有数据');
    }

    /**
     * 编辑办公用品
     * @author jxx 2018/5/19
     */
    public function suppliesEdit()
    {
        $postData = request()->post();
        //请求参数验证
        $validate = new OfficeValidate($postData);
        $result = $validate->scene('suppliesEdit')->check($postData);
        if(true !== $result)
        {
            output_json(40000, $validate->getError());
        }
        $update = OfficeSupplies::updateRowById($postData['id'], $postData);

        if($update){
            output_json(20000, '修改成功');
        }
        output_json(43000, '修改失败');
    }
}
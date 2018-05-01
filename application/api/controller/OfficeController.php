<?php
/**
 * 行政办公控制器
 * @author jxx
 * @time 2018/5/1
 */
namespace app\api\controller;
use app\api\model\OfficeSupplies;
use app\api\validate\StaffValidate;

class OfficeController extends BaseController
{
    /**
     * 用品列表
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
}
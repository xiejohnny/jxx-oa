<?php
namespace app\api\validate;
use think\Validate;
use app\api\model\OfficeSupplies;

class OfficeValidate extends Validate
{
    protected $rule = [
        'id'   => 'integer',
        'name' => 'min:1|max:50',
        'desc' => 'min:0',
        'num'  => 'integer',
        'unit' => 'max:10',
    ];

    protected $message = [
        'name.require'   =>  '名称不能为空',
        'name.min'       =>  '名称只能1-50个字符',
        'name.max'       =>  '名称只能1-50个字符',
        'name.checkName' =>  '名称已存在',
        'num.integer'    =>  '数量必须是数字',
        'unit.max'       =>  '单位最长10个字符',
        'id.require'     =>  'ID不能为空',
        'id.integer'     =>  'ID必须是数字',
        'id.checkId'     =>  '办公用品不存在',
    ];

    protected $scene = [
        //编辑办公用品
        'suppliesEdit' => [
            'id'   => 'require|integer|checkId',
            'name' => 'require|min:1|max:50|checkName:edit',
            'desc' => 'min:0',
            'num'  => 'require|integer',
            'unit' => 'max:10',
        ],
    ];

    /**
     * 检查办公用品是否存在
     * @param string $value 用户名
     * @param string $rule 规则
     * @param array $data 提交参数
     * @return bool
     * @author jxx 2018/5/19
     */
    protected function checkName($value='', $rule='', $data=[])
    {
        if(!$value) return true;
        $row = OfficeSupplies::getInfoByName($value);
        if($rule == 'add'){
            return $row ? false : true;
        }elseif($rule == 'edit'){
            if(!$row || ($row && $row['id'] == $data['id'])){
                return true;
            }
            return false;
        }
    }

    /**
     * 检查办公用品ID是否存在
     * @param int $value 用户ID
     * @return bool
     * @author jxx 2018/5/19
     */
    protected function checkId($value=0)
    {
        $row = OfficeSupplies::getInfoById($value);
        return $row ? true : false;
    }
}
<?php
namespace app\api\validate;
use think\Validate;
use app\api\model\Role;

class RoleValidate extends Validate
{
    protected $rule = [
        'id'        => 'integer',
        'name'      => 'max:20',
        'menuids'   => 'max:1000',
    ];

    protected $message = [
        'name.require'       =>  '角色名称不能为空',
        'name.max'           =>  '名称太长',
        'name.checkName'     =>  '角色名称已存在',
        'menuids.max'        =>  '权限太长',
    ];

    protected $scene = [
        //添加角色
        'add' => [
            'name'      => 'require|max:20|checkName:add',
            'menuids'   => 'max:1000',
        ],
        //编辑角色
        'edit' => [
            'id'        => 'require|integer|checkId',
            'name'      => 'require|max:20|checkName:edit',
            'menuids'   => 'max:1000',
        ],
        //删除角色
        'del' => [
            'id'        => 'require|integer|checkId',
        ],
    ];

    /**
     * 检查角色名称是否存在
     * @param string $value 角色名称
     * @param string $rule 规则
     * @param array $data 提交参数
     * @return bool
     * @author jxx
     * @time 2017/6/10
     */
    protected function checkName($value='', $rule='', $data=[])
    {
        $row = Role::getInfoByName($value);
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
     * 检查角色ID是否存在
     * @param int $value 角色ID
     * @return bool
     * @author jxx
     * @time 2017/6/10
     */
    protected function checkId($value=0)
    {
        $row = Role::getRowById($value);
        return $row ? true : false;
    }
}
<?php
namespace app\api\validate;
use think\Validate;
use app\api\model\Users;

class StaffValidate extends Validate
{
    protected $rule = [
        'id'        => 'integer',
        'username'  => 'min:5|max:20',
        'password'  => 'min:6|max:20',
        'nickname'  => 'max:50',
        'gender'    => 'in:0,1,2',
        'avatar'    => 'max:250',
    ];

    protected $message = [
        'username.require'       =>  '用户名不能为空',
        'username.min'           =>  '用户名只能5-20个字符',
        'username.max'           =>  '用户名只能5-20个字符',
        'username.checkUsername' =>  '用户名已存在',
        'password.require'       =>  '密码不能为空',
        'password.min'           =>  '密码只能6-20个字符',
        'password.max'           =>  '密码只能6-20个字符',
        'id.require'             =>  '用户ID不能为空',
        'id.integer'             =>  '用户ID必须为数字',
        'id.checkId'             =>  '用户不存在',
    ];

    protected $scene = [
        //添加员工
        'add' => [
            'username'  => 'require|min:5|max:20|checkUsername:add',
            'nickname'  => 'max:50',
            'password'  => 'require|min:6|max:20',
            'gender'    => 'in:0,1,2',
            'avatar'    => 'max:250',
        ],
        //编辑员工
        'edit' => [
            'id'        => 'require|integer|checkId',
            'username'  => 'require|min:5|max:20|checkUsername:edit',
            'nickname'  => 'max:50',
            'password'  => 'require|min:6|max:20',
            'gender'    => 'in:0,1,2',
            'avatar'    => 'max:250',
        ],
        //冻结员工
        'freeze' => [
            'id'        => 'require|integer|checkId',
        ],
    ];

    /**
     * 检查用户名是否存在
     * @param string $value 用户名
     * @param string $rule 规则
     * @param array $data 提交参数
     * @return bool
     * @author jxx
     * @time 2017/6/10
     */
    protected function checkUsername($value='', $rule='', $data=[])
    {
        $row = Users::getInfoByUsername($value);
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
     * 检查用户ID是否存在
     * @param int $value 用户ID
     * @return bool
     * @author jxx
     * @time 2017/6/10
     */
    protected function checkId($value=0)
    {
        $row = Users::getRowById($value);
        return $row ? true : false;
    }
}
<?php
namespace app\api\validate;
use think\Validate;

class LoginValidate extends Validate
{
    protected $rule = [
        'username'  => 'min:5|max:20',
        'password'  => 'min:6|max:20',
        'client_id' => 'max:40',
    ];

    protected $message = [
        'username.require'  =>  '用户名不能为空',
        'username.min'      =>  '用户名只能5-20个字符',
        'username.max'      =>  '用户名只能5-20个字符',
        'password.require'  =>  '密码不能为空',
        'password.min'      =>  '密码只能6-20个字符',
        'password.max'      =>  '密码只能6-20个字符',
        'client_id.require' =>  '客户名称不能为空',
    ];

    protected $scene = [
        'login'   =>  [
            'username'  => 'require|min:5|max:20',
            'password'  => 'require|min:6|max:20',
            'client_id' => 'require|max:40',
        ],
    ];
}
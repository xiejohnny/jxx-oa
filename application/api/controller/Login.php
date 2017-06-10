<?php
/**
 * 登录控制器
 * @author jxx
 * @time 2017/6/10
 */
namespace app\api\controller;
use app\api\validate\LoginValidate;
use app\api\model\Users;
use app\api\model\Clients;
use app\api\model\AccessTokens;

class Login extends BaseController
{
    /**
     * 登录
     * @author jxx
     * @time 2017/4/2
     */
    public function login()
    {
        $request = request();
        $postData = $request->post();
        //请求参数验证
        $validate = new LoginValidate($postData);
        $result = $validate->scene('login')->check($postData);
        if(true !== $result)
        {
            output_json(40000, $validate->getError());
        }
        //获取客户信息
        $clientInfo = Clients::getRowById($postData['client_id']);
        if(!$clientInfo)
        {
            output_json(42000, '客户不存在');
        }
        $userInfo = Users::getInfoByUsername($postData['username']);
        if(!$userInfo)
        {
            output_json(42000, '用户不存在');
        }
        if(!check_password($postData['password'], $userInfo['salt'], $userInfo['password']))
        {
            output_json(42000, '用户名或密码错误');
        }
        //30天过期
        $token = AccessTokens::addAccessToken($clientInfo['id'], $userInfo['id'], 86400*30);
        if(false === $token)
        {
            output_json(42000, '登录失败');
        }
        output_json(20000, '登录成功', $token);
    }
}
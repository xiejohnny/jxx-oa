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
use app\api\model\Menus;

class User extends BaseController
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

    /**
     * 获取登录用户信息
     * @author jxx
     * @time 2017/6/17
     */
    public function getAccessTokenInfo()
    {
        $accessToken = request()->post()['access_token'];
        if(!$accessToken)
        {
            output_json(40100, '令牌不能为空');
        }
        //获取token信息
        $tokenInfo = AccessTokens::getAccessTokenInfo($accessToken);
        if(!$tokenInfo)
        {
            output_json(40101, '令牌不能为空');
        }
        //token过期
        if($tokenInfo && strtotime($tokenInfo['expires_time']) < time())
        {
            output_json(40102, '令牌过期');
        }
        //获取用户信息
        $userInfo = Users::getRowById($tokenInfo['userid']);
        if(!$userInfo)
        {
            output_json(40103, '登录信息不存在');
        }
        //菜单列表
        $menuList = Menus::getHandleList();
        $menuList = get_tree($menuList);
        $userInfo['menu_list'] = $menuList;
        output_json(20000, '成功', $userInfo);
    }
}
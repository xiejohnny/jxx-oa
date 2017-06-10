<?php
namespace app\api\controller;
use think\Controller;
use app\api\model\Users;
use app\api\model\AccessTokens;
use app\api\model\Menus;

class BaseController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if(request()->controller() != 'Login')
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
        }
    }
}
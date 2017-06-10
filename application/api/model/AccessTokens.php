<?php
/**
 * 令牌模型
 * @author jxx
 * @time 2017/4/3
 */
namespace app\api\model;

class AccessTokens extends BaseModel
{
    protected $table = 'access_tokens';

    /**
     * 获取令牌信息
     * @param string $accessToken 令牌
     * @return array
     * @author jxx
     * @time 2017/4/2
     */
    static public function getAccessTokenInfo($accessToken='')
    {
        $row = AccessTokens::getRow(['access_token' => $accessToken]);
        return $row;
    }

    /**
     * 添加令牌信息
     * @param string $clientID 客户ID
     * @param int $userid 用户ID
     * @param int $time 有效时间
     * @return bool|string
     * @author jxx
     * @time 2017/4/2
     */
    static public function addAccessToken($clientID='', $userid=0, $time=7200)
    {
        $postData = [
            'access_token' => md5(time().mt_rand(10000,99999)),
            'client_id' => $clientID,
            'userid' => $userid,
            'expires_time' => date('Y-m-d H:i:s', time() + $time),
            'create_time' => date('Y-m-d H:i:s', time()),
        ];
        $accessTokens = new AccessTokens($postData);
        $accessTokens->allowField(true)->save();
        if($accessTokens->access_token)
        {
            Users::where('id', $userid)->update(['login_ip' => request()->ip(), 'login_time' => date('Y-m-d H:i:s', time())]);
            return ['access_token' => $accessTokens->access_token, 'expires_time' => $accessTokens->expires_time];
        }
        return false;
    }
}
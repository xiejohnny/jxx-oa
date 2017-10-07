<?php
/**
 * 客户模型
 * @author jxx
 * @time 2017/4/3
 */
namespace app\api\model;

class Client extends BaseModel
{
    protected $table = 'client';

    /**
     * 添加客户
     * @param string $name 客户名称
     * @return bool|string
     * @author jxx
     * @time 2017/4/2
     */
    static public function addClient($name='')
    {
        //查看是否已存在
        $row = Client::getClientByName($name);
        if($row){
            return false;
        }
        $postData = [
            'id'     => md5(time().mt_rand(1000,9999)),
            'secret' => md5(time().mt_rand(1000,9999)),
            'name'   => $name,
        ];
        $client = new Client($postData);
        $client->allowField(true)->save();
        if($client->id){
            return $client->id;
        }
        return false;
    }

    /**
     * 根据客户名称获取客户信息
     * @param string $name 客户名称
     * @return array
     * @author jxx
     * @time 2017/4/2
     */
    static public function getClientByName($name='')
    {
        $row = Client::getRow(['name' => $name]);
        return $row;
    }
}
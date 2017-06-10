<?php
/**
 * 客户模型
 * @author jxx
 * @time 2017/4/3
 */
namespace app\api\model;

class Clients extends BaseModel
{
    /**
     * 添加客户
     * @param string $name 客户名称
     * @return bool
     * @author jxx
     * @time 2017/4/2
     */
    static public function addClient($name='')
    {
        //查看是否已存在
        $row = Clients::getClientByName($name);
        if($row){
            self::setReturns(1, 'client已存在');
            return false;
        }
        $postData = [
            'id'     => md5(time().mt_rand(1000,9999)),
            'secret' => md5(time().mt_rand(1000,9999)),
            'name'   => $name,
        ];
        $user = new Clients($postData);
        $user->allowField(true)->save();
        if($user->id){
            self::setReturns(0, 'success', ['id' => $user->id]);
            return true;
        }
        self::setReturns(2, '添加失败');
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
        $row = Clients::getRow(['name' => $name]);
        return $row;
    }
}
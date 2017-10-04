<?php
/**
 * 用户角色模型
 * @author jxx
 * @time 2017/10/4
 */
namespace app\api\model;

class UserRole extends BaseModel
{
    protected $table = 'user_role';

    /**
     * 根据用户ID获取角色信息
     * @param int $userid 用户ID
     * @return array
     * @author jxx
     * @time 2017/10/4
     */
    static public function getRowByUserId($userid=0)
    {
        $row = parent::getRow(['userid' => $userid]);
        if(!$row) return [];
        $roleInfo = Role::getRowById($row['roleid']);
        return $roleInfo;
    }

    /**
     * 关联用户和角色关系
     * @param int $userId 用户ID
     * @param int $roleid 角色ID
     * @return void
     * @author jxx
     * @time 2017/10/4
     */
    static public function relateUserRole($userId=0, $roleid=0)
    {
        $isset = UserRole::getRowByUserId($userId);
        if($isset){
            UserRole::updateRow(['userid' => $userId], ['roleid' => $roleid]);
        }else{
            UserRole::addRow(['userid' => $userId, 'roleid' => $roleid]);
        }
    }
}
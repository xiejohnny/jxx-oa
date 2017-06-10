<?php
/**
 * 角色模型
 * @author jxx
 * @time 2017/4/4
 */
namespace app\api\model;

class Roles extends BaseModel
{
    protected $table = 'roles';

    /**
     * 根据角色名称获取角色信息
     * @param string $name 角色名称
     * @return array
     * @author jxx
     * @time 2017/6/10
     */
    static public function getInfoByName($name='')
    {
        $row = Roles::getRow(['name' => $name]);
        return $row;
    }
}
<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * 输出json数据
 * @param int $code 错误码
 * @param string $msg 错误信息
 * @param array $data 返回数据
 * @return array
 * @author jxx
 * @time 2017/4/2
 */
function output_json($code=-1, $msg='', $data=[])
{
    $output = ['code' => $code, 'msg' => $msg];
    if($data) $output['data'] = $data;
    header('Content-type:text/json');
    echo json_encode($output);
    exit;
}

/**
 * 检查密码是否正确
 * @param string $password 密码
 * @param string $salt 盐
 * @param string $dbPassword 数据库密码值
 * @return bool
 * @author jxx
 * @time 2017/4/2
 */
function check_password($password='', $salt='', $dbPassword='')
{
    return md5(md5(md5($password).$salt).$salt) == $dbPassword ? true : false;
}

/**
 * 生成密码
 * @param string $password 密码
 * @param string $salt 盐
 * @return bool
 * @author jxx
 * @time 2017/6/10
 */
function create_password($password='', $salt='')
{
    return md5(md5(md5($password).$salt).$salt);
}

function create_salt()
{
    return substr(md5(time().mt_rand(10000,99999)), 15, 4);
}

/**
 * 递归分类
 * @param array $array 源数据
 * @param int $pid 父级ID
 * @return array
 * @author jxx
 * @time 2017/4/4
 */
function get_tree($array=[], $pid = 0){
    if(!$array) return [];
    $arr = [];
    $tem = [];
    foreach ($array as $v) {
        if ($v['pid'] == $pid) {
            $tem = get_tree($array, $v['id']);
            //判断是否存在子数组
            $tem && $v['son'] = $tem;
            $arr[] = $v;
        }
    }
    return $arr;
}

/**
 * 加载html模版
 * @param string $view 模版名称
 * @author jxx
 * @time 2017/6/18
 */
function load_view($view='')
{
    if(!file_exists(APP_PATH . 'front/view/' . $view . '.html')){
        exit(include APP_PATH . 'front/view/404.html');
    }
    exit(include APP_PATH . 'front/view/' . $view . '.html');
}
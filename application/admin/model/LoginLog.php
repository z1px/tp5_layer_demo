<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/12
 * Time: 14:55
 */

namespace app\admin\model;


use think\Model;
use think\Request;

class LoginLog extends Model {

    // 设置数据表（不含前缀）
//    protected $name = 'login_log';
    // 设置当前模型对应的完整数据表名称
    protected $table = 'tp5_login_log';
    // 设置主键
    protected $pk = 'id';
    // 类型转换
    protected $type = [
        'create_time'  =>  'timestamp:Y-m-d H:i:s',
        'update_time'  =>  'timestamp:Y-m-d H:i:s',
    ];

    // 关闭自动写入create_time字段
//    protected $createTime = false;
    // 关闭自动写入update_time字段
    protected $updateTime = false;

    //自动完成包含新增和更新操作
    protected $auto = [];
    //自动完成包含新增操作
    protected $insert = ["ip","area"];
    //自动完成包含更新操作
    protected $update = [];

    //返回结果
    protected $result=[
        "code"=>1,
        "msg"=>"data normal",
        "data"=>[],
    ];

    /**
     * 修改器
     * @param $value
     * @return int
     * 修改器方法的命名规范：set + 属性名的驼峰命名+ Attr
     */
    protected function setIpAttr($value){
        if(!empty($value)) return $value;
        return Request::instance()->ip();
    }

    protected function setAreaAttr($value){
        if(!empty($value)) return $value;
        $ip=Request::instance()->ip();
        return get_ip_area($ip);
    }

}
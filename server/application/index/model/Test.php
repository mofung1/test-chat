<?php


namespace app\index\model;


use think\Model;
use think\model\concern\SoftDelete;

class Test extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    protected $defaultSoftDelete = 0;
    protected $table = 'tp_test';
    protected $pk = 'id';
//    protected $connection = 'tp5.1test';

    protected $type = [
        'status' => 'integer',
    ];

//    public function getStatusAttr($value)
//    {
//        $status = [-1=>'删除',0=>'禁用',1=>'正常',2=>'待审核'];
//        return $status[$value];
//    }

    public function getStatusTextAttr($value,$data)
    {
        $status = [-1=>'删除',0=>'禁用',1=>'正常',2=>'待审核'];
        return $status[$data['status']];
    }
}
<?php
namespace app\index\controller;

use think\Controller;
use think\Db;

class Chat extends Controller
{
    //保存文本消息
    public function saveText()
    {
        if(request()->isAjax()){
            $msg = input('post.');
            $data['fromid'] = $msg['fromid'];
            $data['toid'] = $msg['toid'];
            $data['fromname'] = $this->getName($data['fromid']);
            $data['toname'] = $this->getName($data['toid']);
            $data['time'] = $msg['time'];
            $data['content'] = $msg['data'];
            $data['is_read'] = $msg['is_read'];
            $data['type'] = 1;
            Db::name('record')->insert($data);
        }
    }

    //根据id获取名称
    public function getName($uid){
        $name = Db::name('users')->where(['id'=>$uid])->value('nickname');
        return $name;
    }

}

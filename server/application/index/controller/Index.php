<?php
namespace app\index\controller;

use app\index\model\Test;
use think\Controller;
use think\Db;
//use think\Hook;
use think\facade\Hook;

class Index extends Controller
{
    public function index()
    {
        $from_id = input('from_id');
        $to_id = input('to_id');
        $this->assign('fromid',$from_id);
        $this->assign('toid',$to_id);

        return $this->fetch();
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }

    public function test(){
        return 789456;
    }

    public function checkSql(){
        $a = Db::name('test')->select();
        var_dump($a);
    }

    //测试钩子行为
    public function testBehavior(){
        echo 'start'."<br>";

//        // 在触发钩子之前，绑定行为到指定钩子
//        Hook::add('test_1','app\\index\\behavior\\BehaviorTest');
//        Hook::add('test_2','app\\index\\behavior\\BehaviorTest');

        // 调用设置了钩子的函数来触发钩子，进行测试
        $this->test_1();
        $this->test_2();
    }


    public function test_1() {
        // 设置钩子test_1
        Hook::listen('test_1',['name'=>'test_1']);
    }

    public function test_2() {

        // 设置钩子test_2
        Hook::listen('test_2',['name'=>'test_2']);
    }

    public function testModel(){
        $a = Test::all();
        var_dump($a);
    }


    public function testDb(){
        $a = Db::name('test')->all();
        var_dump($a);
    }

    public function  testDestroy(){
        $res = Test::destroy(1);
        var_dump($res);
    }

    public function testInteger(){
        $test = new Test();
        $test->status = true;
        var_dump($test->status);
    }

    public function testAttr(){
        $test = Test::get(1);
        echo $test->status_text;
    }

    public function check(){
        return $this->fetch();
    }

}

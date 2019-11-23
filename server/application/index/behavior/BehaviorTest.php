<?php
namespace app\index\behavior;

class BehaviorTest{
    public function portal($params){
        echo $params['name']."钩子执行了方法"."<br>";
    }
}
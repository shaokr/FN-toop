<?php
namespace Home\Controller;

use Think\Controller;

class PublicController extends Controller {
	public function __construct()
    {
        parent::__construct();
       	
       	$env=I("session.env");
        
        $environment=[
        	"list"=>[],   // 所有环境列表目录
        	"def"=>""  // 当前环境
        ];
        foreach (C("environment") as $key => $value) {
        	$environment['list'][]=$key;
        }
        if(!in_array($env,$environment['list'])){
        	session("env",$environment['list'][0]);
        }
        $environment['def']=I("session.env");
        $this->assign("environment",$environment);

        // 
    }
}
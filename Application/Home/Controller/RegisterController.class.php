<?php
namespace Home\Controller;
use Think\Controller;
class RegisterController extends Controller{
	public function index(){
		$this->display();
	}

	public function submit(){
		if (!IS_POST) {
			$this->error('拒绝访问!','../Login/index',1);
		}else{
			$userTable = D('Register');
			$userTable->deleteTooMuchData();
			if($data = $userTable->field('username,password,registertime,imgnum,sex,webpage')->create()){
				$userTable->add();
				$this->success('注册成功！','../Login/index');
			}else{
				$this->error($userTable->getError(),'index',1);
			}

		}
	}

}






?>
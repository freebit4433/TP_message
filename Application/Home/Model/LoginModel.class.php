<?php
namespace Home\Model;
use Think\Model;

class LoginModel extends Model{
	protected $tableName = 'table2user';
	protected $_validate = array(
		//array('username','','该用户名已经被占用，请重新输入',0,'unique',1),
		//array('username','userNameValidate','用户名输入有误',0,'callback'),
		array('username','require','请输入用户名！'),
		array('password','require','请输入密码！')
	);
	protected $_auto = array(
		array('password','md5',3,'function')
	);

	/*protected function userNameValidate($username){
		//自定义对username 的判断，返回false则判断验证失败
		return true;
	}*/
}


?>
<?php
namespace Home\Model;
use Think\Model;

class RegisterModel extends Model{
	protected $tableName = 'table2user';
	protected $_validate = array(
		array('username','require','请输入用户名！'),
		array('username','','该用户名已被占用，请重新输入！',0,'unique'),
		array('password','require','请输入密码！'),
		array('passwordconfirm','password','确认密码输入不一致！',0,'confirm'),
		//array('webpage','url','请输入正确格式的URL！')
	);
	protected $_auto = array(
		array('password','md5',1,'function'),
		array('registertime','time',1,'function'),
	);

	public function deleteTooMuchData(){
		if($this->count() > 40){
			$idCount = $this->field('id')->limit(20)->select();
			if($idCount){
				$idMax = $idCount[19]['id'];
				$condition['id'] = array('lt',$idMax);
				$this->where($condition)->delete();
			}
		}
	}
}

?>
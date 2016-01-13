<?php
namespace Home\Model;
use Think\Model;

class LogModel extends Model{
	//protected $tableName = 'log';

	public function log($content){
		$logTable = M('log');
		$data['content'] = $content;
		$res = $logTable->data($data)->add();
	}
}



?>
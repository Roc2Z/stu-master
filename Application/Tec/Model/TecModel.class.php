<?php
namespace Tec\Model;
use Think\Model;
class TecModel extends Model{
	public function index()
	{
		echo 'this is  Tec index';
	}
	public function gettecid(){
		
		$userid = $_SESSION['account'];
		$tecid = $this->where("student_id='%s'",$userid)->select();
		$tec_id					 = $tecid['0']['tec_id'];
		return $tec_id;
		
		
	}
}
<?php
namespace Home\Model;
use Think\Model;
class StuModel extends Model{
	public function index()
	{
		echo 'this is  stu index';
	}
	/**
	 * 计算综合素质的得分
	 * @author Jason
	 */
	 
	 public function setcomposite($stu_id,$new_sum){
		$where['stu_id'] = $stu_id;
		$data['composite']= $new_sum;
		$result = $this
				  ->where($where)
				  ->save($data);
		return $new_sum;
		
		
			
	 }
	/**
	 * 取出学生的ID
	 * @author Jason
	 */
	public function getstuid(){
		
		$userid = $_SESSION['student_id'];
		$stuid = $this->where("student_id='%s'",$userid)->select();
		$stu_id					 = $stuid['0']['stu_id'];
		return $stu_id;
		
		
	}
	/**
	 * 取出学生的相关信息
	 * @author Jason
	 */
	public function getinfo($stu_id)
	{
		$where['stu_id'] = $stu_id;
		$result = $this
				  ->where($where)
				  ->field('password',true)
				  ->select();
		return $result;
	}
	/**
	 * getpswd 获取密码
	 * @author Jason
	 */
	public function getpswd($stu_id)
	{
		$where['stu_id'] = $stu_id;
		$result = $this
				  ->where($where)
				  ->field('password')
				  ->select();
		return $result;
	}
	/**
	 * 更新密码
	 */
	public function update_pswd($stu_id,$new_password)
	{
		$where['stu_id'] = $stu_id;
		$data['password']= $new_password;
		$result = $this
				  ->where($where)
				  ->save($data);
		return $result;
	}
	/**
	 *更新资料
	 */
	
	public function update_data($stu_id,$new_data)
	{
		
		$where['stu_id'] = $stu_id;
		$data['email'] = $new_data['email'];
		$data['zipcode'] = $new_data['zipcode'];
		$data['phone'] = $new_data['phone'];
		$data['home_phone'] = $new_data['home_phone'];
		$data['address'] = $new_data['address'];
		$data['health'] = $new_data['health'];
		$result = $this->where($where)->save($data);
		return $result;
		
	}
}
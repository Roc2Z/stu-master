<?php
namespace Tec\Model;
use Think\Model;
class StuModel extends Model{
	public function index()
	{
		echo 'this is  stu index';
	}
	public function getstuid($userid){
		
		
		$stuid = $this->where("student_id='%s'",$userid)->select();
		$stu_id					 = $stuid['0']['stu_id'];
		return $stu_id;
		
		
	}
	
	public function setcomposite($stu_id,$new_sum){
		$where['stu_id'] = $stu_id;
		$data['composite']= $new_sum;
		$result = $this
				  ->where($where)
				  ->save($data);
		return $new_sum;
			
	 }
	 public function update_data($stu_id,$data){
		 
		$where['stu_id'] = $stu_id;
		$new_data['email'] = $data['email'];
		$new_data['zipcode'] = $data['zipcode'];
		$new_data['phone'] = $data['phone'];
		$new_data['home_phone'] = $data['home_phone'];
		$new_data['address'] = $data['address'];
		$new_data['name'] = $data['name'];
		$new_data['health'] = $ata['health'];
		$new_data['student_id'] = $data['student_id'];
		$new_data['major'] = $data['major'];
		$new_data['grade'] = $data['grade'];
		$new_data['gender'] = $data['gender'];
		$new_data['nation'] = $data['nation'];
		$new_data['political_status'] = $data['political_status'];
		$new_data['id_card'] = $data['id_card'];
		$new_data['birth'] = $data['birth'];
		$new_data['country'] = $data['country'];
		$result = $this->where($where)->save($new_data);
		return $result;
		 
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
	
	
	public function setinfo($allRows,$data){
		for($currentRow=1;$currentRow<=$allRows;$currentRow++){
			    
				$new_data[$currentRow]['name'] = $data[$currentRow]['A'];
				$new_data[$currentRow]['student_id'] = $data[$currentRow]['B'];
				$new_data[$currentRow]['gender'] = $data[$currentRow]['C'];
				$new_data[$currentRow]['major'] = $data[$currentRow]['D'];
				$new_data[$currentRow]['political_status'] = $data[$currentRow]['E'];
				$new_data[$currentRow]['nation'] = $data[$currentRow]['F'];
				$new_data[$currentRow]['country'] = $data[$currentRow]['G'];
				$new_data[$currentRow]['birth'] = $data[$currentRow]['H'];
				$new_data[$currentRow]['id_card'] = $data[$currentRow]['I'];
				$new_data[$currentRow]['phone'] = $data[$currentRow]['J'];
				$new_data[$currentRow]['health'] = $data[$currentRow]['K'];
				$new_data[$currentRow]['address'] = $data[$currentRow]['L'];
				$new_data[$currentRow]['home_phone'] = $data[$currentRow]['M'];
				$new_data[$currentRow]['zipcode'] = $data[$currentRow]['N'];
				$new_data[$currentRow]['email'] = $data[$currentRow]['O'];
				$new_data[$currentRow]['grade'] = $data[$currentRow]['P'];
				
				$result = $this->add($new_data);
		}
		
		
		return $result;
		
		
	}
	
	
}
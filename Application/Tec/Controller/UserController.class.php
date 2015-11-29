<?php
namespace Tec\Controller;
use Think\Controller;
class UserController extends Controller 
{
	/**
	 * 用户首页
	 *@author Jason
	 */
    public function index()
    {
       
        $this->display();
    }
	
    public function login(){
    
    	$account=$_POST['account'];
		$password=$_POST['password'];


		$m=M('tec');
		$where['account']=$account;
		$where['password']=$password;
		$i=$m->where($where)->count();
		if($i>0){
			$this->redirect('Index/index1');
		}else{
				$this->error('该用户不存在');
		}
	}
   	public function stu_info(){
		$stu    = D('Stu');
		$stu_id = I('get.stu_id');
        $result = $stu->getinfo($stu_id);
        if($result){
            $this->assign('name',$result[0]['name']);
            $this->assign('email',$result[0]['email']);
            $this->assign('zipcode',$result[0]['zipcode']);
            $this->assign('phone',$result[0]['phone']);
            $this->assign('home_phone',$result[0]['home_phone']);
            $this->assign('address',$result[0]['address']);
            $this->assign('health',$result[0]['health']);
            $this->assign('grade',$result[0]['grade']); //所在年级
            $this->assign('gender',$result[0]['gender']);
            $this->assign('nation',$result[0]['nation']);
            $this->assign('political_status',$result[0]['political_status']);
            $this->assign('id_card',$result[0]['id_card']);
            $this->assign('student_id',$result[0]['student_id']);
            $this->assign('major',$result[0]['major']);
            $this->assign('birth',$result[0]['birth']);
            $this->assign('country',$result[0]['country']);
        }
		
    	$this->display();
	}
	public function setupinfo()
    {
		$stu = D('stu');
		$stu_id					 = I('get.stu_id');
        $data['email']               = I('post.email');
        $data['zipcode']              = I('post.zipcode');
        $data['phone']              = I('post.phone');
		$data['home_phone']         = I('post.home_phone');
        $data['address']            = I('post.address');       
        $data['health']              = I('post.health');
		$data['name']               = I('post.name');
        $data['student_id']              = I('post.student_id');
        $data['major']              = I('post.major');
		$data['grade']         = I('post.grade');
        $data['gender']            = I('post.gender');       
        $data['nation']              = I('post.nation');
        $data['political_status']               = I('post.political_status');
        $data['id_card']              = I('post.id_card');
        $data['birth']              = I('post.birth');
		$data['country']         = I('post.country');
       
        if(!$data['phone']||!$data['health']||!$data['address']||!$data['home_phone']||!$data['email']||!$data['zipcode']){
            $this->error('任何信息不可为空',U('User/upinfo'));
        }else{
			$result = $stu->update_data($stu_id,$data);
			
		}
		if($result){
            $this->success('更新资料成功',U('User/upinfo'));
        }else{
            $this->error('更新资料失败',U('User/upinfo'));
        }

    }

    /**
     * 更新资料
     */
    public function upinfo()
    {
    	$this->display();
    }
    /**
     * 更新密码
     */
    public function repswd()
    {
    	$this->display();
    }
}

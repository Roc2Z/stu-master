<?php
namespace Home\Controller;
use Think\Controller;

class UserController extends Controller 
{
    /**
     * 更新资料
     */
    public function upinfo()
    {
        $stu    = D('Stu');
		$stu_id = $stu->getstuid();
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
		$this->assign('username',$username);
    	$this->display();
    }
	
	 
	 
    /**
     * 登录动作
     * @author Jason
     */
	 
	public function login(){
		
		$username=$_POST['username'];
		$student_id=$_POST['userid'];
		$password=$_POST['password'];


		$m=M('stu');
		$where['username']=$username;
		$where['student_id']=$student_id;
		$where['password']=$password;
		$arr=$m->field('student_id')->where($where)->find();
			if($arr){
				$_SESSION['username']=$username;
				$_SESSION['student_id']=$arr['student_id'];
				
				$this->success('用户登录成功',U('Index/index1'));
			}else{
				$this->error('该用户不存在');
			}
		
	}
	 /**
     * 更新资料动作
     * @author Jason
     */
    public function setupinfo()
    {
		$stu = D('stu');
		$userid = $_SESSION['student_id'];
		$stuid = $stu->where("student_id='%s'",$userid)->select();
		$stu_id					 = $stuid['0']['stu_id'];
        $data['email']               = I('post.email');
        $data['zipcode']              = I('post.zipcode');
        $data['phone']              = I('post.phone');
		$data['home_phone']         = I('post.home_phone');
        $data['address']            = I('post.address');       
        $data['health']              = I('post.health');
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
     * 更新密码页面
     * @author Jason
     */
    public function repswd()
    {
		
    	$this->display();
    }
    /**
     * 更改密码动作
     * @author Jason
     */
    public function up_passwd()
    {
        //$stu_id       = 1;//session('stu_id');
		
		$stu          = D('Stu');
		$userid = $_SESSION['student_id'];
		$stuid = $stu->where("student_id='%s'",$userid)->select();
		$stu_id					 = $stuid['0']['stu_id'];
        $old_password = I('post.old_password');
        $new_password = I('post.new_password');
        
        $pswd         = $stu->getpswd($stu_id);
		
        if($pswd != $new_password){
            $r = $stu->update_pswd($stu_id,$new_password);
        }
        if($r){
            $this->success('修改密码成功',U('User/repswd'));
        }else{
            $this->error('修改密码失败',U('User/repswd'));
        }
    }
}
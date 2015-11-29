<?php
namespace Home\Controller;
use Think\Controller;
use Think;
header("Content-type:text/html;charset=utf-8");
class ArticleController extends Controller 
{
    /**
     * 学生信息通知
     *@author Jason
     */
    public function informed()
    {
        //$stu_id = 1;//session('stu_id');
		$stu = D('stu');
		$username = $_SESSION['username'];
		$stu_id = $stu->getstuid();
        if(!$stu_id){
            session('null');
            $this->error('未检测用户信息,正在跳转',U('login/index'));
        }
		
        $mix                     = D('Mix'); //实例化综合素质表
        $map['stu_id']         = $stu_id;
		$map['status'] = array('between','2,3');
		
		
        $count                   = $mix
                                    ->where($map)
                                    ->count();
        $page                    = new Think\Page($count,10);
        $show                    = $page->show();
        $apply_info              = $mix
                                    ->where($map)
                                    ->limit($page->firstRow.','.$page->listRows)
                                    ->select();
        $stu                     = D('Stu');//实例化学生表
        $stuinfo                 = $stu
                                    ->where('stu_id='.$stu_id)
                                    ->limit($page->firstRow.','.$page->listRows)
                                    ->select(); //提取用户信息
        
		
        foreach($apply_info as $k => $v)
        {
			
            $status_name                 = $mix->get_status($apply_info[$k]['status']);
            $list_info                   = $mix->get_info_type($apply_info[$k]['info_type']);
            $moban_info[$k]['mix_id']    = $apply_info[$k]['mix_id'];
            $moban_info[$k]['name']      = $apply_info[$k]['name'];
            $moban_info[$k]['stu_name']  = $stuinfo[0]['name'];
            $moban_info[$k]['student_id']= $stuinfo[0]['student_id'];
            $moban_info[$k]['info_type'] = $list_info[0]['info_type_name'];
            $moban_info[$k]['item']      = $apply_info[$k]['item'];
            $moban_info[$k]['timer']     = $apply_info[$k]['timer']; 
            $moban_info[$k]['status']    = $status_name[0]['status_name'];
        }
        $this->assign('show',$show);
        $this->assign('count',$count);
        $this->assign('moban_info',$moban_info);
		$this->assign('username',$username);
        $this->display();
    }
	
	
	 /**
     * 个人申请页面查找
     * @author Jason
     * 
     */
	
	public function searchinfo()
    {
		
		$stu                     = D('Stu');//实例化学生表
        $stu_id = $stu->getstuid();//session('stu_id');
		$username = $_SESSION['username'];
        $item   = I('get.item');
		
        if($item){
			if($item=='0'){
				
			}else{
				
				$map['item'] = $item;
			}
            
        }
		
        if(!$stu_id){
            session('null');
            $this->error('未检测用户信息,正在跳转',U('login/index'));
        }
        
        $mix                     = D('Mix'); //实例化综合素质表
        $map['stu_id']         = $stu_id;
		
		$map['status']    = '1';
        $count                   = $mix
                                    ->where($map)
                                    ->count();
        $page                    = new Think\Page($count,10);
        $show                    = $page->show();
        $apply_info              = $mix
                                    ->where($map)
                                    ->limit($page->firstRow.','.$page->listRows)
                                    ->select();
        
        $stuinfo                 = $stu
                                    ->where('stu_id='.$stu_id)
                                    ->limit($page->firstRow.','.$page->listRows)
                                    ->select(); //提取用户信息
        $count                   = count($apply_info);
        foreach($apply_info as $k => $v)
        {
			
            $status_name                 = $mix->get_status($apply_info[$k]['status']);
            $list_info                   = $mix->get_info_type($apply_info[$k]['info_type']);
            $moban_info[$k]['mix_id']    = $apply_info[$k]['mix_id'];
            $moban_info[$k]['name']      = $apply_info[$k]['name'];
            $moban_info[$k]['stu_name']  = $stuinfo[0]['name'];
            $moban_info[$k]['student_id']= $stuinfo[0]['student_id'];
			$moban_info[$k]['stu_name']  = $stuinfo[0]['name'];
            $moban_info[$k]['info_type'] = $list_info[0]['info_type_name'];
			$moban_info[$k]['item']      = $apply_info[$k]['item'];
            $moban_info[$k]['grade']     = $stuinfo[0]['grade']; 
			$moban_info[$k]['major']	 = $stuinfo[0]['major'];
			$moban_info[$k]['political_status'] = $stuinfo[0]['political_status'];
			$moban_info[$k]['composite'] = $stuinfo[0]['composite'];
            $moban_info[$k]['status']    = $status_name[0]['status_name'];
			
        }
        $this->assign('show',$show);
        $this->assign('count',$count);
        $this->assign('moban_info',$moban_info);
        $this->assign('username',$username);
        $this->display();
    }
    /**
     * 个人申请页面
     * @author Jason
     * 
     */
    public function apply()
    {
		$stu = D('stu');
		$username = $_SESSION['username'];
		$stu_id = $stu->getstuid();//session('stu_id');
        if(!$stu_id){
            session('null');
            $this->error('未检测用户信息,正在跳转',U('login/index'));
        }
		$item   = I('get.item');
		
        if($item){
			if($item1=='0'){
				
			}else{
				
				$map['item'] = $item;
			}
            
        }
		
        $mix                     = D('Mix'); //实例化综合素质表
        $map['stu_id']         = $stu_id;
		$map['status']    = '1';
        $count                   = $mix
                                    ->where($map)
                                    ->count();
        $page                    = new Think\Page($count,10);
        $show                    = $page->show();
        $apply_info              = $mix
                                    ->where($map)
                                    ->limit($page->firstRow.','.$page->listRows)
                                    ->select();
        $stu                     = D('Stu');//实例化学生表
        $stuinfo                 = $stu
                                    ->where('stu_id='.$stu_id)
                                    //去掉了->limit($page->firstRow.','.$page->listRows)限制条件
                                    ->select(); //提取用户信息
        //$count                   = count($apply_info);
		
        foreach($apply_info as $k => $v)
        {
			
            $status_name                 = $mix->get_status($apply_info[$k]['status']);
            $list_info                   = $mix->get_info_type($apply_info[$k]['info_type']);
			
            $moban_info[$k]['mix_id']    = $apply_info[$k]['mix_id'];
            $moban_info[$k]['name']      = $apply_info[$k]['name'];
            $moban_info[$k]['stu_name']  = $stuinfo[0]['name'];
            $moban_info[$k]['student_id']= $stuinfo[0]['student_id'];
            $moban_info[$k]['info_type'] = $list_info[0]['info_type_name'];
            $moban_info[$k]['item']      = $apply_info[$k]['item'];
            $moban_info[$k]['grade']     = $stuinfo[0]['grade']; 
            $moban_info[$k]['status']    = $status_name[0]['status_name'];
        }
		$this->assign('moban_info',$moban_info);
        $this->assign('show',$show);
        $this->assign('count',$count);
        $this->assign('username',$username);
        $this->display();
    }
	/**
	 *综合素质查看
	 */
	 public function infoshow(){
		$stu = D('stu');
		$username = $_SESSION['username'];
		$stu_id = $stu->getstuid();//session('stu_id');
        if(!$stu_id){
            session('null');
            $this->error('未检测用户信息,正在跳转',U('login/index'));
        }
		$item   = I('get.item');
		$item1	= I('get.item1');
        if($item){
			if($item1=='0'){
				
			}else{
				
				$where['item'] = $item;
			}
            
        }
		if($item1){
			if($item1=='0'){
				
			}else{
				
				$where['status'] = $item1;
			}
			
		}
        $mix                     = D('Mix'); //实例化综合素质表
        $map['stu_id']         = $stu_id;
		$map['status']		 = '2';
        $count                   = $mix
                                    ->where($map)
                                    ->count();
        $page                    = new Think\Page($count,10);
        $show                    = $page->show();
        $apply_info              = $mix
                                    ->where($map)
                                    //->limit($page->firstRow.','.$page->listRows)
                                    ->select();
        $stu                     = D('Stu');//实例化学生表
        $stuinfo                 = $stu
                                    ->where('stu_id='.$stu_id)
                                    //去掉了->limit($page->firstRow.','.$page->listRows)限制条件
                                    ->select(); //提取用户信息
        //$count                   = count($apply_info);
        foreach($apply_info as $k => $v)
        {
            $status_name                 = $mix->get_status($apply_info[$k]['status']);
            $list_info                   = $mix->get_info_type($apply_info[$k]['info_type']);
			$moban_info[$k]['mix_id']    = $apply_info[$k]['mix_id'];
			if($apply_info[$k]['info_type']=='1'){
					$moban_info[$k]['name1']      = $apply_info[$k]['name'];
			}else if($apply_info[$k]['info_type']=='2'){
					$moban_info[$k]['name2']      = $apply_info[$k]['name'];
			}else if($apply_info[$k]['info_type']=='3'){
					$moban_info[$k]['name3']      = $apply_info[$k]['name'];
			}else if($apply_info[$k]['info_type']=='4'){
					$moban_info[$k]['name4']      = $apply_info[$k]['name'];
			}else if($apply_info[$k]['info_type']=='5'){
					$moban_info[$k]['name5']      = $apply_info[$k]['name'];
			}else if($apply_info[$k]['info_type']=='6'){
					$moban_info[$k]['name6']      = $apply_info[$k]['name'];
			}else if($apply_info[$k]['info_type']=='7'){
					$moban_info[$k]['name7']      = $apply_info[$k]['name'];
			}
        }
		$this->assign('moban_info',$moban_info);
        $this->assign('show',$show);
        $this->assign('count',$count);
        $this->assign('username',$username);
        $this->display();
       
		 
        
		 
	}
	 
	 
    /**
     * 综合得分查看
     */
    public function checkinfo()
    {
		
		$stu                     = D('Stu');//实例化学生表
        $stu_id = $stu->getstuid();//session('stu_id');
		$username = $_SESSION['username'];
       
        if(!$stu_id){
            session('null');
            $this->error('未检测用户信息,正在跳转',U('login/index'));
        }
        
        $mix                     = D('Mix'); //实例化综合素质表
        $where['stu_id']         = $stu_id;
        
        $apply_info              = $mix
                                    ->where($where)
                                    //->limit($page->firstRow.','.$page->listRows)
                                    ->select();
        
        $stuinfo                 = $stu
                                    ->where('stu_id='.$stu_id)
                                    //->limit($page->firstRow.','.$page->listRows)
                                    ->select(); //提取用户信息
        $mix->setcompositemix($stu_id);
        $moban_info[$k]['stu_name']  = $stuinfo[0]['name'];
        $moban_info[$k]['student_id']= $stuinfo[0]['student_id'];
		$moban_info[$k]['stu_name']  = $stuinfo[0]['name'];
        $moban_info[$k]['grade']     = $stuinfo[0]['grade']; 
		$moban_info[$k]['major']	 = $stuinfo[0]['major'];
		$moban_info[$k]['political_status'] = $stuinfo[0]['political_status'];
		$moban_info[$k]['composite'] = $stuinfo[0]['composite'];
 
        $this->assign('moban_info',$moban_info);
        $this->assign('username',$username);
        $this->display();
    }
    /**
     * 综合信息查找
     */
    public function info_search()
    {
        

    }
    /**
     * 添加申请页面
     * @author Jason
     */
    public function apply_content()
    {
		$username = $_SESSION['username'];
        $status = M('status');
        $list   = $status->where('status>=1 and status<= 2')->select();
        $this->assign('list',$list);
		$mix = D('mix');
		
		$this->assign('username',$username);
		$this->display();
		
    }
    /**
     * 申请的详细页面
     * @author Jason
     */
    public function detial()
    {
		$username = $_SESSION['username'];
	
		$mix_id       = I('get.mix_id');
        $mix          = D('Mix');
        $apply_detial = $mix->get_detial($mix_id);
        $this->assign('mix_id',$mix_id);
        $this->assign('apply_detial',$apply_detial[0]);
		$this->assign('username',$username);
        $this->display();
    }
	
	
	 public function detial1()
    {
		$username = $_SESSION['username'];
		$stu = D('Stu');
		$stu_id = $stu->getstuid();

		$mix_id       = I('get.mix_id');
        $mix          = D('Mix');
		
        $apply_detial = $mix->get_detial($mix_id);
		$info_type = $mix->get_info_type($apply_detial[0][info_type]);
		$this->assign('info_type',$info_type[0]);
        $this->assign('mix_id',$mix_id);
        $this->assign('apply_detial',$apply_detial[0]);
		$this->assign('username',$username);
        $this->display();
    }
    /**
     * 申请接收页面
     * @author Jason
     */
    public function setapply()
    {
		$username = $_SESSION['username'];
        //$stu_id = 1;//session('stu_id');
		$stu = D('stu');
		$userid = $_SESSION['student_id'];
		$stuid = $stu->where("student_id='%s'",$userid)->select();
		$stu_id					 = $stuid['0']['stu_id'];
        if(!$stu_id){
            session('null');
            $this->error('未检测用户信息,正在跳转',U('login/index'));
        }
		$thismonth=date('Y-m');
        $data['name']      = I('post.name');
        $data['content']   = I('post.content');
        $data['item']      = I('post.item');
        $data['info_type'] = I('post.list');
        $stuinfo           = $stu->getinfo($stu_id); //提取用户信息
        // var_dump($stuinfo);
        $data['stu_id']    = $stuinfo[0]['stu_id']; 
        $data['grade']     = $stuinfo[0]['grade'];
        $data['timer']     = $thismonth;
        $mix               = D('Mix'); //实例化综合素质表
        $result            = $mix->add_apply($data);
        if($result)
        {
            $this->success('申请已发送',U('article/apply'));
        }
        else
        {
            $this->error('提交失败',U('article/apply_content'));
        }

    }
    /**
     * 更新申请资料
     * @author Jason
     */
    public function upapply()
    {
		$username = $_SESSION['username'];
		$stu = D('stu');
        $stu_id = $stu->getstuid();//session('stu_id');
        if(!$stu_id){
            session('null');
            $this->error('未检测用户信息,正在跳转',U('login/index'));
        }
        $mix_id            = I('post.mix_id');
        $data['name']      = I('post.name');
        $data['content']   = I('post.content');
        $data['item']      = I('post.item');
        $stu               = D('Stu');
        $stuinfo           = $stu->getinfo($stu_id); //提取用户信息
        //var_dump($_POST);
        $data['stu_id']    = $stuinfo[0]['stu_id']; 
        $data['grade']     = $stuinfo[0]['grade'];
        $data['info_type'] = 3;
        $mix               = D('Mix'); //实例化综合素质表
        $result            = $mix->up_apply($data,$mix_id);
        if($result)
        {
            $this->success('更新成功',U('article/apply'));
        }
        else
        {
            $this->error('更新失败',U('article/apply'));
        }

    }
    /**
     * 学生删除申请信息，信息进入回收站status改为0
     * @author Jason
     */
    public function delete_apply()
    {
		$stu = D('stu');
		$username = $_SESSION['username'];
        $stu_id = $stu->getstuid();//session('stu_id');
        if(!$stu_id){
            session('null');
            $this->error('未检测到用户信息,正在跳转',U('Index/index'));
        }
        $mix_id = I('get.mix_id');
        if(!$mix_id){
            $this->error('请传入综合素质信息ID',U('article/apply'));
        }
        $mix    = D('Mix');
        $status = 0;
        $result = $mix->change_apply($mix_id,$status);
        if($result)
        {
            $this->success('删除成功',U('article/apply'));
        }
        else
        {
            $this->error('删除失败',U('article/apply'));
        }
    }
    /**
     * 回收站页面
     * @author Jason
     */
    public function recycle()
    {
        $stu = D('stu');
		$username = $_SESSION['username'];
        $stu_id = $stu->getstuid();//session('stu_id');
        if(!$stu_id){
            session('null');
            $this->error('未检测用户信息,正在跳转',U('login/index'));
        }
        $mix                     = D('Mix'); //实例化综合素质表
        $info_type               = 3; //只取第三类的自己申请的资料
        $status                  = 0;
        $apply_info              = $mix->get_apply_stu($stu_id,$info_type,$status);
        $stu                     = D('Stu');
        $stuinfo                 = $stu->getinfo($stu_id); //提取用户信息
        $count                   = count($apply_info);
        for($i=0;$i<$count;$i++)
        {
            $moban_info[$i]['mix_id']    = $apply_info[$i]['mix_id'];
            $moban_info[$i]['name']      = $apply_info[$i]['name'];
            $moban_info[$i]['stu_name']  = $stuinfo[0]['name'];
            $moban_info[$i]['student_id']= $stuinfo[0]['student_id'];
            $moban_info[$i]['info_type'] = $apply_info[$i]['info_type'];
            $moban_info[$i]['grade']     = $stuinfo[0]['grade']; 
        } 
        $this->assign('count',$count);
        $this->assign('moban_info',$moban_info);
		$this->assign('username',$username);
        $this->display();
    }
    /**
     * 回复页面,回复被删除的的数据
     * @author Jason
     */
    public function recover()
    {
		
		$username = $_SESSION['username'];
        
        $mix_id = I('get.mix_id');
        if(!$mix_id){
            $this->error('缺少关键信息，请重试',U('article/apply'));
        }
        $mix    = D('Mix');
        $status = 1;
        $result = $mix->change_apply($mix_id,$status);
        if($result)
        {
            $this->success('恢复成功',U('article/recycle'));
        }
        else
        {
            $this->error('回复失败',U('article/recycle'));
        }
    }
    /**
     * 彻底删除学生的申请信息
     * @author Jason
     */
    public function delete()
    {
		$username = $_SESSION['username'];
        $mix_id = I('get.mix_id');
        if(!$mix_id){
            $this->error('缺少关键信息，请重试',U('article/apply'));
        }
        $mix    = D('Mix');
        $result = $mix->delete($mix_id);
        if($result)
        {
            $this->success('删除成功',U('article/recycle'));
        }
        else
        {
            $this->error('删除失败',U('article/recycle'));
        }
    }
}
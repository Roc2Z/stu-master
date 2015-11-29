<?php
namespace Tec\Controller;
use Think\Controller;
use Think;
class IndexController extends Controller 
{
    public function index()
    {
        $this->display();
    }
	public function index1(){
		// echo 'tec';
        // session('username','jason');
        // //session('userid','111');
        // $userid = session('userid');
        // if(!$userid){
        //     $this->redirect('login/index');
        //     exit;
        // }
        // $this->name = session('username');
       
        $mix                     = D('Mix'); //实例化综合素质表
        $where['status']         = array('in','1');
        $count                   = $mix
                                    ->where($where)
                                    ->count();
        $page                    = new Think\Page($count,10);
        $show                    = $page->show();
        $apply_info              = $mix
                                    ->where($where)
                                    ->limit($page->firstRow.','.$page->listRows)
                                    ->select();
        $stu                     = D('Stu');//实例化学生表
        $stuinfo                 = $stu->select(); //提取用户信息
        
        foreach($apply_info as $k => $v)
        {
            $status_name                 = $mix->get_status($apply_info[$k]['status']);
			
            $list_info                   = $mix->get_info_type($apply_info[$k]['info_type']);
			
            $moban_info[$k]['mix_id']    = $apply_info[$k]['mix_id'];
            $moban_info[$k]['name']      = $apply_info[$k]['name'];
            $moban_info[$k]['stu_name']  = $stuinfo[$k]['name'];
            $moban_info[$k]['student_id']= $stuinfo[$k]['student_id'];
            $moban_info[$k]['info_type'] = $list_info[0]['info_type_name'];
            $moban_info[$k]['item']      = $apply_info[$k]['item'];
            $moban_info[$k]['grade']     = $stuinfo[$k]['grade']; 
            $moban_info[$k]['status']    = $status_name[0]['status_name'];
        }
        $this->assign('show',$show);
        $this->assign('count',$count);
        $this->assign('moban_info',$moban_info);
      

        $this->display();
		
	}
}
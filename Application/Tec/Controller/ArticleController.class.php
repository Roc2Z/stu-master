<?php
namespace Tec\Controller;
use Think\Controller;
use Think;
class ArticleController extends Controller 
{
    /**
     * 待审核
     *@author Jason
     */
    public function wait()
    {
        // $stu_id = 1;//session('stu_id');
        // if(!$stu_id){
        //     session('null');
        //     $this->error('未检测用户信息,正在跳转',U('login/index'));
        // }
        $mix                     = D('Mix'); //实例化综合素质表
        $where['status']         = 1;
        $count                   = $mix
                                    ->where($where)
                                    ->count();
        $page                    = new Think\Page($count,10);
        $show                    = $page->show();
        $apply_info              = $mix
                                    ->where($where)
                                    ->limit($page->firstRow.','.$page->listRows)
                                    ->select();
                      //var_dump();              
        $stu                     = D('Stu');//实例化学生表
        $stuinfo                 = $stu
                                    ->where()
                                    ->limit($page->firstRow.','.$page->listRows)
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
        $this->assign('show',$show);
        $this->assign('count',$count);
        $this->assign('moban_info',$moban_info);
        $this->display();
    }
    /**
     * 信息详情页面
     * @author Jason
     */
    public function detial()
    {
        $mix_id       = I('get.mix_id');
        $mix          = D('Mix');
        $apply_detial = $mix->get_detial($mix_id);
		$info_type = $mix->get_info_type($apply_detial[0]['info_type']);
		$this->assign('info_type',$info_type[0]);
        $this->assign('mix_id',$mix_id);
        $this->assign('apply_detial',$apply_detial[0]);
        $this->display();
    }
	 public function detial1()
    {
        $mix_id       = I('get.mix_id');
        $mix          = D('Mix');
        $apply_detial = $mix->get_detial($mix_id);
		$info_type = $mix->get_info_type($apply_detial[0]['info_type']);
		$this->assign('info_type',$info_type[0]);
        $this->assign('mix_id',$mix_id);
        $this->assign('apply_detial',$apply_detial[0]);
        $this->display();
    }
    /**
     * 审核动作
     *@author Jason
     */
    public function check()
    {
        $mix_id       = I('get.mix_id');
        $mix          = D('Mix');
		$stu_id = $mix->getstuid($mix_id);
		$mix->setcompositemix($stu_id);
        $status       = 2;
        $result       = $mix->change_apply($mix_id,$status);
        if($result)
        {
            $this->success('审核成功',U('article/set'));
        }
        else
        {
            $this->error('审核失败',U('article/wait'));
        }
    	
    }
    /**
     * 驳回动作
     * 驳回学生信息申请
     * @author Jason
     */
    public function go_back()
    {
        $mix_id       = I('get.mix_id');
        $mix          = D('Mix');
        $status       = 3;
        $result       = $mix->change_apply($mix_id,$status);
        if($result)
        {
            $this->success('驳回成功',U('article/wait'));
        }
        else
        {
            $this->error('驳回失败',U('article/wait'));
        }
    }
    /**
     * 已审核页面
     * @author Jason
     */
    public function set()
    {
		
                      //var_dump();              
        $stu                     = D('Stu');
        $mix                     = D('Mix'); //实例化综合素质表
        $where['status']                  = 2;
		$count                   = $mix
                                    ->where($where)
                                    ->count();
        $page                    = new Think\Page($count,10);
        $show                    = $page->show();
        $apply_info              = $mix
                                    ->where($where)
                                    ->limit($page->firstRow.','.$page->listRows)
                                    ->select();
       
		$stuinfo                 = $stu
                                    ->where()
                                    ->limit($page->firstRow.','.$page->listRows)
                                    ->select(); //提取用户信息
		foreach($apply_info as $k => $v){
			
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
        $this->assign('show',$show);
        $this->assign('count',$count);
        $this->assign('moban_info',$moban_info);
        $this->display();
    }
    /**
     * 删除审核信息
     * @author Jason
     */
    public function delete_apply()
    {
        $mix_id = I('get.mix_id');
        if(!$mix_id){
            $this->error('请传入综合素质信息ID',U('article/wait'));
        }
        $mix    = D('Mix');
        $status = 0;
        $result = $mix->change_apply($mix_id,$status);
        if($result)
        {
            $this->success('删除成功',U('article/wait'));
        }
        else
        {
            $this->error('删除失败',U('article/wait'));
        }
    }
    /**
     * 已发布页面
     * @author Jason
     */
    public function setinfo()
    {
        $this->display();
    }
    /**
     * 导入信息模版
     *@author Jason
     */
    public function setin()
    {
        $this->display();
    }
    /**
     * 导入信息动作
     *@author Jason
     */
    public function upload()
    {
        $upload = new \Think\Upload();
        $upload->maxSize  = 3145728;
        $upload->exts     = array('xls');
        $upload->savePath = 'Uploads/';
        $upload->rootPath = './Public/';
        $info             = $upload->upload();
        $exts = $info['ext'];
        $filename = './Public/'.$info['file']['savepath'].$info['file']['savename'];
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
            //dump($filename);
            $this->goods_import($filename);
        }
    }
    protected function goods_import($filename) //$filename, $exts='xls'
    {   
        //导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
        import("Org.Util.PHPExcel");
        //创建PHPExcel对象，注意，不能少了\
        $PHPExcel=new \PHPExcel();
        //如果excel文件后缀名为.xls，导入这个类
        import("Org.Util.PHPExcel.Reader.Excel5");
        $PHPReader=new \PHPExcel_Reader_Excel5();

        //载入文件
        $PHPExcel=$PHPReader->load($filename);
        //获取表中的第一个工作表，如果要获取第二个，把0改为1，依次类推
        $currentSheet=$PHPExcel->getSheet(0);
        //获取总列数
        $allColumn=$currentSheet->getHighestColumn();
        //获取总行数
        $allRow=$currentSheet->getHighestRow();
		$count = 0;
		$tf = true;
        //循环获取表中的数据，$currentRow表示当前行，从哪行开始读取数据，索引值从0开始
        for($currentRow=1;$currentRow<=$allRow;$currentRow++){
            //从哪列开始，A表示第一列
			if($tf){
				for($currentColumn='A';$currentColumn<=$allColumn;$currentColumn++){
                //数据坐标
					$address=$currentColumn.$currentRow;
                //读取到的数据，保存到数组$arr中
					if($currentSheet->getCell($address)->getValue()){
						$data[$currentRow][$currentColumn]=$currentSheet->getCell($address)->getValue();
					}else{

						$tf = false;
						break;
	
					}
				}
				
            }else{
				break;
			}
			$count=$currentRow; 

        }
        //$data    = iconv("GB2312","UTF-8",$data);
        //dump($data);
		var_dump($count);
		var_dump($data);
        $stuInfo = D('Stu');
        $result  = $stuInfo->setinfo($count,$data);
        if($result){
            $this->success('导入成功',U('article/setin'));
        }else{
            $this->error('导入失败',U('article/setin'));
        }
    }
    /**
     * 查找信息
     *@author Jason
     */
    public function search()
    {
		$stu                    = D('Stu'); //实例化综合素质表
		$count                   = $stu                          
                                    ->count();							                        
        $page                    = new Think\Page($count,10);
        $show                    = $page->show(); 
        $stuinfo                 = $stu
									->limit($page->firstRow.','.$page->listRows)
									->select(); //提取用户信息
       
        foreach($stuinfo as $k => $v)
        {
            $moban_info[$k]['stu_id']    = $stuinfo[$k]['stu_id'];
            $moban_info[$k]['stu_name']  = $stuinfo[$k]['name'];
            $moban_info[$k]['student_id']= $stuinfo[$k]['student_id'];
            $moban_info[$k]['major']     = $stuinfo[$k]['major'];
            $moban_info[$k]['grade']     = $stuinfo[$k]['grade'];
			$moban_info[$k]['political_status']     = $stuinfo[$k]['political_status'];
            $moban_info[$k]['composite']     = $stuinfo[$k]['composite']; 			  
        }
        $this->assign('show',$show);
        $this->assign('count',$count);
        $this->assign('moban_info',$moban_info);
        $this->display();
    }
	public function search_info(){
		
		$stu                    = D('Stu'); //实例化综合素质表
		$count                   = $stu                          
                                    ->count();							                        
        $page                    = new Think\Page($count,10);
        $show                    = $page->show(); 
        $stuinfo                 = $stu
									->limit($page->firstRow.','.$page->listRows)
									->select(); //提取用户信息
		
        foreach($stuinfo as $k => $v)
        {
            $moban_info[$k]['stu_id']    = $stuinfo[$k]['stu_id'];
		
            $moban_info[$k]['stu_name']  = $stuinfo[$k]['name'];
            $moban_info[$k]['student_id']= $stuinfo[$k]['student_id'];
            $moban_info[$k]['major']     = $stuinfo[$k]['major'];
            $moban_info[$k]['grade']     = $stuinfo[$k]['grade'];
			$moban_info[$k]['political_status']     = $stuinfo[$k]['political_status'];
            $moban_info[$k]['composite']     = $stuinfo[$k]['composite']; 			  
        }
        $this->assign('show',$show);
        $this->assign('count',$count);
        $this->assign('moban_info',$moban_info);
        $this->display();
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
		$userid = I('post.student_id');
		$stu_id = $stu->getstuid($userid);
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
       
        if(!$data){
            $this->error('任何信息不可为空',U('article/stu_info'));
        }else{
			$result = $stu->update_data($stu_id,$data);
			
		}
		if($result){
            $this->success('更新资料成功',U('article/search_info'));
        }else{
			
            $this->error('更新资料失败',U('article/search_info'));
        }

    }
	
	
	public function infoshow(){
		$mix                     = D('Mix'); //实例化综合素质表
		$stu_id       = I('get.stu_id');    
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
       
        $this->display();
		
		
	}
	
    public function content()
    {
        $this->title = '这是一个测试题目';
        $id = I('get.id',0);
        if($id==0){
            //ajax返回错误数据
        }
        //  声明对象
        //调用函数取出数据

        //暂时构造死数据测试
        $result = array(
            'title'     => '测试题目',
            'content'   => '测试内容',
            'time'      => '2015/05/17',
            );
        $this->display();
    }
}
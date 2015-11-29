<?php
namespace Home\Model;
use Think\Model;
class MixModel extends Model{
	
	
	
	public function getstuid($mix_id){
		
		
		$stuid = $this->where("mix_id='%s'",$mix_id)->select();
		$stu_id					 = $stuid['0']['stu_id'];
		return $stu_id;
		
		
	}
	/**
	 * 计算综合素质的得分
	 * @author Jason
	 */
	 
	 public function setcompositemix($stuid){
		$sum=0;
		$stu_id = $stuid;
		$map['stu_id'] = $stuid;
		$map['status'] = '2';
		$arr = $this->where($map)->select();
		foreach($arr as $k=>$v){
			if($arr[$k]['info_type']=='1'){
				
				$sum+=1;
				
			}else if($arr[$k]['info_type']=='2'){
				$sum+=2;
				
				
			}
			else if($arr[$k]['info_type']=='3'){
				
				$sum-=7;
				
			}
			else if($arr[$k]['info_type']=='4'){
				
				$sum+=4;
				
			}
			else if($arr[$k]['info_type']=='5'){
				$sum+=5;
				
				
			}
			else if($arr[$k]['info_type']=='6'){
				$sum+=6;
				
				
			}else if($arr[$k]['info_type']=='7'){
				$sum+=7;
				
			}
		}
		$stu = D('Stu');
		$result = $stu->setcomposite($stu_id,$sum);	
		return $result;
	 }
    /**
     * 增加申请信息
     * @author Jason
     */
    public function add_apply($data)
    {
        if(!$data){
            return;
        }
        $result = $this
                  ->data($data)
                  ->add();
        return $result;
    }
    /**
     * 更新申请信息
     * @author Jason
     */
    public function up_apply($data,$mix_id)
    {
        if(!$data){
            return;
        }
        $where['mix_id'] = $mix_id;
        $result = $this
                  ->where($where)
                  ->data($data)
                  ->save();
        return $result;
    }
    /**
     * 通过学生ID查找所有通知信息
     * @author Jason
     */
    public function get_apply($stu_id,$info_type=0)
    {
        if(!$stu_id){
            return;
        }
        if($info_type!=0){
            $where['info_type'] = array('in','6,7,8,9');
        }
        $where['stu_id']    = $stu_id;
        //$where['info_type'] = array('in','0,1,2');
        $result             = $this
                              ->where($where)
                              ->select();
        return $result;
    }
    /**
     * 通过学生ID查找自己申请信息
     * @author Jason
     */
    public function get_apply_stu($stu_id,$info_type,$status = 1)
    {
        if(!$stu_id){
            return;
        }
        $where['stu_id']    = $stu_id;
        $where['info_type'] = $info_type;
        $where['status']    = $status;
        $result             = $this
                              ->where($where)
                              ->select();
        return $result;
    }
    /**
     * 通过mix_id查看申请信息细节
     * @author Jason
     */
    public function get_detial($mix_id)
    {
        if(!$mix_id){
            return;
        }
        $where['mix_id'] = $mix_id;
        $result          = $this
                           ->where($where)
                           ->select();
        return $result;
    }
    /**
     * 更改申请信息状态
     * @author Jason
     */
    public function change_apply($mix_id,$status)
    {
        $where['mix_id'] = $mix_id;
        $data['status']  = $status;
        $result          = $this
                            ->where($where)
                            ->save($data);
        
        return $result;
    }
    /**
     * 查找状态信息
     * @author Jason
     */
    public function get_status($status)
    {

        $tb_status       = M('status');
        $where['status'] = $status; 
        $result          = $tb_status
                           ->where($where)
                           ->field('status_name')
                           ->select();
        return $result;
    }
	public function get_info_type($info_type){
		$tb_info_type = M('info_type');
		$where['info_type_id'] = $info_type;
		$result = $tb_info_type->where($where)->field('info_type_name')->select();
		return $result;
		
	}
}
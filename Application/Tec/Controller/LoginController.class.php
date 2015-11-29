<?php
namespace Tec\Controller;
use Think\Controller;
class LoginController extends Controller 
{
    public function index()
    {
        $this->name = 'jason';
        $this->display();
    }
    public function logout()
    {
    	session(null);
    	$this->success('退出成功，正在跳转','/login/index');
    }
}
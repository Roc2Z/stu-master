<?php
namespace Tec\Controller;
use Think\Controller;
class SysController extends Controller 
{
    public function index()
    {
        $this->name = 'jason';
        $this->display();
    }
}
<?php
/**
 * Created by wumengshi on 2015/3/5
 */
//防止此文件 , 跳过了入口文件被直接访问
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//定义前台总控制器
class Home_Controller extends CI_Controller{
    public function __construct(){
        parent::__construct();
        //开启自定义皮肤功能 , 此时视图对应文件夹为 views/
        $this->load->switch_themes_off();
    }
}

//定义后台总控制器
class Admin_Controller extends CI_Controller{
    public function __construct(){
        parent::__construct();
        //关闭自定义皮肤功能 , 此时视图对应文件夹为 views/admin
        $this->load->switch_themes_on();
        //激活分析器以调试程序
        $this->output->enable_profiler(TRUE);

        //权限认证
        if(!$this->session->userdata('admin')){
            redirect('admin/privilege/login');
        }
    }
}
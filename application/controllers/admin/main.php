<?php
/**
 * Created by wumengshi on 2015/3/5
 */
//防止此文件 , 跳过了入口文件被直接访问
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//后台控制器
class Main extends Admin_Controller{

    //展示后台首页面
    public function index(){
        $this->load->view('index.html');
    }

    public function top(){
        $this->load->view('top.html');
    }

    public function menu(){
        $this->load->view('menu.html');
    }

    public function drag(){
        $this->load->view('drag.html');
    }

    public function content(){
        $this->load->view('main.html');
    }

}
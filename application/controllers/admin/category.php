<?php
/**
 * Created by wumengshi on 2015/3/10
 */
//防止此文件 , 跳过了入口文件被直接访问
if (!defined('BASEPATH')) exit('No direct script access allowed');

//权限控制器
class Category extends Admin_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Category_model');
    }

    // 显示分类信息
    public function index() {
        $data['cates'] = $this->Category_model->list_cate();
        $this->load->view('cat_list.html',$data);
    }

    // 显示添加菜单
    public function add(){
        $data['cates'] = $this->Category_model->list_cate();
        $this->load->view('cat_add.html',$data);
    }

    // 显示编辑菜单
    public function edit(){
        $this->load->view('cat_edit.html');
    }

    public function insert(){

    }
}
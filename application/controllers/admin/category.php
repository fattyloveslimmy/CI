<?php
/**
 * Created by wumengshi on 2015/3/10
 */
//防止此文件 , 跳过了入口文件被直接访问
if (!defined('BASEPATH')) exit('No direct script access allowed');

//权限控制器
class Category extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Category_model');
        $this->load->library('form_validation');
    }

    // 显示分类信息
    public function index() {
        $data['cates'] = $this->Category_model->list_cate();
        $this->load->view('cat_list.html', $data);
    }

    // 显示添加菜单
    public function add() {
        $data['cates'] = $this->Category_model->list_cate();
        $this->load->view('cat_add.html', $data);
    }

    // 显示编辑菜单
    public function edit($cate_id) {
        //获取所有的分类信息,用以展示
        $data['cates'] = $this->Category_model->list_cate();
        //获取当前这条记录的信息
        $data['current_cate'] = $this->Category_model->get_category($cate_id);
        $this->load->view('cat_edit.html', $data);
    }

    //更新操作
    public function update() {
        $cate_id = $this->input->post('cate_id');

        //获取该cat_id分类下的所有后代分类
        $sub_cates = $this->Category_model->list_cate($cate_id);

        $sub_ids = array();
        foreach ($sub_cates as $v) {
            $sub_ids[] = $v['cate_id'];
        }
        $parrent_id = $data['parent_id'] = $this->input->post('parent_id');

        //更新前先进行判断所选父分类是否为当前分类或其子分类
        if($parrent_id == $cate_id || in_array($parrent_id,$sub_ids)){
            $msg['message'] = '不能将分类放置到当前分类或其子分类下';
            $msg['url'] = site_url('admin/category/edit').'/' .$cate_id;
            $msg['wait'] = 3;
            $this->load->view('message.html',$msg);
        }else{
            //进行更新
            $data['cate_name'] = $this->input->post('cate_name', true);
            $data['sort_order'] = $this->input->post('sort_order');
            $data['unit'] = $this->input->post('unit', true);
            $data['is_show'] = $this->input->post('is_show');
            $data['show_in_nav'] = $this->input->post('show_in_nav');
            $cate_recommend = $this->input->post('cate_recommend');
            $data['cate_recommend'] = empty($cate_recommend) ? '' : implode(',', $cate_recommend);
            $data['cate_description'] = $this->input->post('cate_description', true);
            $result = $this->Category_model->update_category($data, $cate_id);
            if($result){
                $msg['message'] = '数据更新成功';
                $msg['url'] = site_url('admin/category/index');
                $msg['wait'] = 1;
                $this->load->view('message.html',$msg);
            }else{
                $msg['message'] = '数据更新失败';
                $msg['url'] = site_url('admin/category/edit').'/' .$cate_id;
                $msg['wait'] = 3;
                $this->load->view('message.html',$msg);
            }
        }
    }

    public function insert() {
        //设置验证规则
        $this->form_validation->set_rules('cate_name', '分类名称', 'trim|required');
        $this->form_validation->set_rules('parent_id', '分类名称', 'trim|required');
        if ($this->form_validation->run() == false) {
            //未通过验证
            $data['message'] = validation_errors();
            $data['url'] = site_url('admin/category/add');
            $data['wait'] = 3;
            $this->load->view('message.html', $data);
        } else {
            //通过验证
            $data['cate_name'] = $this->input->post('cate_name', true);
            $data['parent_id'] = $this->input->post('parent_id');
            $data['sort_order'] = $this->input->post('sort_order');
            $data['unit'] = $this->input->post('unit');
            $data['is_show'] = $this->input->post('is_show');
            $data['show_in_nav'] = $this->input->post('show_in_nav');
            $cate_recommend = $this->input->post('cate_recommend');
            $data['cate_recommend'] = empty($cate_recommend) ? '' : implode(',', $cate_recommend);
            $data['cate_description'] = $this->input->post('cate_description');
            $this->Category_model->add_category($data);
        }
    }
}
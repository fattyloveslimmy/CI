<?php
/**
 * Created by wumengshi on 2015/3/12
 */
//防止此文件 , 跳过了入口文件被直接访问
if (!defined('BASEPATH')) exit('No direct script access allowed');

//商品品牌控制器

class Brand extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Brand_model');
        $this->load->library('form_validation');
        //配置上传相关参数
        $config['upload_path'] = './public/upload/'; //上传路径,此处使用的是相对路径,用绝对路径也可以
        $config['allowed_type'] = 'gif|png|jpg';    //允许上传文件的类型
        $config['max_size'] = 1000;     //上传文件的最大值, 单位是K
        $this->load->library('upload', $config);
    }

    //显示品牌信息
    public function index() {
        $data['brands'] = $this->Brand_model->list_brand();
        $this->load->view('brand_list.html', $data);
    }

    //显示添加品牌页面
    public function add() {
        $this->load->view('brand_add.html');
    }

    //添加品牌操作
    public function insert() {
        $this->form_validation->set_rules('brand_name', '品牌名称', 'required');
        if ($this->form_validation->run() == false) {
            $data['message'] = validation_errors();
            $data['url'] = site_url('admin/brand/add');
            $data['wait'] = 3;
            $this->load->view('message.html', $data);
        } else {
            $data['brand_name'] = $this->input->post('brand_name', true);
            $data['url'] = $this->input->post('url', true);
            $data['brand_description'] = $this->input->post('brand_description', true);
            $data['sort_order'] = $this->input->post('sort_order', true);
            $data['is_show'] = $this->input->post('is_show');
            $result = $this->Brand_model->insert_brand($data);
            if ($result) {
                $data['message'] = '添加失败,请重新添加';
                $data['url'] = site_url('admin/brand/add');
                $data['wait'] = 3;
                $this->load->view('message.html', $data);
            } else {
                $data['message'] = '添加成功';
                $data['url'] = site_url('admin/brand/index');
                $data['wait'] = 1;
                $this->load->view('message.html', $data);
            }
        }
    }

    //显示品牌编辑页面
    public function edit($brand_id) {
        $data['brand_info'] = $this->Brand_model->get_brand($brand_id);
        $this->load->view('brand_edit.html', $data);
    }

    //品牌更新操作
    public function update($brand_id) {
        $this->form_validation->set_rules('brand_name', '品牌名称', 'required');
        $data['brand_id'] = $brand_id;
        if ($this->form_validation->run() == false) {
            $data['message'] = validation_errors();
            $data['url'] = site_url('admin/brand/edit') . '/' . $brand_id;
            $data['wait'] = 3;
            $this->load->view('message.html', $data);
        } else {
            $data['brand_name'] = $this->input->post('brand_name', true);
            $data['url'] = $this->input->post('url', true);
            $data['brand_description'] = $this->input->post('brand_description', true);
            $data['sort_order'] = $this->input->post('sort_order', true);
            $data['is_show'] = $this->input->post('is_show');
            $result = $this->Brand_model->update_brand($data, $brand_id);
            if ($result) {
                $msg['message'] = '修改成功';
                $msg['url'] = site_url('admin/brand/index');
                $msg['wait'] = 1;
                $this->load->view('message.html', $msg);
            } else {
                $msg['message'] = '修改失败,请重新输入';
                $msg['url'] = site_url('admin/brand/edit') . '/' . $brand_id;
                $msg['wait'] = 3;
                $this->load->view('message.html', $msg);
            }
        }
    }


}
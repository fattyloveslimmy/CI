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
        $config = array(
            'upload_path' => './public/upload/brand/' . date('Ymd') . '/',
            'allowed_types' => 'jpg|png|gif',
            'max_size' => '500',
            'max_width' => '1024',
            'max_height' => '768',
        );
        $this->load->library('upload');
        $this->upload->initialize($config);

        $this->load->model('Brand_model');
        $this->load->library('form_validation');
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
            if ($this->upload->do_upload('logo')) {
                $imageInfo = $this->upload->data();
                $logo = $imageInfo['file_name'];//do_upload方法返回缩略图
                //获取表单提交数据
                $data['brand_name'] = $this->input->post('brand_name', true);
                $data['url'] = $this->input->post('url', true);
                $data['brand_description'] = $this->input->post('brand_description', true);
                $data['sort_order'] = $this->input->post('sort_order', true);
                $data['is_show'] = $this->input->post('is_show');
            } else {
                //上传失败 , 获取上传失败信息
                $msg['message'] = $this->upload('logo');
                $msg['url'] = site_url('admin/brand/add');
                $msg['wait'] = 3;
                $this->load->view('message.html', $msg);
            }
            $result = $this->Brand_model->insert_brand($data);
            if ($result) {
                $msg['message'] = '添加失败,请重新添加';
                $msg['url'] = site_url('admin/brand/add');
                $msg['wait'] = 3;
                $this->load->view('message.html', $msg);
            } else {
                $msg['message'] = '添加成功';
                $msg['url'] = site_url('admin/brand/index');
                $msg['wait'] = 1;
                $this->load->view('message.html', $msg);
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

            if ($this->Brand_model->do_upload('logo')) {
                //返回上传图片的信息
                //载入图像处理类库
                $this->load->library("image_lib");
                //获取表单提交数据
                $data['brand_name'] = $this->input->post('brand_name', true);
                $data['url'] = $this->input->post('url', true);
                $data['brand_description'] = $this->input->post('brand_description', true);
                $data['sort_order'] = $this->input->post('sort_order', true);
                $data['is_show'] = $this->input->post('is_show');
            } else {
                //上传失败 , 获取上传失败信息
                $msg['message'] = $this->upload->display_errors();
                $msg['url'] = site_url('admin/brand/add');
                $msg['wait'] = 5;
                $this->load->view('message.html', $msg);
            }
            $result = $this->Brand_model->update_brand($data, $brand_id);
            if ($result != -1) {
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
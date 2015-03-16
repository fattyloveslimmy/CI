<?php
/**
 * Created by wumengshi on 2015/3/12
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Brand_model extends CI_Model {

    const TBL_CATE = 'brand';

    public function list_brand() {
        //获取所有的记录
        $query = $this->db->get(self::TBL_CATE);
        $brands = $query->result_array();
        //对类别进行重组 , 并返回
        return $brands;
    }

    //执行插入操作
    public function insert_brand($data) {
        return $this->db->insert(self::TBL_CATE, $data);
    }

    public function get_brand($brand_id) {
        $condition['brand_id'] = $brand_id;
        $query = $this->db->where($condition)->get(self::TBL_CATE);
        return $query->row_array();
    }

    public function update_brand($data, $brand_id) {
        $condition['brand_id'] = $brand_id;
        $this->db->where($condition)->update(self::TBL_CATE, $data);
        return $this->db->affected_rows();
    }

    public function do_upload($key = '') {
        $file_path = './public/upload/brand/' . date('Ymd') . '/';
        if (!file_exists($file_path)) {
            mkdir($file_path, 0777, true);
        }
        $config['upload_path'] = $file_path;
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '1000';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($key)) {
            $msg['message'] = $this->upload->display_errors();
            $msg['url'] = $_SERVER['PHP_SELF'];
            $msg['wait'] = 8;
            $this->load->view('message.html', $msg);
        } else {
            $res = $this->upload->data();
            $config['image_library'] = 'gd2';
            $config['source_image'] = $res['full_path'];
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 150;
            $config['height'] = 100;
            $config['thumb_marker'] = "_150_100";

            $this->load->library('image_lib', $config);

            if (!$this->image_lib->resize()) {
                $msg['message'] = $this->image_lib->display_errors('<p>', '<p>');
                $msg['url'] = $_SERVER['PHP_SELF'];
                $msg['wait'] = 13;
                $this->load->view('message.html', $msg);
            } else {
                return true;
            }
        }
    }

}
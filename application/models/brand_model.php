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
        $query = $this->db->where($condition)->update(self::TBL_CATE, $data);
        return $this->db->affected_rows();
    }


}
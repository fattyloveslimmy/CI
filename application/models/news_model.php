<?php
/**
 * Created by wumengshi on 2015/3/3
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model{

    const TBL = 'news';

    //构造函数
    public function __construct(){
        //调用父类构造函数 , 必不可少
        //因为子类和父类都有构造函数 , 子类的构造函数会把父类的构造函数覆盖 ,
        //所以必须调用父类的构造函数 , 否则父类构造函数中的初始化操作等将不会执行 .
        parent::__construct();
        //手动载入数据库操作类
        $this->load->database();
    }

    /**
     * @param $data
     */
    public function add_news($data){
        return $this->db->insert(self::TBL,$data);
    }

    public function list_news(){
        $query = $this->db->get(self::TBL);
        return $query->result_array();
    }
}
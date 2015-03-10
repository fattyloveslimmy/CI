<?php
/**
 * Created by wumengshi on 2015/3/3
 * news控制器
 */

//防止此文件 , 跳过了入口文件被直接访问
if (!defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //载入news_model , 载入之后 , 可以使用$this->user_model来操作
        $this->load->model('news_model');
    }

    //add方法 , 添加新闻
    public function add()
    {
        $this->load->view("add_news.html");
    }

    //完成新闻的添加
    public function news_insert()
    {
        //获取表单提交的数据
        $data['title'] = isset($_POST['title']) ? $_POST['title'] : '';
        $data['content'] = isset($_POST['content']) ? $_POST['content'] : '';
        $data['author'] = isset($_POST['author']) ? $_POST['author'] : '';
        $data['add_time'] = time();
        //调用news_model的方法即可
        if ($this->news_model->add_news($data)) {
            echo '添加成功';
        } else {
            echo '添加失败';
        }
    }

    //完成新闻列表展示
    public function news_list(){
        //调用list_news方法得到数据
        $list = $this->news_model->list_news();
        //分配到视图
        $data['news'] = $list;
        $this->load->view("list_news.html",$data);
    }
}


/* End of file news.php */
/* Location: ./application/controllers/news.php */
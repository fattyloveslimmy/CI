<?php
/**
 * Created by wumengshi on 2015/3/5
 */
//防止此文件 , 跳过了入口文件被直接访问
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Loader extends CI_Loader{

    protected $_theme = 'admin/';

    //开启皮肤功能
    public function switch_themes_on(){
        $this->_ci_view_paths = array(APPPATH.'views/'.$this->_theme => TRUE);
    }

    //关闭皮肤功能
    public function switch_themes_off(){
        //do nothing , 恢复默认 views/
    }
}
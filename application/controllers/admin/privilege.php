<?php
/**
 * Created by wumengshi on 2015/3/5
 */
//防止此文件 , 跳过了入口文件被直接访问
if (!defined('BASEPATH')) exit('No direct script access allowed');

//权限控制器
class Privilege extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //加载 captcha 辅助函数
        $this->load->switch_themes_on();
        $this->load->helper('captcha');
        $this->load->library('form_validation');
    }

    public function login() {
        $this->load->view('login.html');
    }

    public function code() {
        //调用函数生成验证码
        $vals = array(
            'codelen' => 3,
            'font' => '../CI/public/admin/font/Elephant.ttf'
        );
        $code = create_captcha($vals);
        //将随即字符串保存到session中
        $this->session->set_userdata('code', $code);
    }

    //处理登录
    public function signin() {
        //设置验证规则
        $this->form_validation->set_rules('username','用户名','required');
        $this->form_validation->set_rules('password','密码','required');

        //获取表单数据
        $captcha = strtolower($this->input->post('captcha'));

        //获取session中保存的验证码
        $code = strtolower($this->session->userdata('code'));

        if ($code === $captcha) {
            if($this->form_validation->run()===false){
                $data['message'] = validation_errors();
                $data['url'] = site_url('admin/privilege/login');
                $data['wait'] = 3;
                $this->load->view('message.html',$data);
            }else{
                //验证码正确,则需验证用户名和密码
                $username = $this->input->post('username',true);
                $password = $this->input->post('password',true);

                if ($username == 'admin' && $password == '123') {
                    //OK
                    $this->session->set_userdata('admin', $username);
                    redirect('admin/main/index');
                } else {
                    $data['url'] = site_url('admin/privilege/login');
                    $data['message'] = '用户名或密码错误,请重新填写';
                    $data['wait'] = 1;
                    $this->load->view('message.html', $data);
                }
            }
        } else {
            $data['url'] = site_url('admin/privilege/login');
            $data['message'] = '验证码错误,请重新填写';
            $data['wait'] = 3;
            $this->load->view('message.html', $data);
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('admin/privilege/login');
    }


}
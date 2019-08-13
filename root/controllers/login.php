<?php
class Login extends CI_Controller 
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('simple_model');
    $this->load->library('session');
  }

  public function index()
  {
    //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);
    if( $this->session->userdata('online') )
    {
      $arrayGT = array('warning' => '已经登录。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
      $this->load->view('goto',$arrayGT);
    }
    else
    {
      $this->load->view('login');
    }
    //底部
    $this->load->view('footer');
  }

  function do_login()
  {
        //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);

    if($this->simple_model->login_user())
    {
      $data = array(
        'Username' => $this->input->post('t_UserName'),
        'online' => true
      );
      $this->session->set_userdata($data);
      $arrayGT = array('warning' => '登录成功。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
      $this->load->view('goto',$arrayGT);
    }
    else
    {
      $url = base_url()."login";
      $arrayGT = array('warning' => '登录失败。', 'times' => 3 , 'url' => $url ); //3秒后跳转到首页
      $this->load->view('goto',$arrayGT);
    }  
     //底部
    $this->load->view('footer');
  }
}
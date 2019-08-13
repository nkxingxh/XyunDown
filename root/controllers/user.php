<?php
class User extends CI_Controller 
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('simple_model');
    $this->load->library('session');
    $this->load->helper('url');
  }

  public function index()
  {
    //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);

    if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');//从session中读取name
      $user['hbdx_user'] = $this->simple_model->get_user($username);
      $this->load->view('user',  $user);
    }

    //底部
    $this->load->view('footer');
  }

  public function fav( $name = "fuck_me" )
  {
    if ($name == "fuck_me") {
      $this->index();
      return;
    }
        //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);

    if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');//从session中读取name
      $user['hbdx_user'] = $this->simple_model->get_user($username);
      $this->load->view('user',  $user);
    }

    $fav['hbdx_fav'] = $this->simple_model->get_fav($name);
    $this->load->view('fav',  $fav);

        //底部
    $this->load->view('footer');
  }

  public function my()
  {
        //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);

    if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');//从session中读取name
      $user['hbdx_user'] = $this->simple_model->get_user($username);
      $this->load->view('user',  $user);
    }

    $user = $this->simple_model->get_userdisplayname($username);
    foreach ($user as $name)
    {
        $disname = $name['USER_DISPLAYNAME'];
    }

    $my['hbdx_my'] = $this->simple_model->get_data_name($disname);
    $this->load->view('my',  $my);

        //底部
    $this->load->view('footer');
  }

 
  
}
<?php
class Logout extends CI_Controller 
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
      $this->session->sess_destroy();
      $arrayGT = array('warning' => '注销成功。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
      $this->load->view('goto',$arrayGT);
    }
    else
    {
      $arrayGT = array('warning' => '非法访问。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
      $this->load->view('goto',$arrayGT);
    } 
    //底部
    $this->load->view('footer');
  }
}
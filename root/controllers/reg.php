<?php
class Reg extends CI_Controller 
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
      $arrayGT = array('warning' => '请先注销。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
      $this->load->view('goto',$arrayGT);
    }
    else
    {
      $this->load->view('reg');
    }
    //底部
    $this->load->view('footer');
  }

  function do_reg()
  {
    $this->load->library('form_validation');
    $this->load->helper('url');

    $this->form_validation->set_rules('t_UserName','UserName','required');
    $this->form_validation->set_rules('iptNickName','DiaplayName','required');
    $this->form_validation->set_rules('t_UserPass','PassWord Address','required');
    $this->form_validation->set_rules('t_RePass','RePassWord','required');
    $this->form_validation->set_rules('iptCard','QQ','required');
    $this->form_validation->set_rules('t_Email','Email Confirmation','required');

        //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);

    if($this->form_validation->run() == FALSE)
    {
      redirect( base_url(), 'refresh');
    }
    else
    {
      if($query = $this->simple_model->reg_user())
      {
        $url = base_url()."login";
        $arrayGT = array('warning' => '注册成功。', 'times' => 3 , 'url' => $url ); //3秒后跳转到首页
        $this->load->view('goto',$arrayGT);
      } 
      else
      {
        $url = base_url()."reg";
        $arrayGT = array('warning' => '注册失败。', 'times' => 3 , 'url' => $url ); //3秒后跳转到首页
        $this->load->view('goto',$arrayGT);
      } 
    } 

        //底部
    $this->load->view('footer');
  }
}
<?php
class Post extends CI_Controller 
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
    // //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);
    if( $this->session->userdata('online') )
    {
      $this->load->view('post');
    }
    else
    {
      $url = base_url()."login";
      $arrayGT = array('warning' => '登录后才能发布资源。', 'times' => 3 , 'url' => $url ); //3秒后跳转到首页
      $this->load->view('goto',$arrayGT);
    }

    //底部
    $this->load->view('footer');
  }

  public function posting()
  {
    $this->load->library('form_validation');
    $this->load->helper('url');

    $this->form_validation->set_rules('title','title','required');
    $this->form_validation->set_rules('fileurl','url','required');

    if($this->form_validation->run() == FALSE)
    {
             //头部 显示分类
        $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
        $this->load->view('header', $datatype);
        $url = base_url()."net";
        $arrayGT = array('warning' => '文章标题 和 资源地址不能为空。', 'times' => 3 , 'url' => $url ); 
        $this->load->view('goto',$arrayGT);
    }
    else
    {
           //头部 显示分类
      $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
      $this->load->view('header', $datatype);
      if($query = $this->simple_model->net_insert())
      {
        $url = base_url();
        $arrayGT = array('warning' => '资源发布成功。', 'times' => 3 , 'url' => $url );
        $this->load->view('goto',$arrayGT);
      } 
      else
      {
        $url = base_url()."net";
        $arrayGT = array('warning' => '资源发布失败。', 'times' => 3 , 'url' => $url );
        $this->load->view('goto',$arrayGT);
      } 
    } 
  }

}
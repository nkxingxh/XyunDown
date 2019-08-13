<?php
class Usercen extends CI_Controller 
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('simple_model');
    $this->load->library('session');
    $this->load->helper('url');
    
  }

  public function index( $page = 1 )
  {
    //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);

    if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');//从session中读取name
      if($this->simple_model->is_admin($username))  //是否是管理员组用户
      {
        $data['hbdx_user'] = $this->simple_model->get_alluser($page);
        $this->load->view('usercen',$data);

            //数据总数 显示分页
        $counttotal = $this->simple_model->get_user_num("all");  //总页数
        $pages = array('count' => $page,'counttotal' => $counttotal );
        $this->load->view('userpage',$pages);
      }
    }
    //底部
    $this->load->view('footer');
  }


    public function del($id)
  {
    $this->load->helper('url');
    if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');//从session中读取name

              //头部 显示分类
      $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
      $this->load->view('header', $datatype);
      if($this->simple_model->is_admin($username))  //是否是管理员组用户
      {
        if($this->simple_model->del_user($id))
        {
          $url = base_url()."usercen";
          $arrayGT = array('warning' => '会员信息删除成功。', 'times' => 3 , 'url' => $url ); //3秒后跳转到首页
          $this->load->view('goto',$arrayGT);
        }
      }
      else
      {
        $arrayGT = array('warning' => '非法操作。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
        $this->load->view('goto',$arrayGT);
      }
              //底部
      $this->load->view('footer');
    }                      
  }
}
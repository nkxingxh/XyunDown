<?php
class Simple extends CI_Controller 
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('simple_model');
    $this->simple_model->get_shownum();
    $this->load->library('session');
  }

  public function index()
  {
    //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);

    $this->load->view('search');
    $datatag['hbdx_tag'] = $this->simple_model->get_tag();
    $this->load->view('tag',$datatag);

    //列表数据 显示资源
    $data['hbdx_blue'] = $this->simple_model->get_data("all",1);
    $this->load->view('index', $data);

    //数据总数 显示分页
    $counttotal = $this->simple_model->get_data_num("all");  //总页数
    $pages = array('type' => "all", 'count' => 1,'counttotal' => $counttotal );
    $this->load->view('page',$pages);

    //底部
    $this->load->view('footer');
  }

  public function catalogue( $type, $pagenum = 1 )
  {
    //头部 显示分类
    $type = urldecode($type);

    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);

    $this->load->view('search');
    $datatag['hbdx_tag'] = $this->simple_model->get_tag();
    $this->load->view('tag',$datatag);

    //列表数据 显示资源
    $data['hbdx_blue'] = $this->simple_model->get_data($type,$pagenum);
    $this->load->view('index', $data);

    //数据总数 显示分页
    $counttotal = $this->simple_model->get_data_num($type);  //总页数
    $pages = array('type' => $type, 'count' => $pagenum,'counttotal' => $counttotal );
    $this->load->view('page',$pages);

    //底部
    $this->load->view('footer');
  }

  public function view($id)
  {
    //头部 显示分类
    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);
    if( $id <= 0 ) 
    {
      $arrayGT = array('warning' => '非法访问。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
      $this->load->view('goto',$arrayGT);
    }
    else
    {
      while ( !$this->simple_model->bool_view($id) ) 
      {
        $id--;
      }

      $arrayNP = array('next' => ($id + 1) , 'pres' => ($id - 1));
      $this->load->view('next', $arrayNP);

      $view['hbdx_view'] = $this->simple_model->get_view($id);
      $this->load->view('view',  $view);
    }
    //底部
    $this->load->view('footer');
   }

  public function down($id)
  {
    $this->load->helper('download');
    $this->load->helper('url');

    if( $this->simple_model->bool_view($id) ) 
    {
      $this->simple_model->update_filenum($id);
      $this->index();
      $view['hbdx_view'] = $this->simple_model->get_view($id);
      foreach ($view['hbdx_view'] as $news_item)
      {
        if($news_item['FILEEXT'] == "net")
        {
          redirect($news_item['FILEURL'], 'refresh');
        }
        else
        {
          $data = file_get_contents($news_item['FILEURL']);
          force_download($news_item['FILENAME'], $data);
        }
      }
    }
  }

 public function search( $search )
 {
    //头部 显示分类
    $search = urldecode($search);

    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);

    $this->load->view('search');
    $datatag['hbdx_tag'] = $this->simple_model->get_tag();
    $this->load->view('tag',$datatag);

    //列表数据 显示资源
    $data['hbdx_blue'] = $this->simple_model->Search( $search );
    $this->load->view('index', $data);

    $this->load->view('footer');
 }

  public function tag( $tag )
  {
    //头部 显示分类
    $tag = urldecode($tag);

    $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
    $this->load->view('header', $datatype);

    $this->load->view('search');
    
    $datatag['hbdx_tag'] = $this->simple_model->get_tag();
    $this->load->view('tag',$datatag);

    //列表数据 显示资源

    $data['hbdx_blue'] = $this->simple_model->tag( explode(" ",$tag) );
    $this->load->view('index', $data);

    //底部
    $this->load->view('footer');
  }

  public function del($id)
  {
    $this->load->helper('url');
    if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');//从session中读取name

      $user = $this->simple_model->get_userdisplayname($username);
      foreach ($user as $name)
      {
        $disname = $name['USER_DISPLAYNAME'];
      }
              //头部 显示分类
      $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
      $this->load->view('header', $datatype);
      if($this->simple_model->is_admin($username))  //是否是管理员组用户
      {
        //删除文件
        $view['hbdx_view'] = $this->simple_model->get_view($id);
        foreach ($view['hbdx_view'] as $news_item)
        {
          if($news_item['FILEEXT'] != "net")
          {
            unlink($news_item['FILEURL']);
          }
        }
        //删除记录
        if($this->simple_model->del_view($id))
        {
          $arrayGT = array('warning' => '删除成功。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
          $this->load->view('goto',$arrayGT);
        }
      }
      elseif( $disname == $this->simple_model->get_data_user($id) )
      {
        //删除文件
        $view['hbdx_view'] = $this->simple_model->get_view($id);
        foreach ($view['hbdx_view'] as $news_item)
        {
          if($news_item['FILEEXT'] != "net")
          {
            unlink($news_item['FILEURL']);
          }
        }
        if($this->simple_model->del_view($id))
        {
          $arrayGT = array('warning' => '删除成功。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
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

  public function fav($id)
  {
    $this->load->helper('url');
    if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');//从session中读取name
      //头部 显示分类
      $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
      $this->load->view('header', $datatype);

      if($this->simple_model->is_myfav($id,$username))
      {
        $arrayGT = array('warning' => '该资源已经在你的收藏列表中了。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
        $this->load->view('goto',$arrayGT);
        return;
      }

      if($this->simple_model->fav_view($id,$username))
      {
        $arrayGT = array('warning' => '收藏成功。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
        $this->load->view('goto',$arrayGT);
      }
        //底部
      $this->load->view('footer');
    }                      
  }

  public function unfav($id)
  {
    $this->load->helper('url');
    if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');//从session中读取name
      //头部 显示分类
      $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
      $this->load->view('header', $datatype);
      if($this->simple_model->unfav_view($id,$username))
      {
        $url = base_url()."user/fav/".$username;
        $arrayGT = array('warning' => '删除收藏成功。', 'times' => 3 , 'url' => $url ); //3秒后跳转到首页
        $this->load->view('goto',$arrayGT);
      }
      else
      {
        $url = base_url();
        $arrayGT = array('warning' => '非法操作。', 'times' => 3 , 'url' => $url ); //3秒后跳转到首页
        $this->load->view('goto',$arrayGT);
      }
        //底部
      $this->load->view('footer');
    }                      
  }

  public function top($id)
  {
    $this->load->helper('url');
    if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');//从session中读取name
      if($this->simple_model->is_admin($username))  //是否是管理员组用户
      {
        //头部 显示分类
        $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
        $this->load->view('header', $datatype);
        if($this->simple_model->top_view($id))
        {
          $arrayGT = array('warning' => '置顶成功。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
          $this->load->view('goto',$arrayGT);
        }
        //底部
        $this->load->view('footer');
      }
    }                      
  }

  public function untop($id)
  {
    $this->load->helper('url');
    if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');//从session中读取name
      if($this->simple_model->is_admin($username))  //是否是管理员组用户
      {
        //头部 显示分类
        $datatype['hbdx_baseinfo'] = $this->simple_model->get_type();
        $this->load->view('header', $datatype);
        if($this->simple_model->untop_view($id))
        {
          $arrayGT = array('warning' => '取消置顶成功。', 'times' => 3 , 'url' => base_url() ); //3秒后跳转到首页
          $this->load->view('goto',$arrayGT);
        }
        //底部
        $this->load->view('footer');
      }
    }                      
  }

  public function upload()
  {
    $targetFolder = 'uploads/'; 

    if (!empty($_FILES)) 
    {
      $tempFile = $_FILES['Filedata']['tmp_name'];
      $fileName = $_FILES["Filedata"]["name"];

      $fileExt  = explode('.', $_FILES['Filedata']['name']);
      $ext = $fileExt[count($fileExt) - 1];
      $tempName = md5(uniqid(microtime())); 
    
      // Validate the file type  
      $fileTypes = array('jpg','jpeg','gif','png','bmp','zip','pdf','mp3','torrent','bz2','gz','rar'); // File extensions  
      $fileParts = pathinfo($_FILES['Filedata']['name']);  
        
      $copyFilePath =  $targetFolder.$tempName.".".$ext;

      $Size  = number_format( ($_FILES['Filedata']['size']/1024), 2 );

      $temp = ".".$ext;
      $temps = explode($temp,$fileName);
      $Title = $temps[0];

      if(in_array($fileParts['extension'],$fileTypes)) 
      {  
        move_uploaded_file($tempFile,$copyFilePath);
        echo $Title."|".$fileName."|".$copyFilePath."|".$Size." KB|".$ext;
      }
      else
      {
        echo "FALSE";
      }
    }
  }

}
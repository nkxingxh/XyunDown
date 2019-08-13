<?php
class Simple_model extends CI_Model
{
  var $limitnum;  //每页显示的最大记录数
	public function __construct()
  {
    $this->load->database();
  }
  //查询数据库获得每页显示的最大记录数
  public function get_shownum()
  {
    $query = $this->db->get_where('hbdx_baseinfo',array('TAGSECOND' => 'FILESHOW'));
    foreach ($query->result_array() as $row)
    {
      $this->limitnum = $row['CODE'];
    }
  }
  //根据type和page查询记录，type = all时查询所有记录
  public function get_data($type,$page)
  {
    if($type=="all")
    {
      $this->db->order_by("TOP", "asc");
      $this->db->order_by("ID", "desc");  
      $query = $this->db->get('hbdx_blue',$this->limitnum,$this->limitnum*($page-1));
      return $query->result_array();
    }
    $this->db->order_by("TOP", "asc");
    $this->db->order_by("ID", "desc"); 
    $query = $this->db->get_where('hbdx_blue', array('FILETYPE' => $type),$this->limitnum,$this->limitnum*($page-1));
    return $query->result_array();
  }
  //根据type返回查询到的记录数
  public function get_data_num($type)
  {
    if($type=="all")
    {
      $query = $this->db->get('hbdx_blue');
      $data_num = $query->num_rows();
      return ceil($data_num/$this->limitnum);
    }
    $query = $this->db->get_where('hbdx_blue', array('FILETYPE' => $type));
    $data_num = $query->num_rows();
    return ceil($data_num/($this->limitnum));
  }
  //根据记录ID查询一条记录
  public function get_view( $id )
  {
    $query = $this->db->get_where('hbdx_blue',array('ID' => $id));
    return $query->result_array();
  }
  public function bool_view( $id )
  {
    $query = $this->db->get_where('hbdx_blue',array('ID' => $id));
    return $query->num_rows();
  }
  //查询所有分类
  public function get_type()
  {
    $this->db->order_by("TAGSECOND", "asc"); 
    $query = $this->db->get_where('hbdx_baseinfo', array('TAGFIRST' => 'LIST'));
    return $query->result_array();
  }

  public function update_filenum($id)
  {
    $query = $this->db->get_where( 'hbdx_blue',array( 'ID' => $id ) );
    foreach ($query->result_array() as $row)
    {
      $num = $row['FILENUM'];
    }

    $num++;
    $data = array( 'FILENUM' => $num );  
    $this->db->where('ID',$id); 
    $this->db->update('hbdx_blue', $data);  

  }

  public function Search($value)
  {
    $this->db->order_by("TOP", "asc");
    $this->db->order_by("ID", "desc"); 
    $this->db->like('FILETITLE', $value); 
    $query = $this->db->get('hbdx_blue');
    return $query->result_array();
  }

    //查询所有标签
  public function get_tag()
  {
    $this->db->order_by("TAG_NUM", "desc"); 
    $query = $this->db->get('hbdx_tag',20,0);
    return $query->result_array();
  }

  public function tag($value)
  {
    $this->db->order_by("TOP", "asc");
    $this->db->order_by("ID", "desc"); 

    for ($i=0; $i < count($value); $i++) { 
      $this->db->like('FILETAG', $value[$i]);
    }
    $query = $this->db->get('hbdx_blue');
    return $query->result_array();
  }

  public function reg_user()
  {
    $query = $this->db->get_where('hbdx_users',array('USER_NAME' => $this->input->post('t_UserName')));
    if( $query->num_rows() )
    {
      return 0;
    }
    $query = $this->db->get_where('hbdx_users',array('USER_DISPLAYNAME' => $this->input->post('iptNickName')));
    if( $query->num_rows() )
    {
      return 0;
    }
    $query = $this->db->get_where('hbdx_users',array('USER_MAIL' => $this->input->post('t_Email')));
    if( $query->num_rows() )
    {
      return 0;
    }

    $date = date("Y-m-d H:i:s");

    $insert = array(
      'USER_NAME' => $this->input->post('t_UserName'), 
      'USER_DISPLAYNAME' => $this->input->post('iptNickName'),
      'USER_PASS' => md5($this->input->post('t_UserPass')),
      'USER_QQ' => $this->input->post('iptCard'),
      'USER_MAIL' => $this->input->post('t_Email'),
      'USER_GROUP' => "普通会员",
      'REGISTERDATE' => $date
    );

    $sdb = $this->db->insert('hbdx_users',$insert);
    return $sdb;
  }

  function login_user()
  {
    $this->db->where('USER_NAME',$this->input->post('t_UserName'));
    $this->db->where('USER_PASS',md5($this->input->post('t_UserPass')));
    $query = $this->db->get('hbdx_users');

    return $query->num_rows();
  }

  function net_insert()
  {
      $date = date("Y-m-d H:i:s");
      $insert = array(
      'FILETITLE' => $this->input->post('title'), 
      'FILENAME' => $this->input->post('filename'),
      'FILESIZE' => $this->input->post('filesize'),
      'FILETYPE' => $this->input->post('filetype'),
      'FILEURL' => $this->input->post('fileurl'),
      'FILEEXT' => $this->input->post('fileext'),
      'FILEUSER' => $this->input->post('diaplayname'),
      'FILETAG' => $this->input->post('tag'),
      'FILETEXT' => $this->input->post('message'),
      'FILENUM' => 0,
      'LOADDATE' => $date,
      'TOP' => 1
    );

    $sdb = $this->db->insert('hbdx_blue',$insert);
    return $sdb;
  }

  function upload_insert()
  {
      $date = date("Y-m-d H:i:s");
      $insert = array(
      'FILETITLE' => $this->input->post('title'), 
      'FILENAME' => $this->input->post('filename'),
      'FILESIZE' => $this->input->post('filesize'),
      'FILETYPE' => $this->input->post('filetype'),
      'FILEURL' => $this->input->post('fileurl'),
      'FILEEXT' => $this->input->post('fileext'),
      'FILEUSER' => $this->input->post('diaplayname'),
      'FILETAG' => $this->input->post('tag'),
      'FILETEXT' => $this->input->post('message'),
      'FILENUM' => 0,
      'LOADDATE' => $date,
      'TOP' => 1
    );

    $sdb = $this->db->insert('hbdx_blue',$insert);
    return $sdb;
  }

    //根据UserName查询DisplayName
  public function get_userdisplayname( $name )
  {
    $query = $this->db->get_where('hbdx_users',array('USER_NAME' => $name));
    return $query->result_array();
  }

  public function is_admin( $name )
  {
    $query = $this->db->get_where('hbdx_users',array('USER_NAME' => $name,'USER_GROUP' => "管理员"));
    return $query->num_rows();
  }

  public function get_user( $name )
  {
    $query = $this->db->get_where('hbdx_users',array('USER_NAME' => $name));
    return $query->result_array();
  }

  public function del_view($id)
  {
    $this->db->where('ID',$id); 
    $query=$this->db->delete('hbdx_blue'); 
    return $query; 
  }

  public function is_myfav( $id,$name )
  {
    $query = $this->db->get_where('hbdx_fav',array('FAV_VIEWID' => $id,'FAV_USERNAME' => $name));
    return $query->num_rows();
  }

  public function fav_view($id,$name)
  {
    $date = date("Y-m-d H:i:s");
    $view = $this->db->get_where('hbdx_blue',array('ID' => $id));
    foreach ($view->result_array() as $row)
    {
      $title = $row['FILETITLE'];
    }
    
    $insert = array(
      'FAV_VIEWID' => $id,
      'FAV_VIEWTITLE' => $title, 
      'FAV_USERNAME' => $name,
      'FAV_DATE' => $date
    );

    $query = $this->db->insert('hbdx_fav',$insert);
    return $query;
  }

  public function unfav_view($id,$name)
  {
    $view = $this->db->get_where('hbdx_fav',array('ID' => $id));
    foreach ($view->result_array() as $row)
    {
      $username = $row['FAV_USERNAME'];
    }

    if($row['FAV_USERNAME'] == $name)
    {
      $this->db->where('ID',$id); 
      $query=$this->db->delete('hbdx_fav'); 
      return $query; 
    }
    else
    {
      return false;
    }


  }

  public function get_fav($name)
  {
    $query = $this->db->get_where('hbdx_fav',array('FAV_USERNAME' => $name));
    return $query->result_array();
  }

  public function is_top($id)
  {
    $query = $this->db->get_where('hbdx_blue',array('ID' => $id));
    foreach ($query->result_array() as $row)
    {
      if( $row['TOP'] == 0 )
      {
        return true;
      }
      else
      {
        return false;
      }
    }
  }

  public function top_view($id)
  {
    $data = array('TOP' => 0);
    $this->db->where('ID', $id);
    $query = $this->db->update('hbdx_blue', $data);
    return $query;
  }

  public function untop_view($id)
  {
    $data = array('TOP' => 1);
    $this->db->where('ID', $id);
    $query = $this->db->update('hbdx_blue', $data);
    return $query;
  }

  public function get_data_name($name)
  {
    $this->db->order_by("TOP", "asc");
    $this->db->order_by("ID", "desc");
    $query = $this->db->get_where('hbdx_blue',array('FILEUSER' => $name));
    return $query->result_array();
  }

  public function get_data_user($id)
  {
    $query = $this->db->get_where('hbdx_blue',array('ID' => $id));
    foreach ($query->result_array() as $row)
    {
      return $row['FILEUSER'];
    }
  }

  public function get_alluser($page)
  {
    $this->db->order_by("ID", "desc"); 
    $query = $this->db->get('hbdx_users',30,30*($page-1));
    return $query->result_array();
  }

  public function get_user_num()
  {
    $query = $this->db->get('hbdx_users');
    $data_num = $query->num_rows();
    return ceil($data_num/30);
  }

  public function del_user($id)
  {
    $this->db->where('ID',$id);
    $query=$this->db->delete('hbdx_users'); 
    return $query; 
  }
}

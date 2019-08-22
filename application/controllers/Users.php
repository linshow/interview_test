<?php
class Users extends CI_Controller{

   public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('users_sql');
        $this->load->helper('url');
        $this->load->helper('security');
        $this->load->helper('form');
        
    }
    public function index(){
		$data = array();
        if($query = $this->users_sql->getAllUsers())
        {
        	$data['record'] = $query;
        }
        $this->load->view('allUser', $data);
    }

    
    
    public function create_user_view()
    {
    	$this->load->view('create_user');
    }

    public function create_user()
    {
    	$data = array(
        	'account'		=>	$this->input->post('account'), 
            'accountName'	=>	$this->input->post('accountName'), 
			'accountSex'	=>	$this->input->post('accountSex'), 
			'birthDate'		=>	$this->input->post('birthDate'), 
            'accountEmail'	=>	$this->input->post('accountEmail'), 
            'remark'		=>	$this->input->post('remark')
        );
       
        if($this->users_sql->select($data['account']) == true)
        {
        	echo "使用者已存在。";
        }
        else
        {
        	$this->users_sql->add($data);
			redirect('index.php/users');
			// redirect('index.php/users/create_user_view');
        }
    }



    public function update(){
		$arr = array(
			'account'		=>	$this->input->post('account'), 
            'accountName'	=>	$this->input->post('accountName'), 
			'accountSex'	=>	$this->input->post('accountSex'), 
			'birthDate'		=>	$this->input->post('birthDate'), 
            'accountEmail'	=>	$this->input->post('accountEmail'), 
            'remark'		=>	$this->input->post('remark')
		);
		$this->users_sql->where_update($arr['account'], $arr);
		// $this->session->set_userdata($arr);
		redirect('/article/index');	
	
	}
   
    public function delete(){
		$id = $this->input->post('id');
		$this->users_sql->user_delete($id);
		// redirect('index.php/creat_view_user');
	}
   
   



}
?>
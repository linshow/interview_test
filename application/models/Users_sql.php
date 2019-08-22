<?php
    class Users_sql extends CI_Model{
       
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        function getAllUsers(){
            $this->db->select('*');
            $this->db->from('account_info');
            $query = $this->db->get();
            return $query->result();
        }


            //新增資料
        function add($arr){
            $this->db->insert('account_info',$arr);
        }
       
        //條件 修改
        function where_update($username,$arr){
            $this->db->where('account',$username);
            $this->db->update('account_info',$arr);
        }

        function user_delete($id){
            $this->db->where('id',$id);
            $this->db->delete('account_info');
        }

        function select($username)
        {
            $this->db->where('account',$username);
            $this->db->select('*');
            $query = $this->db->get('account_info');
            return $query->result();
        }
        function get_username($id)
		{
			$this->db->where('id', $id);
			$this->db->select('*');	
			$query = $this->db->get('account_info');
			return $query->result();
		}



    }



?>
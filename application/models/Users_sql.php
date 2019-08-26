<?php
    class Users_sql extends CI_Model{
       
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        /**
         * getAllUsers
         *
         * @return void
         */
        function getAllUsers(){
            $this->db->select('*');
            $this->db->from('account_info');
            $query = $this->db->get();
            return $query->result();
        }

        //新增資料
        /**
         * add
         *
         * @param  mixed $arr
         *
         * @return void
         */
        function add($arr){
            $this->db->insert('account_info',$arr);
        }
       
        //條件 修改
        /**
         * where_update
         *
         * @param  mixed $id
         * @param  mixed $arr
         *
         * @return void
         */
        function where_update($id,$arr){
            $this->db->where('id',$id);
            $this->db->update('account_info',$arr);
        }

        /**
         * user_delete
         *
         * @param  mixed $id
         *
         * @return void
         */
        function user_delete($id){
            $this->db->where('id',$id);
            $this->db->delete('account_info');
        }

        /**
         * select
         *
         * @param  mixed $username
         *
         * @return void
         */
        function select($username)
        {
            $this->db->where('account',$username);
            $this->db->select('*');
            $query = $this->db->get('account_info');
            return $query->result();
        }
        
        /**
         * get_username
         *
         * @param  mixed $id
         *
         * @return void
         */
        function get_username($id)
		{
			$this->db->where('id', $id);
			$this->db->select('*');	
			$query = $this->db->get('account_info');
			return $query->result();
		}

    }



?>
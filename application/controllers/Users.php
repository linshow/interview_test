<?php
class Users extends CI_Controller
{

   /**
    * __construct
    *
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('users_sql');
        $this->load->helper('url');
        $this->load->helper('security');
        $this->load->helper('form');
    }
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $data = array();
        if ($query = $this->users_sql->getAllUsers()) {
            $data['record'] = $query;
        }
        $this->load->view('allUser', $data);
    }

    
    
    /**
     * create_user_view
     *
     * @return void
     */
    public function create_user_view()
    {
        $this->load->view('create_user');
    }

    /**
     * create_user
     *
     * @return void
     */
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
       
        if ($this->users_sql->select($data['account']) == true) {
            echo "使用者已存在。";
        } else {
            $this->users_sql->add($data);
            redirect('index.php/users');
        }
    }



    /**
     * update
     *
     * @return void
     */
    public function update()
    {
        $arr = array(
            'id'            =>  $this->input->post('id'),
            'account'		=>	$this->input->post('account'),
            'accountName'	=>	$this->input->post('accountName'),
            'accountSex'	=>	$this->input->post('accountSex'),
            'birthDate'		=>	$this->input->post('birthDate'),
            'accountEmail'	=>	$this->input->post('accountEmail'),
            'remark'		=>	$this->input->post('remark')
        );
        $this->users_sql->where_update($arr['id'], $arr);
        
        redirect('/index.php/users');
    }
   
    /**
     * delete
     *
     * @return void
     */
    public function delete()
    {
        $id = $this->input->post('id');
        var_dump($id);
        $this->users_sql->user_delete($id);
    }


    /**
     * exportUserExcel
     *
     * @return void
     */
    public function exportUserExcel()
    {
        if ($_SERVER['REQUEST_METHOD']==='POST') {
            $this->load->model('users_sql');
            $this->load->library('PHPExcel');
            $this->load->library('PHPExcel/IOFactory');
          
            $results = $this->users_sql->getAllUsers();

            $objPHPExcel = new PHPExcel();
            $objPHPExcel->getProperties()->setTitle("export")->setDescription("none");
            $row = 1;
            
            $objPHPExcel->setActiveSheetIndex(0);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $row, "序");
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $row, "帳號");
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $row, "姓名");
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $row, "性別");
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $row, "生日");
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, $row, "信箱");
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6, $row, "備註");
            $row++;

            foreach ($results as $row_data) {
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $row, $row-1);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $row, $row_data->account);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $row, $row_data->accountName);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $row, $row_data->accountSex);
                $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(4, $row)->setValueExplicit($row_data->birthDate, PHPExcel_Cell_DataType::TYPE_STRING);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, $row, $row_data->accountEmail);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6, $row, $row_data->remark);
                $row++;
            }
            $filename = "帳號資料";

            $objPHPExcel->setActiveSheetIndex(0);
            $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
            header("Content-Type:application/vnd.ms-excel");
            date_default_timezone_set("Asia/Taipei");
            header('content-Disposition: attachment; filename="帳號資訊('.$filename.')_'.date("Ymd_", time()).date("Gi").'.xls"');
            header('Cache-Control:max-age=0');
            $objWriter->save('php://output');
        } else {
            show_404();
        }
    }
}

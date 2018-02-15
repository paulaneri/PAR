<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_add extends CI_Controller {
    public function index() {
        $this->load->helper('url');
        if($_POST) {
            $this->load->model('tic');

            $data = array(
                'student_id' => $_POST['student_id'],
                'comments' => $_POST['comments']
                );
            $this->m_database->add($data);
            redirect('/c_add/', 'refresh');
        }
        $this->load->view('v_add');
    }
}

/* End of file c_add.php */
/* Location: ./application/controllers/c_add.php */
?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_database extends CI_Model {
    public function add($data) {
        $this->load->database();
        $cdata = count($data['student_id']);

        //get count values
        $rValue = ($cdata  ? $cdata - 1 : 0);
        $cValue = "(?,?)".str_repeat(",(?,?)", $rValue);

        $sql = "INSERT INTO value (one, two) VALUES $cValue";
        $q = $this->db->conn_id->prepare($sql);
        //function binding
        $a = 1; $b = 2;
        for($i=0; $i < $cdata; $i++) {
            $q->bindValue($a, $data['student_id'][$i], PDO::PARAM_STR);
            $q->bindValue($b, $data['comment'][$i], PDO::PARAM_STR);
            $a+=2; $b+=2;
        }
        $q->execute();
    }
}

/* End of file m_database.php */
/* Location: ./application/models/m_database */
?>

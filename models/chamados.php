<?php
/**
 * Description of chamados
 *
 * @author junior
 */
class chamados extends model {
    
    public function __construct() {
        parent::__construct();
    }

    public function getChamados() {
        $array = array();

        $sql = "select * from chamados WHERE status IN(0,1) Order by id desc";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
    public function atualizaStatus($id, $status) {
        if (!empty($id) && !empty($status)) {
            $sql = "UPDATE chamados SET status = $status WHERE id = $id";
            $this->db->query($sql);
        }
    }
    public function addChamado($ip,$nome,$data_inicio){
        $id = 0;
        $sql = "INSERT INTO `chat`.`chamados` (`ip`, `nome`, `data_inicio`, `status`) VALUES ('$ip', '$nome', '$data_inicio', '0')";

        $sql = $this->db->query($sql);
        
        $id = $this->db->lastInsertId();
        return $id;
    }
    
    public function getChamado($id) {
        $array = array();
        
        $sql = "SELECT * FROM chamados WHERE id=$id";
        $sql = $this->db->query($sql);
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }
    
    

}

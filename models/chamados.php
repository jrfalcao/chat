<?php

/**
 * Description of chamados
 *
 * @author junior
 */
class chamados extends model {

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

}

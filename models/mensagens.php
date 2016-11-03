<?php
/**
 * Description of mensagens
 *
 * @author junior
 */
class mensagens extends model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function sendMessage($idchamado,$origem,$msg) {
        
        $sql = "INSERT INTO `chat`.`mensagens` (`id_chamados`, `mensagem`, `origem`, `data_enviado`) VALUES (?,?,?,?)";
        $sql = $this->db->prepare($sql);
        $sql->execute([$idchamado,$msg,$origem,  date('Y-m-d H:i:s')]);
    }
    public function getMessage($idchamado, $lastMsg) {
        $array = array();
        
        $sql = "SELECT * FROM mensagens WHERE id_chamados='$idchamado' AND data_enviado > '$lastMsg'";
        $sql = $this->db->query($sql);
        
        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }
        $area = $_SESSION['area'];
        $c = new chamados();
        $c->updateLastMsg($idchamado, $area);
        
        return $array;
    }
}

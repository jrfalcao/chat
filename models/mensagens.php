<?php
/**
 * Description of mensagens
 *
 * @author junior
 */
class mensagens extends model{
    
    public function sendMessage($idchamado,$origem,$msg) {
        
        $sql = "INSERT INTO `chat`.`mensagens` (`id_chamados`, `mensagem`, `origem`, `data_enviado`) VALUES (?,?,?,?)";
        //INSERT INTO `chat`.`mensagens` (`id_chamados`, `mensagem`, `origem`, `data_enviado`) VALUES ('0', '0', '0', '0');
        $sql = $this->db->prepare($sql);
        $sql->execute([$idchamado,$msg,$origem,  date('Y-m-d H:i:s')]);
    }
    
}

<?php
/**
 * Description of ajaxController
 *
 * @author Junior Falcão
 */
class ajaxController extends controller{
    
    public function index() {
        
    }
    
    public function getchamado() {
        $dados = array();
        $chamados = new chamados();
        $dados['chamados'] = $chamados->getChamados();
        echo json_encode($dados) ;
    }
}

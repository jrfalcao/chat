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
        
        echo json_encode($dados);
    }
    
    public function sendmessage() {
        if(isset($_POST['msg']) && !empty($_POST['msg'])){
            $msg = filter_input(INPUT_POST, 'msg');
            $idchamado = $_SESSION['chatwindow'];
            $origem = ($_SESSION['area'] == 'suporte') ? 0 : 1;
            $m = new mensagens();
            $m->sendMessage($idchamado,$origem,$msg);
        }
    }
    public function getmessage() {
        $dados = array();
        $m = new mensagens();
        $c = new chamados();
        
        $idchamado = $_SESSION['chatwindow'];
        $area = $_SESSION['area'];
        $lastMsg = $c->getLastMsg($idchamado,$area);
        
        $dados['mensagens'] = $m->getMessage($idchamado, $lastMsg);
        
        echo json_encode($dados);
    }
}

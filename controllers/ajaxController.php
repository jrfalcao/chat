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
    }
    
    public function sendmessage() {
        echo "<script>alert('sendmessage')</script>";
        if(isset($_POST['msg']) && !empty($_POST['msg'])){
            
            var_dump($_SESSION['chatwindow']);
            $msg = filter_input(INPUT_POST, 'msg');
            $idchamado = $_SESSION['chatwindow'];
            $origem = ($_SESSION['area'] == 'suporte') ? 0 : 1;
            $m = new mensagens();
            $m->sendMessage($idchamado,$origem,$msg);
        }
    }
}

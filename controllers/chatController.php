<?php

/**
 * Description of chatController
 *
 * @author Junior Falcão
 */
class chatController extends controller {

    public function index() {
        $dados = array('nome' => '');
        $c = new chamados();

        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = filter_input(INPUT_GET, 'id');
            $c->atualizaStatus($id, 1);
        }
        elseif(isset($_POST['nome']) && !empty($_POST['nome'])){
            $nome = filter_input(INPUT_POST, 'nome');
            $ip = $_SERVER['REMOTE_ADDR'];
            $data_inicio = date('H:i:s');
            
            $_SESSION['chatwindow'] = $c->addChamado($ip,$nome,$data_inicio);            
        }
        if (!isset ($_SESSION['chatwindow']) || empty ($_SESSION['chatwindow'])) {
            $this->loadTemplate("newchamado", $dados);
            exit();
        }

        if (isset($_SESSION['area']) && $_SESSION['area'] == 'suporte') {
            $dados['nome'] = 'Suporte';
        } 
        elseif (isset($_SESSION['area']) && $_SESSION['area'] == 'cliente') {
           $idchamado = $_SESSION['chatwindow'];
           $chamado = $c->getChamado($idchamado);
           $dados['nome'] = $chamado['nome'];            
        }

        $this->loadTemplate("chat", $dados);
    }

}

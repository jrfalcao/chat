<?php
/**
 * Description of chatController
 *
 * @author Junior Falcão
 */
class chatController extends controller{
    
    public function index() {
        
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = filter_input(INPUT_GET, 'id');
            
            $c = new chamados();
            $c->atualizaStatus($id, 1);
        }
        
        $this->loadTemplate("chat");
        
    }
}

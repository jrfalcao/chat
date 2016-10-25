<?php
/**
 * Description of HomeController
 *
 * @author junior
 */
class homeController extends controller {
        
    public function index(){
        $dados = array();
        $_SESSION['area'] == NULL;
        $this->loadTemplate("home", $dados);
    }
}

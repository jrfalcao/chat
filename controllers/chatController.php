<?php
/**
 * Description of chatController
 *
 * @author Junior Falcão
 */
class chatController extends controller{
    
    public function index() {
        
        $this->loadTemplate("chat");
        
    }
}

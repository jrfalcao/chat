<?php

session_start();
require './config.php';
spl_autoload_register(function ($class) {
    if (strpos($class, "Controller") > -1) {
        if (file_exists('./controllers/' . $class . '.php')) {
            require_once './controllers/' . $class . '.php';
        }
    } else if (file_exists('./models/' . $class . '.php')) {
        require_once './models/' . $class . '.php';
    } else {
        if (file_exists('./core/' . $class . '.php')) {
            require_once './core/' . $class . '.php';
        } else {
            loadClass('_app',$class);
        }
    }
});

function loadClass($directory, $class) {
    $d = dir($directory);
    while ($item = $d->read()) {
        if ($item != '.' && $item != '..') {
            $dir[] = $item;
        }
    }
    $iDir = null;

    try {
        foreach ($dir as $dirName):
            if (!$iDir && file_exists('./_app/'. $dirName .'/'. $class . '.php') && !is_dir('./_app/'. $dirName .'/'. $class . '.php')):
                require_once './_app/'. $dirName .'/'. $class . '.php';
                $iDir = true;
            endif;
        endforeach;
    } catch (ErrorException $e) {
        $e->getMessage("Não foi possível incluir $classlass.php");
        die;
    }
}

$core = new Core();
$core->run();

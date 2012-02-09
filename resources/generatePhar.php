 <?php
$stub =
'<?php
Phar::mapPhar();
spl_autoload_register(function ($class) {
    $classFile = "phar://pami.phar/" . str_replace("\\\", "/", $class) . ".php";
    if (file_exists($classFile)) {
        require_once $classFile;
        return true;
    }
});
include "phar://pami.phar/PAMI/Autoloader/Autoloader.php";
\PAMI\Autoloader\Autoloader::register();
__HALT_COMPILER();
?>';
$phar = new Phar($argv[1]);
$phar->setAlias('pami.phar');
$phar->buildFromDirectory($argv[2]);
$phar->setStub($stub);


 <?php
$stub =
'<?php
Phar::mapPhar();
include "phar://pami.phar/PAMI/Autoloader/Autoloader.php";
\PAMI\Autoloader\Autoloader::register();
__HALT_COMPILER();
?>';
$phar = new Phar($argv[1]);
$phar->setAlias('pami.phar');
$phar->buildFromDirectory($argv[2]);
$phar->setStub($stub);

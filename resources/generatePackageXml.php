<?php
$name = $argv[1];
$summary = $argv[2];
$description = $argv[3];
$version = $argv[4];
$src = realpath(__DIR__ . "/../src/mg/$name");
$installPath = "/$name";

?>
<?xml version="1.0" encoding="UTF-8"?>
<package packagerversion="1.9.4" version="2.0" xmlns="http://pear.php.net/dtd/package-2.0" xmlns:tasks="http://pear.php.net/dtd/tasks-1.0" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://pear.php.net/dtd/tasks-1.0     http://pear.php.net/dtd/tasks-1.0.xsd     http://pear.php.net/dtd/package-2.0     http://pear.php.net/dtd/package-2.0.xsd">
 <name><?php echo $name; ?></name>
 <channel>pear.marcelog.name</channel>
 <summary><?php echo $summary; ?></summary>
 <description><?php echo $description; ?></description>
 <lead>
  <name>Marcelo Gornstein</name>
  <user>marcelog</user>
  <email>marcelog@gmail.com</email>
  <active>yes</active>
 </lead>
 <date><?php echo date('Y-m-d'); ?></date>
 <time><?php echo date('H:m:i'); ?></time>
 <version>
   <release><?php echo $version; ?></release>
   <api><?php echo $version; ?></api>
 </version>
 <stability>
  <release>stable</release>
  <api>stable</api>
 </stability>
 <license uri="http://www.apache.org/licenses/">Apache</license>
 <notes>None</notes>
 <contents>
  <dir baseinstalldir="<?php echo $installPath; ?>" name="<?php echo $src; ?>/">
<?php

function dumpFileInfo($realPath, $pearPath) {
    global $installPath;
?>
<file baseinstalldir="<?php echo $installPath; ?>" md5sum="<?php echo md5_file($realPath); ?>" name="<?php echo $pearPath; ?>" role="php" />
<?php
}

function generateFileInfo($realPath, $pearPath) {
    foreach (scandir($realPath) as $entry) {
        if ($entry == '.' || $entry == '..') {
            continue;
        }
        if (empty($pearPath)) {
            $entryPearPath = $entry;
        } else {
            $entryPearPath = "$pearPath/$entry";
        }
        $entryRealPath = realpath("$realPath/$entry");
        if (is_file($entryRealPath)) {
            dumpFileInfo($entryRealPath, $entryPearPath);
        } else {
            generateFileInfo($entryRealPath, $entryPearPath);
        }
    }
}
generateFileInfo($src, '');
?>
  </dir>
 </contents>
 <dependencies>
  <required>
   <php>
    <min>5.3.3</min>
   </php>
   <pearinstaller>
    <min>1.4.0</min>
   </pearinstaller>
  </required>
 </dependencies>
 <phprelease />
 <changelog/>
</package>

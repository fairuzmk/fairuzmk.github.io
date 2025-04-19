<?php
$log = file_get_contents('/var/www/fairuzmk/deploy.log');
echo "<h2>Auto Deploy Log</h2><pre>$log</pre>";
?>

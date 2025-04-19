<?php
// deploy.php
$secret = 'webhookwebserver1'; // samakan dengan secret dari GitHub
$signature = 'sha256=' . hash_hmac('sha256', file_get_contents('php://input'), $secret);

if (!hash_equals($signature, $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '')) {
    http_response_code(403);
    exit('Invalid signature');
}

$logFile = '/var/www/fairuzmk/deploy.log';

$output = shell_exec('cd /var/www/fairuzmk && git pull 2>&1');

$log = "[" . date('Y-m-d H:i:s') . "]\n" . $output . "\n----------------------\n";
file_put_contents($logFile, $log, FILE_APPEND);
echo "<pre>$output</pre>";
?>

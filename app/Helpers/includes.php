<?php
$files = glob(__DIR__ . '/*.php');
if ($files === false) {
    throw new RuntimeException("Failed to glob for function files");
}
foreach ($files as $file) {
    if (basename($file) === 'includes.php') {
        continue;
    }
    require_once $file;
}
unset($file);
unset($files);

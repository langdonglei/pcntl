<?php
$workers = 20;
$pids    = [];
for ($i = 0; $i < $workers; $i++) {
    $pids[$i] = pcntl_fork();
    switch ($pids[$i]) {
        case -1:
            echo "fork error : {$i} \r\n";
            exit;
        case 0:
            sleep(1);
            echo $i . PHP_EOL;
            exit;
        default:
            break;
    }
}
foreach ($pids as $pid) {
    if ($pid) {
        pcntl_waitpid($pid, $status);
    }
}


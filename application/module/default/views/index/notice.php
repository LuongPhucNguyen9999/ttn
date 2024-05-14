<?php
$message = "";
switch ($this->arrParam['type']) {
    case 'not-permission':
        $message = 'You dont have permission to access this function';
        break;
}
?>

<div class="notice"><?php echo $message ?></div>
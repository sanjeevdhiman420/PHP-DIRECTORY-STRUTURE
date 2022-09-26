<?php
require_once __DIR__.'./../admin-functions/admin.php';
if(isset($_POST['action'])):
require_once get_action($_POST['action']);
endif;
?>
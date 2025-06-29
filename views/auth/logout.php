<?php
require_once '../../helpers/session.php';  

sessionDestroy(); 

header("Location: ../../index.php");

exit;

?>

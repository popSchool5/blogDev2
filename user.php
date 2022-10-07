<?php 
require('./componants/co_bdd.php'); 
require('./componants/function.php');

$user = getUser($_GET["id"]); 


require('./componants/header.php');
?> 






<?php require('./componants/footer.php') ?>
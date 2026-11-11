<?php
//starting session
session_start();
//end user sesessions if inactivity for for more thsn 10mins
session_unset();
//destroying all session that exists including our username session name
//you can also remove a single session 
//eg session_unset('username'); this will remove only for the username session if you have many
session_destroy();



//after destroying redirecting to login page
header("Location: /logistick/index.php?session=expired");
exit();
?>
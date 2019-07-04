<?php
session_start();
include('include/config.php');

//This a function to destroy a session it is mostly used for logging out users and clearing the user session such as the email,id and all
// Until a new session is created
session_destroy();

?>

<!--This is a javascript function that will redirect the user to the login page after the session has been created -->
<script language="javascript">
    document.location="./user-login.php";
</script>

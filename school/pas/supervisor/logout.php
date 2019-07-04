<?php
session_start();
include('include/config.php');

session_destroy();

?>

<script language="javascript">
    document.location="index.php";
</script>

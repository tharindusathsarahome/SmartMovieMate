<?php

session_start();

unset($_SESSION['MEMBER_ID']);
unset($_SESSION['FIRST_NAME']);
unset($_SESSION['LAST_NAME']);

?>
<script type="text/javascript">
window.location = "../../index.php";
</script>
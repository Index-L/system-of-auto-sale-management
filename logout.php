<?php
session_start();
unset($_SESSION);
session_destroy();
echo "<script>alert('thanks for using!');</script>";
echo "<script type='text/javascript'>window.location.href='index.php'      
		</script>";
?>
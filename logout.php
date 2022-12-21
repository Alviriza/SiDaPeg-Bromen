<?php
    session_start();
    session_destroy();
    echo "<script>location='landingpage/index.php'</script>";

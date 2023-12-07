<?php
    $search = @$_POST['search'];

    header("Refresh:0; search.php?unit=". $search);
 ?>
<?php
    if ($_GET['menu']=='absensi' || $_GET['menu']=='') {

        include "components/absensi.page.php";

    } elseif ($_GET['menu']=='laporan') {

        include "components/laporan.page.php";

    } elseif ($_GET['menu']=='user') {

        include "components/user.page.php";

    }
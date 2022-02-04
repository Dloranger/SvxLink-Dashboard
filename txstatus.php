<?php

include "config/config.php";
include "include/tools.php";
include "include/functions.php";
include "include/bootstrap.css";

$configs = getSvxConfig();
$txStatus = getSvxTXLines();

if (strpos($txStatus,"ON")) {
	echo "<tr><td class=\"table-danger text-center\">ON</td></tr>";
} else {
	echo "<tr><td class=\"table-success text-center\">OFF</td></tr>";
}

?>

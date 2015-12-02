<?php
error_reporting(0);
include "admin_check.php";

if ($HTTP_POST_VARS['action']) {
    $action = $HTTP_POST_VARS['action'];
} else if ($HTTP_GET_VARS['action']) {
    $action = $HTTP_GET_VARS['action'];
}


require("bak/global.php");



if ($_POST['action'] == "sqlrecovery") {
    $sql_contents = file_get_contents("bak/$filename");

    $sql_contents = explode(";", $sql_contents);


    foreach ($sql_contents as $query) {

        if(trim($query) == "") continue;
        $result = mysql_query($query);
        if (!$result)
            echo "Error on import of " . $query;
        //echo "end query <br>";
    }

    echo "<p>Database Recovery Success!</p>";

}
cpheader();

if (isset($action) == 0) {
    $action = "choose";
}

if ($action == "choose") {

    ?>

<?php include "conf/admin.php"; ?>

<p>Here, you can recover your Mall database</p>

<P><b>Recover Database according Backup SQL file:</b></p>


<?php
    doformheader("my_recovery", "sqlrecovery");
    maketableheader("Recover database from selected file:");
    makefilecode("Path and filename", "filename", 0, 60);

    doformfooter("recovery");
}

cpfooter();
?>

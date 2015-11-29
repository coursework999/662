<?php
error_reporting(7);
include "admin_check.php";

if ($HTTP_POST_VARS['action']) {
    $action = $HTTP_POST_VARS['action'];
} else if ($HTTP_GET_VARS['action']) {
    $action = $HTTP_GET_VARS['action'];
}

if (function_exists("set_time_limit") == 1 and get_cfg_var("safe_mode") == 0) {
    @set_time_limit(0);
}


require("bak/global.php");


// data dump functions
function sqldumptable($table, $fp = 0)
{
    global $DB_site;

    $tabledump = "DROP TABLE IF EXISTS $table;\n";
    $tabledump .= "CREATE TABLE $table (\n";

    $firstfield = 1;

    // get columns and spec
    $fields = $DB_site->query("SHOW FIELDS FROM $table");
    while ($field = $DB_site->fetch_array($fields)) {
        if (!$firstfield) {
            $tabledump .= ",\n";
        } else {
            $firstfield = 0;
        }
        $tabledump .= "   $field[Field] $field[Type]";
        if (!empty($field["Default"])) {
            // get default value
            $tabledump .= " DEFAULT '$field[Default]'";
        }
        if ($field['Null'] != "YES") {
            // can field be null
            $tabledump .= " NOT NULL";
        }
        if ($field['Extra'] != "") {
            // any extra info?
            $tabledump .= " $field[Extra]";
        }
    }
    $DB_site->free_result($fields);

    // get keys list
    $keys = $DB_site->query("SHOW KEYS FROM $table");
    while ($key = $DB_site->fetch_array($keys)) {
        $kname = $key['Key_name'];
        if ($kname != "PRIMARY" and $key['Non_unique'] == 0) {
            $kname = "UNIQUE|$kname";
        }
        if (!is_array($index[$kname])) {
            $index[$kname] = array();
        }
        $index[$kname][] = $key['Column_name'];
    }
    $DB_site->free_result($keys);

    // get each key info
    while (list($kname, $columns) = @each($index)) {
        $tabledump .= ",\n";
        $colnames = implode($columns, ",");

        if ($kname == "PRIMARY") {
            // do primary key
            $tabledump .= "   PRIMARY KEY ($colnames)";
        } else {
            // do standard key
            if (substr($kname, 0, 6) == "UNIQUE") {
                // key is unique
                $kname = substr($kname, 7);
            }

            $tabledump .= "   KEY $kname ($colnames)";

        }
    }

    $tabledump .= "\n);\n\n";
    if ($fp) {
        fwrite($fp, $tabledump);
    } else {
        echo $tabledump;
    }

    // get data
    $rows = $DB_site->query("SELECT * FROM $table");
    $numfields = $DB_site->num_fields($rows);
    while ($row = $DB_site->fetch_array($rows)) {
        $tabledump = "INSERT INTO $table VALUES(";

        $fieldcounter = -1;
        $firstfield = 1;
        // get each field's data
        while (++$fieldcounter < $numfields) {
            if (!$firstfield) {
                $tabledump .= ", ";
            } else {
                $firstfield = 0;
            }

            if (!isset($row[$fieldcounter])) {
                $tabledump .= "NULL";
            } else {
                $tabledump .= "'" . mysql_escape_string($row[$fieldcounter]) . "'";
            }
        }

        $tabledump .= ");\n";

        if ($fp) {
            fwrite($fp, $tabledump);
        } else {
            echo $tabledump;
        }
    }
    $DB_site->free_result($rows);

    //return $tabledump;
}


if ($_POST['action'] == "sqltable") {
    header("Content-disposition: filename=dbbackup-" . date("m-d-Y", time()) . ".sql");
    header("Content-type: unknown/unknown");

    $result = $DB_site->query("SHOW tables");
    while (list($key, $val) = each($table)) {
        if ($val == 1) {
            sqldumptable($key);
            echo "\n\n\n";
        }
    }

    exit;

}
if ($_POST['action'] == "sqlrecovery") {
//    echo "test";
    $str_sql = "mysql -h mysql1.cs.clemson.edu -u zhubo -password=zhubo b2c_4w83 < $filename";
    echo $str_sql . '<br>';

    $sql_contents = file_get_contents($filename);
    $sql_contents = explode(";", $sql_contents);

    foreach ($sql_contents as $query) {
        echo "here";
        if(trim($query) == "") continue;
        $result = mysql_query($query);
        if (!$result)
            echo "Error on import of " . $query;
        echo "end query <br>";
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

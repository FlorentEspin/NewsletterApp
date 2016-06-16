<?php

require ("../Model/user.class.php");

$csv = array();

// check there are no errors
if($_FILES['csv']['error'] == 0){
    $explodeCSV = explode('.', $_FILES['csv']['name']);
    $ext = strtolower(end($explodeCSV));
    $tmpName = $_FILES['csv']['tmp_name'];

    // check the file is a csv
    if($ext === 'csv'){
        if(($handle = fopen($tmpName, 'r')) !== FALSE) {
            // necessary if a large csv file
            set_time_limit(0);

            $row = 0;

            while(($data = fgetcsv($handle, 1000, ';')) !== FALSE) {
                // number of fields in the csv
                $col_count = count($data);

                // get the values from the csv
                $csv[$row]['col1'] = $data[0];
                $csv[$row]['col2'] = $data[1];

                // inc the row
                $row++;
            }
            fclose($handle);
        }
    }
    else {
        echo "c'est pas un csv !!!!!!!";
    }
}
else {
    echo "une erreur s'est produite";
}

foreach ($csv as $newUser) {
    $user = new user(0,$newUser['col1'],$newUser['col2']);
    $user->createUser();
}

header("location:../View/users.php");

?>
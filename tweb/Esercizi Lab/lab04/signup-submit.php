<?php 
    include "top.html"; 
    $data = "";
    $separator= ",";
        foreach($_POST as $key => $value)
        {
            $data .= $value . $separator;
        } 
        $data[strlen($data)-1] = "\n";
        file_put_contents("singles.txt", $data, FILE_APPEND);
?>
    <h1> Thank you! </h1>
    <p>Welcome to NerdLuv, <?= explode(",", $data)[0]; ?> </p>
    <p>Now <a href="matches.php">log in to see your matches</a></p>

<?php include "bottom.html"; ?>
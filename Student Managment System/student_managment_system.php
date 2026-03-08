<html>
<head>
<title>Students Result</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"></head>

<body>

<?php

$students = [
    ["name" => "Abel", "score" => 80],
    ["name" => "Abebe", "score" => 55],
    ["name" => "Yonas", "score" => 90],
    ["name" => "Samson", "score" => 12]
];

function check_result($score){
    if($score >= 50){
        return "Pass";
    } else {
        return "Fail";
    }
}

function calc_average($students){
    $sum = 0;

    foreach($students as $student){
        $sum += $student["score"];
    }
    $average = $sum/count($students);
    return $average;
}

function top_scorer($students){

    $top = $students[0];

    foreach($students as $student){
        if($student["score"] > $top["score"]){
            $top = $student;
        }
    }
    return $top;
}

echo "<h1>Students List </h1>";
echo " <table border=1>";
echo "<tr> <th>Name</th> " . "<th>Score</th>"."<th>Result<br></th>";

foreach($students as $student){
    echo "<tr>";
    echo  "<td>".$student["name"] . "</td>"."<td>". $student["score"] . "<td>".check_result($student["score"])."</td>";
    echo "</tr>";
}
echo "</table>";
echo "<br>Students average Score: " . calc_average($students);
$top_student = top_scorer($students);
echo "<br>Top Student:" . $top_student["name"] . " (" . $top_student["score"] . ")";

?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "functions.php"; ?>
    <title>Document</title>
</head>
<body>
    <?php
        $str = "12 13 5 4 3 1 2 6 9 8 10 7";
        $numArray = mySplit($str);
        // write every element of the array
        // for($i = 0; $i < count($numArray); $i++) {
        //     echo "$numArray[$i] <br>";
        // }

        // $min = smallest($numArray);

        // echo "Miniumum with bubble: $min <br>";

        // $sortedArray = selectionSort($numArray);
        // // write the sorted array
        // for($i = 0; $i < count($sortedArray); $i++) {
        //     echo "$sortedArray[$i] <br>";
        // }
        // echo "Miniumum with selection: $sortedArray[0] <br>";


        $studentStr = "George 20 40 Sally 50 90 100 Mary 50";
        $splitArr = mySplit($studentStr);
        $studentArray = array();
        $i = 0;
        while($i < count($splitArr)) {
            $tempName = $splitArr[$i];
            $i++;
            $grades = array();
            while(is_numeric($splitArr[$i])) {
                array_push($grades, $splitArr[$i]);
                // if not reach end of array
                if($i < count($splitArr) -1) {
                    $i++;
                }
                else{
                    break;
                }
            }
            
            $student = new Student($tempName, $grades);
            array_push($studentArray, $student);
            if($i >= count($splitArr) -1) {
                break;
            }
        }

        // write each student and their grades
        for($i = 0; $i < count($studentArray); $i++) {
            echo $studentArray[$i]->name . ": ";
            for($j = 0; $j < count($studentArray[$i]->grades); $j++) {
                echo $studentArray[$i]->grades[$j] . " ";
            }
            echo "<br>";
        }


    ?>

</body>
</html>
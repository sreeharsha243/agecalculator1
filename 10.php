<?php
    // User defined function to sort elements using selection sort technique
    function selection_sort($data,$pos)
    {
        for($i=0; $i<count($data)-1; $i++)
        {
            $min = $i;
            for($j=$i+1; $j<count($data); $j++)
            {
                if ($data[$j][$pos]<$data[$min][$pos])
                {
                    $min = $j;
                }
            }
            $data = swap_positions($data, $i, $min);
        }
        return $data;
    }
    // User defined function to swap the elements
    function swap_positions($data1, $left, $right)
    {
        for($j=0;$j<3;$j++)
        {
            $backup_old_data_right_value = $data1[$right][$j];
            $data1[$right][$j] = $data1[$left][$j];
            $data1[$left][$j] = $backup_old_data_right_value;
        }
        return $data1;
    }
    if (isset($_POST['ins']))
    {
        try
        {
            // Connecting to studentdb databse
            $con = mysqli_connect('localhost' ,'root' ,'','studentdb') or die("Error " . mysqli_error($con));
            $usn=$_POST['t1'];
            $name=$_POST['t2'];
            $cgpa=$_POST['t3'];
            $sql="INSERT into student values('$usn','$name','$cgpa')";
            //executing the query
            $result = mysqli_query($con,$sql);
            echo "inserted...";
            echo "<br><a href=10.html>Go Back</a>";
        }
        catch(Exception $e)
        {
            echo "DB Error"." ". $e;
        }
    }
    if (isset($_POST['sname']))
    {
        try
        {
            $student_data=array();
            $con =mysqli_connect('localhost' ,'root' ,'','studentdb') or die("Error " . mysqli_error($con));
            $sql="SELECT * from student";
            $result = mysqli_query($con,$sql);
            $cnt=0;
            while($row = mysqli_fetch_array( $result))
            {
                $student_data[$cnt][0]=$row['usn'];
                $student_data[$cnt][1]=$row['name'];
                $student_data[$cnt][2]=$row['cgpa'];
                ++$cnt;
            }
            $student_data=selection_sort($student_data,1);
            echo "<table border><tr><th>USN<th>Name<th>CGPA</tr>";
            for($j=0;$j<$cnt;$j++)
            {
                $usn=$student_data[$j][0];
                $name=$student_data[$j][1];
                $cgpa=$student_data[$j][2];
                echo "<tr><td>$usn</td><td>$name</td><td>$cgpa</td></tr>";
            }
            echo "</table><a href=10.html>Go Back</a>";
        }
        catch(Exception $e)
        {
            echo "DB Error";
        }
    }
    if (isset($_POST['smarks']))
    {
    try
    {
        $student_data=array();
        $sql="SELECT * from student";
        $con =mysqli_connect('localhost' ,'root' ,'','studentdb') or die("Error " . mysqli_error($con));
        $result = mysqli_query($con,$sql);
        $cnt=0;
        while($row = mysqli_fetch_array($result))
        {
            $student_data[$cnt][0]=$row['usn'];
            $student_data[$cnt][1]=$row['name'];
            $student_data[$cnt][2]=$row['cgpa'];
            ++$cnt;
        }
        $student_data=selection_sort($student_data,2);
        echo "<table border><tr><th>USN<th>Name<th>CGPA</tr>";
        for($j=0;$j<$cnt;$j++)
        {
            $usn=$student_data[$j][0];
            $name=$student_data[$j][1];
            $cgpa=$student_data[$j][2];
            echo "<tr><td>$usn</td><td>$name</td><td>$cgpa</td></tr>";
        }
        echo "</table><a href=10.html>Go Back</a>";
    }
    catch(Exception $e)
    {
        echo "DB Error";
    }
}
?>
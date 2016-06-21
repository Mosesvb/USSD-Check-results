<?php
sender=$_GET['sender'];
message=$_GET['message'];

$cell_number = $_GET ['MSISDN'];
$session_id = $_GET ['SESSION_ID'];
$service_code = $_GET ['SERVICE_CODE'];
$ussd_string = $_GET ['USSD_STRING'];

mysql_connect ("localhost","root","") or die ("Cannot connect to the database");
mysql_select_db ("student_grades");

$message=strtolower($message);


function viewSubGrade($msg,$sender)
{
    $smsresults=explode("#",$msg);
    if(empty($msg)){
            $response="Sorry, no blank messages are allowed";
            }
    
    else if($smsresults[0]=="index")
    {
        $Maths=$smsresults[1];

        $result=mysql_query("SELECT Maths FROM Subject WHERE student_index='".$index."'") or die (mysql_error());
        $object=mysql_fetch_object($result);
        $maths=$object->$Maths;
        
        $response=" Your Mathematics grade is ".$maths."";

    }

    else if($smsresults[0]=="index")
    {
        $English=$smsresults[1];
        
        $result=mysql_query("SELECT English FROM Subject WHERE student_index='".$index."'") or die(mysql_error());
        $object=mysql_fetch_object($result);
        $english=$object->$English;

        $response="Your English grade is".$english."";
    }

    else if($smsresults[0]=="index")
    {
        $Kiswahili=$smsresults[1];
        
        $result=mysql_query("SELECT Kiswahili FROM Subject WHERE student_index='".$index."'") or die(mysql_error());
        $object=mysql_fetch_object($result);
        $kiswahili=$object->$Kiswahili;

        $response="Your Kiswahili grade is".$kiswahili."";
    }
else if($smsresults[0]=="index")
    {
        $Overall_Grade=$smsresults[1];
        
        $result=mysql_query("SELECT Overall_Grade FROM Subject WHERE student_index='".$index."'") or die(mysql_error());
        $object=mysql_fetch_object($result);
        $overallgrade=$object->$Overall_Grade;

        $response="Your Overall Grade is".$overallgrade."";
    }

function gradeReport($indexno) 
{

    $query = "SELECT Maths, English, Kiswahili, index_no,Overall from Subject WHERE index_no = ".$indexno."";
    $execute_query = mysql_query($query);    
    while ($result = mysql_fetch_assoc($execute_query)) {
        echo "Hi, ". $result["index_no"]." your grade report is </br>";
        echo "Maths: ". $result["Maths"]."</br>";
        echo "English: ".$result["English"]."</br>";
        echo "Kiswahili: ".$result["Kiswahili"]."</br>";
        echo "Overall: ".$result['Overall']." </br>";
    }
}
}

?>
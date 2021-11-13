<?php
require_once('conn.php');
session_start();
require __DIR__ . '/vendor/autoload.php';
use \Firebase\JWT\JWT;
  $subjectName=$_POST['sub'];
  $startTime=$_POST['appt1'];
  $date=$_POST['date'];
  $endTime=$_POST['appt2']; 
  $tutorPhone=$_SESSION["phone"];
  //send with  jwt token دا الي راح يعمل الميتنق 
   function generateJWTKey()
    {
      
        $key = "KHU68I10qyTi20OHH6apxu1zwGGFdMWihXzA";
        $payload = array(
            "iss" => "Mn7nWLBnSFqtuDqKYZECpA",
            "exp" => time()+36000, // expire in 10 hours
        );

        $jwt = JWT::encode($payload, $key, 'HS256');
        return $jwt;        
    }
    function sendRequest($data)
    {
        $request_url = 'https://api.zoom.us/v2/users/me/meetings';
        $headers     = array(
            'authorization: Bearer ' . generateJWTKey(),
            'content-type: application/json',
        );
        $postFields = json_encode($data);
        $ch         = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $request_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response    = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $err         = curl_error($ch);
        curl_close($ch);
        if (!$response) {

            return false;
        }

        return json_decode($response);
    }
  function createmeeting($meeting){

      $createAMeetingArray['topic']      = $meeting['topic']; // meeting title
      $createAMeetingArray['type']       = 2; //Scheduled
      $createAMeetingArray['start_time'] = $meeting['start_time']; // start time
      $createAMeetingArray['timezone']   = 'Asia/Riyadh'; // your timezone
      $createAMeetingArray['password']   = "123456"; // meeting password
      $createAMeetingArray['duration']   =  $meeting['duration']; // meeting duration

      $responsee = sendRequest($createAMeetingArray);
      return $responsee;
  }
  $meeting['topic']=$subjectName;
  $startdatetime=$date." ".$startTime;
  $enddatetime=$date." ".$endTime;
  $date1= date_format(date_create($startdatetime),'Y-m-d H:i');
  $date2=  date_format(date_create($enddatetime),'Y-m-d H:i');
  $meeting['start_time']=$date1;
  $meeting['duration']=floor(abs(strtotime($date2) - strtotime($date1))/60);;
  //Create meeting
  $response=createmeeting($meeting);
  if (isset($response->id)) {
    $res=json_encode($response);
    $meeting_id=$response->id;

    $sql = "INSERT INTO pre_scheduleinfo_DB (time, date,subject_name,end_time,phoneNo,meeting_id,responsive)  
    VALUES ('$startTime','$date','$subjectName','$endTime','$tutorPhone','$meeting_id','$res')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: tutorSession.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  }else{
    echo "Error";
  }


$conn->close();
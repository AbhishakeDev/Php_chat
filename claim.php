<?php
$room=$_POST['room'];

if(strlen($room)>20){
    $message="Please choose a name between 2 to 20 characters";
    echo '<script language="javascript">';
    echo 'alert("'.$message.'");';
    echo 'window.location="http://localhost/chatroom";';
    echo '</script>';

}
//if the room name is not alphanumeric
else if(!ctype_alnum($room)){
    $message="Please choose an alphanumeric room name";
    echo '<script language="javascript">';
    echo 'alert("'.$message.'");';
    echo 'window.location="http://localhost/chatroom";';
    echo '</script>';
}

else{
    //connecting to the database
    include 'db_connect.php';
    echo "lets chat now";
}

//check if  room already exists or not

$sql="select * from room where roomname = '$room'";
$result= mysqli_query($conn,$sql);
if($result){
    if(mysqli_num_rows($result)>0){
        $message="Please choose a different room name! Room already claimed";
        echo '<script language="javascript">';
        echo 'alert("'.$message.'");';
        echo 'window.location="http://localhost/chatroom";';
        echo '</script>';
    }
    else{
        $sql="insert into room(roomname,stime) values('$room',CURRENT_TIMESTAMP)";
        if(mysqli_query($conn,$sql)){
            $message="Your Room is ready!Go and chat";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/chatroom/rooms.php?roomname='.$room.'";';
            echo '</script>';
        }
    }
}
else{
    echo "Error: ".mysqli_error($conn);
}


?>

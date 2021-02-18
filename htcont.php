<?php
include 'db_connect.php';

$room=$_POST['room'];

$sql="select msg,stime,ip from msgs where room='$room'";

$html_content="";

$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        $res=$res.'<div class="media media-chat media-chat-reverse">';
        $res=$res.'<div class="media-body">';
        // $res=$res.'<p style="color:aquagreen;font-size:5px;">'.$row['ip'].'</p>';
        $res=$res."<p>".$row['msg']."</p>";
        $res=$res.' <p class="meta"><time datetime="2018">'.$row['stime'].'</time></p></div></div>';
    }
}
echo $res;

?>



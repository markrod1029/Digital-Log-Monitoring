<?php

error_reporting(0);
$patient_id = $_SESSION['patient_id'];

    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['doctor_id']}
                OR outgoing_msg_id = {$row['doctor_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY`messages`.`msg_id` DESC";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;

        if($result == 'No message available'){

            
        }

        else{


        if($row2['message_status']==1 &&  $patient_id != $row2['outgoing_msg_id'] ){
            $highlight = 'Style="font-weight:bold;"';

        }
        else if($row2['msg']==null ){
            $highlight = '';

        }
        else{
            $highlight = '';
        }

        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
        ($row['chat_status'] == "Offline now") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['id']) ? $hid_me = "hide" : $hid_me = "";

        $output .= '<a href="chat.php?doctor_id='. $row['doctor_id'] .'">
                    <div class="content" '. $highlight .' >
                    <img src="../images/'. $row['doctor_profile_image'] .'" alt="">
                    <div class="details">
                        <span '. $highlight .' >'. $row['doctor_name'].'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
    }
}




    while($row1 = mysqli_fetch_assoc($query1)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row1['id']}
                OR outgoing_msg_id = {$row1['id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id})  ORDER BY `messages`.`msg_id` DESC ";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;


        if($result == 'No message available'){

            
        }

        else{

        if($row2['message_status']==1  &&  $patient_id != $row2['outgoing_msg_id'] ){

            $highlight = 'Style="font-weight:bold;"';

        }


        else if($row2['msg']==null){
            $highlight = '';

        }
        else{
            $highlight = '';
        }

        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        }else{
            $you = "";

          
        }
        ($row['chat_status'] == "Offline now") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['id']) ? $hid_me = "hide" : $hid_me = "";


        $output .= '<a href="chat.php?doctor_id='. $row1['id'] .' ">
                    <div class="content" '. $highlight .' >
                    <img src="../images/'.  $row1['photo'] .'" alt="">
                    <div class="details" >
                        <span '. $highlight .' >'. $row1['admin_firstname'].' '. $row1['admin_lastname']. '</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
    }
}
?>
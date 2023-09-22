<?php
session_start();

if (isset($_SESSION['admin'])) {
    include_once "config.php";
    // $outgoing_id = $_SESSION['admin'];

     $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);

        $qry = "SELECT * FROM tblplumber WHERE position = 'clerk'";
        $query = $conn->query($qry);
        $num = mysqli_num_rows($query);
        while ($rw = $query->fetch_assoc()) {
            $outgoing_id = $rw['plumber_ID'];
        }
   
    $output = "";
    $sql = "SELECT * FROM messages
            LEFT JOIN tblclients ON tblclients.client_ID = messages.outgoing_msg_id
            WHERE (outgoing_msg_id = " . intval($outgoing_id) . " AND incoming_msg_id = " . intval($incoming_id) . ")
            OR (outgoing_msg_id = " . intval($incoming_id) . " AND incoming_msg_id = " . intval($outgoing_id) . ")
            ORDER BY msg_id";
    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            if ($row['outgoing_msg_id'] === $outgoing_id) {
                $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p style="background-color:#D3D3D3; color:#000">' . $row['msg'] . '</p>
                                </div>
                            </div>';
            } else {
                    $output .= '<div class="chat incoming">
                                    <div class="details">
                                        <p>' . $row['msg'] . '</p>
                                    </div>
                                </div>';
           
            }
        }
    } else {
        $output .= '<div class="text">No messages are available. Once you send a message, they will appear here.</div>';
    }

    echo $output;
} else {
    header("location: ../message.php");
}
?>

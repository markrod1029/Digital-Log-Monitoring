// Connect username to another sub username
$username = $_POST['username'];
$email = $_POST['email'];
$query = "INSERT INTO users (username, email) VALUES ('$username', '$email')";

if (mysqli_query($conn, $query)) {
    echo "Username successfully connected to another sub username!";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Connect username to another sub username
const username = document.getElementById("username").value;
const sub_username = document.getElementById("sub_username").value;

fetch('/connect_usernames', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json'
  },
  body: JSON.stringify({username, sub_username})
})
  .then(res => res.json())
  .then(data => {
    if (data.success){
      alert('Username successfully connected to another sub username!')
    } else {
      alert('Error: ' + data.error)
    }
  });
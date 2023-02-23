<?php

session_start();
$username = $_SESSION['username'];

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "users";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$query = mysqli_query($conn,"SELECT points FROM login WHERE username = '".$username."'");
$fila = mysqli_fetch_assoc($query);
$points = $fila['points'];

function quitar_puntos($x){
    global $conn, $fila, $username, $points;
    $rest= $fila['points'] - $x;
    mysqli_query($conn, "UPDATE login SET points = $rest WHERE username = 'admin'");

    $query = mysqli_query($conn,"SELECT points FROM login WHERE username = '".$username."'");
    $fila = mysqli_fetch_assoc($query);
    $points = $fila['points'];
}

if(isset($_POST['spin'])) {
    quitar_puntos($_POST['amount']);
  }  

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <title>Document</title>
</head>
<body onload="spin()">
    <nav>
        User:<?php echo $points?>
    </nav>
    <div class="roulette-container">
        <div class="roulette" id="roulette">
            <div class="roulette-item"></div>
            <div class="roulette-item"></div>
            <div class="roulette-item"></div>
        </div>
            <form method="POST">
                <div class="buttons">
                    <input id="rangeInput" type="range" min="0" max=<?php echo $points?> oninput="amount.value=rangeInput.value"/>
                    <input name="amount" id="amount" type="number" value="0" min="0" max=<?php echo $points?> oninput="rangeInput.value=amount.value" />
                </div>
                <button id="btn-spin" type="submit" name="spin">Spin</button>
            </form>
            <button onclick="spin()" id="miBoton">sasa</button>
    </div>
</body>
</html>


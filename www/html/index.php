<?php
ini_set('display_errors', 1);
try {
    $conn = new mysqli('127.0.0.1:3306', 'root', 'secret', 'dockerFuDB');
    // $conexion = pg_connect("host=localhost port=3001 dbname=nclouds_db user=backenduser password=backendpassword");
    // $conexion = new PDO("sqlite:/db/libros.sqlite");
    // if ($conexion) {
    //     // $conexion->exec("CREATE TABLE IF NOT EXISTS libros(nombre TEXT);");
    //     $consulta = $conexion->query("CREATE TABLE IF NOT EXISTS libros(nombre TEXT);");
    //     $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    // }

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "id: " . $row["user_id"] . " - Name: " . $row["user"] . " " . $row["email"] . "<br>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<html>
<head>
<title>Docker Compose Homework</title>
</head>
<body>

<h1>Docker Compose Insertion</h1>

<form method="post" action="insert-data.php">
<input type="hidden" name="submitted" value="true" />
<fieldset>
	<legend>New User's</legend>
	<label>Username: <input type="text" name="usrname" /></label>
	<label>E-mail: <input type="text" name="email" /></label>
</fieldset>
<br />
<input type="submit" value="Insert into MySQL"/> <input type="submit" value="Insert into RedisCACHE"/>
</form>
<?php
	echo $newInsert
?>
</body>
</html>
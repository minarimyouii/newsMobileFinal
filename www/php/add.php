<?php  

$db = mysqli_connect('localhost','root','','goal');

		if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers:{$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }

    	$postdata = file_get_contents("php://input");
    	$request = json_decode($postdata);

		$goalname = $request->goalname;

		$query = "INSERT INTO addgoal (goalname) VALUES ('$goalname')";
		mysqli_query($db, $query);
		//$_SESSION['msg'] = "Address Saved";
		//header('location:index.html'); //redirect to headerlocation after insert

		echo $goalname;
?>
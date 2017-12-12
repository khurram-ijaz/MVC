<?php
	
	//include_once ('socket_server.php');
	

	$ip = "127.0.0.1";
	$port = 8007; 
	set_time_limit(0);

	if (!$socket=socket_create(AF_INET, SOCK_STREAM, 0)) 
	{
			echo "Could not create socket \n";
	}	

	if (!$conn=socket_connect($socket, $ip, $port)) {
		echo "Could not connect to server \n";
	}

	$message = "Hello server21212";
	socket_write($socket, $message, strlen($message)) or die("Could not send data to server \n") ;


	if (!$reply = socket_read($socket, 5000, PHP_NORMAL_READ)) {
		echo "Could not read server response \n";
	}
	echo "Reply From the server:". $reply;
	//socket_close($socket);

 ?>
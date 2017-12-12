
	<?php
		set_time_limit(0);

		$ip="127.0.0.1";
		$port=8007;
		if (!$socket=socket_create(AF_INET, SOCK_STREAM, 0)) {

			showError();	
		}

		if (!socket_bind($socket,$ip, $port)) {
			showError($socket);
		}

		if (!socket_listen($socket, 10)) { 
			showError();
		}

		do{
			$client=socket_accept($socket);
			$message="Welcome to chat using sockets \n \n";
			socket_write($client, $message, strlen($message));	

			do{
				if (!$client_msg=socket_read($client, 5000, PHP_NORMAL_READ)) {
					die("Could not read input from client \n \n");
				}

				//$client_msg=socket_read($client, 5000, PHP_NORMAL_READ) or die("Could not read input \n");

				if (!$client_msg = trim($client_msg)) {
					continue;
				}

				echo "Message from client:" . $client_msg ;

				if ($client_msg == 'close') {
					socket_close($client);
					echo "The user has left communication \n";
					break 2;
				}

			}while (true);
		}while (true);

		echo "Closing the socket \n";
		socket_close($socket);

		function showError($thesocket= null)
		{
			$errorcode = socket_last_error($thesocket);
			$errormsg = socket_strerror($errorcode);
			die("Could not create socket: [$errorcode] $errormsg \n");
		}
	 ?>
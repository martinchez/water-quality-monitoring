<?php
   if (assets($_GET['payload'])
		&& isset($_GET['imei'])
		)

    {
		// Database connection

		include "connection.php";

		// get the values
		$temp = htmlspecialchars($_GET['temp']);
		$humidity = htmlspecialchars($_GET['ph']);
		$pressure = htmlspecialchars($_GET['ec']);
		$turbidity = htmlspecialchars($_GET['turbidity']);



		$query = "INSERT INTO
				  data_stream
				  ( temperature, ph, ec,turbidity)
				  VALUES
				  ( '$temp', '$ph', '$ec','$turbidity')";

		if (!mysqli_query($conn, $query))	{
			$data = [
				'status' => 'error has occured',
				'message' => mysqli_error($conn)
			];
		}	 else{
			$data = [
				'status' => 'success',
				'message' => 'a new record added'
			];
		} 
		$data = json_encode($data);
		echo $data;


	}


?>
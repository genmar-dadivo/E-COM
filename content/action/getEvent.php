<?php
	require '../dbase/dbconfig.php';
	$sql = "SELECT * FROM events";
	$stm = $con->prepare($sql);
	$stm->execute();
	if (isset($_GET['t'])) {
		$results = $stm->fetchAll(PDO::FETCH_ASSOC);
		if ($stm->rowCount() >= 1) {
			foreach ($results as $row) {
				$id = $row['id'];
				$title = ucwords(strtolower(preg_replace("/[^A-Za-z0-9@ \-\']/", '', $row['title'])));
				$color = $row['color']; 
				$eventdescription = ucwords(strtolower(preg_replace("/[^A-Za-z0-9@ \-\']/", '', $row['eventdescription'])));
				$starttime = $row['starttime']; 
				$endtime = $row['endtime']; 
				$datesent = $row['datesent'];
				$data['data'][] = array(
					"",
					"$title",
					"",
					"$color",
					"$starttime",
					"$endtime",
					"$datesent",
					"<i class='fa fa-trash pointer' onclick='deleteevent($id);'></i>"
				);
			}
		}
		else {
			$data['data'][] = array(
				"",
				"No Data",
				"",
				"",
				"",
				"",
				"",
				""
			);
		}
	}
	else {
		$result = $stm->fetchAll();
		foreach($result as $rowSched) {
			$id = $rowSched['id'];
			$title = $rowSched['title'];
			$color = $rowSched['color'];
			$eventdescription = $rowSched['eventdescription'];
			$starttime = $rowSched['starttime'];
			$endtime = $rowSched['endtime'];
			$datesent = $rowSched['datesent'];
			$data[] = array(
				'id'   			=> $id,
				'title'   		=> $title,
				'start'   		=> $starttime,
				'end'			=> $endtime,
				'color' 		=> $color,
				'className' 	=> "pointer",
			);
		}
	}
	echo json_encode($data);
?>
<?php
$ph_count_tasks = 0;
$ph_staff_id = $thisstaff->getId();
$spojeni = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
$ost_tasks = mysqli_query($spojeni, "SELECT COUNT(`id`) AS count FROM ost_task WHERE ost_task.staff_id = $ph_staff_id AND closed IS NULL");
	while ($zaznam_task = mysqli_fetch_array ($ost_tasks)) 
	{
		$ph_count_tasks = $zaznam_task["count"];
	}
define('ph_count_tasks', $ph_count_tasks)
?>
<?php
$ph_count_tickets = 0;
$ph_staff_id = $thisstaff->getId();
$spojeni = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
$ost_dept = mysqli_query($spojeni, "SELECT ost_staff.dept_id FROM ost_staff WHERE ost_staff.staff_id = $ph_staff_id");
	while ($zaznam_ticket = mysqli_fetch_array ($ost_dept)) 
	{
		$ph_dept_id = $zaznam_ticket["dept_id"];
		$ost_tcnt = mysqli_query($spojeni, "SELECT COUNT(`ticket_id`) AS count FROM `ost_ticket` WHERE `status_id` = 1 AND `dept_id` = $ph_dept_id");
		while ($zaznam_tcnt = mysqli_fetch_array ($ost_tcnt)) {$ph_count_tickets = $ph_count_tickets + $zaznam_tcnt["count"];}
	}		
$ost_dept = mysqli_query($spojeni, "SELECT ost_staff_dept_access.dept_id FROM ost_staff_dept_access WHERE ost_staff_dept_access.staff_id = $ph_staff_id");
	while ($zaznam_ticket = mysqli_fetch_array ($ost_dept)) 
	{
		$ph_dept_id = $zaznam_ticket["dept_id"];
		$ost_tcnt = mysqli_query($spojeni, "SELECT COUNT(`ticket_id`) AS count FROM `ost_ticket` WHERE `status_id` = 1 AND `dept_id` = $ph_dept_id");
		while ($zaznam_tcnt = mysqli_fetch_array ($ost_tcnt)) {$ph_count_tickets = $ph_count_tickets + $zaznam_tcnt["count"];}
	}
define('ph_count_tickets', $ph_count_tickets)
?>
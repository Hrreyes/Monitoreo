<?php

	function redirect_to($location)
	{
	    if (!headers_sent($file, $line)) {
	        header("Location: " . $location);
	    } else {
	        printf("<script>location.href='%s';</script>", urldecode($location));
	        # or deal with the problem
	    }
	    printf('<a href="%s">ACTUALIZAR</a>', urlencode($location));
	    exit;
	}

	function get_leads_list_with_paging($records, $offset)
	{
		global $connection;
		$query = "SELECT l.name, l.phone, l.email, l.nit, l.dpi, ld.id, ld.preview from leads l inner join lead_detail ld on l.id = ld.leads_id order by ld.id DESC LIMIT $records OFFSET $offset";
		$order_set = mysqli_query($connection, $query);

		return $order_set;
	}


	function get_leads_list_with_paging_by_date($start, $end, $records, $offset)
	{
		global $connection;
		$query = "SELECT l.name, l.phone, l.email, l.nit, l.dpi, ld.id, ld.preview from leads l inner join lead_detail ld on l.id = ld.leads_id WHERE created BETWEEN ('" . $start . "') and ('" . $end . "') order by ld.id DESC LIMIT $records OFFSET $offset";
		$order_set = mysqli_query($connection, $query);

		return $order_set;
	}

	function get_leads_list_with_paging_by_updated_date($start, $end, $records, $offset)
	{
		global $connection;
		$query = "SELECT l.name, l.phone, l.email, l.nit, l.dpi, ld.id, ld.preview from leads l inner join lead_detail ld on l.id = ld.leads_id WHERE updated BETWEEN ('" . $start . "') and ('" . $end . "') order by ld.id DESC LIMIT $records OFFSET $offset";
		$order_set = mysqli_query($connection, $query);
		echo '<script type="text/javascript">alert("'. $query .'")</script>';
		return $order_set;
	}


	function get_leads_list()
	{
		global $connection;
		$query = "SELECT l.name, l.phone, l.email, l.nit, l.dpi, ld.id, ld.preview from leads l inner join lead_detail ld on l.id = ld.leads_id order by ld.id";
		$order_set = mysqli_query($connection, $query);

		return $order_set;
	}

	function count_leads_list()
	{
		global $connection;
		$query = "SELECT l.name, l.phone, l.email, l.nit, l.dpi, ld.id, ld.preview from leads l inner join lead_detail ld on l.id = ld.leads_id";
		$order_set = mysqli_query($connection, $query);

		return $order_set;
	}

	function count_leads_by_date_list($start, $end)
	{
		global $connection;
		$query = "SELECT l.name, l.phone, l.email, l.nit, l.dpi, ld.id, ld.preview from leads l inner join lead_detail ld on l.id = ld.leads_id";
		$query .= " WHERE updated BETWEEN ('" . $start . "') and ('" . $end . "') ";
		$order_set = mysqli_query($connection, $query);

		return $order_set;
	}

	function count_leads_by_updated_date_list($start, $end)
	{
		global $connection;
		$query = "SELECT l.name, l.phone, l.email, l.nit, l.dpi, ld.id, ld.preview from leads l inner join lead_detail ld on l.id = ld.leads_id";
		$query .= " WHERE updated BETWEEN ('" . $start . "') and ('" . $end . "') ";
		$order_set = mysqli_query($connection, $query);

		return $order_set;
	}


	function export_to_csv()
	{
		global $connection;
		$query = "SELECT l.name, l.phone, l.email, l.nit, l.dpi, ld.id, ld.preview from leads l inner join lead_detail ld on l.id = ld.leads_id order by ld.id DESC";
		$order_set = mysqli_query($connection, $query);

		return $order_set;
	}

	function get_leads_detail($myid)
	{
		global $connection;
		$query = "SELECT preview FROM lead_detail WHERE id = $myid";
		$order_set = mysqli_query($connection, $query);

		return $order_set;
	}

	function left($str, $length) {
	     return substr($str, 0, $length);
	}
	 
	function right($str, $length) {
	     return substr($str, -$length);
	}
	
?>
<?php 

// LIST AND SEARCH FOR TRADES

require_once ("../../db_connection/conn.php");


$limit = 10;
$page = 1;

if ($_POST['page'] > 1) {
	$start = (($_POST['page'] - 1) * $limit);
	$page = $_POST['page'];
} else {
	$start = 0;
}


$query = "
	SELECT * FROM gmsa_subscribers 
	WHERE status = 0 
";
$search_query = ((isset($_POST['query'])) ? sanitize($_POST['query']) : '');
$find_query = str_replace(' ', '%', $search_query);
if ($search_query != '') {
	$query .= '
		AND (subscriber_id LIKE "%'.$find_query.'%" 
		OR subscriber_email LIKE "%'.$find_query.'%" 
		OR createdAt LIKE "%'.$find_query.'%") 
	';
} else {
	$query .= 'ORDER BY createdAt DESC ';
}

$filter_query = $query . 'LIMIT ' . $start . ', ' . $limit . '';

$total_data = $conn->query("SELECT * FROM gmsa_subscribers WHERE status = 0")->rowCount();

$statement = $conn->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$count_filter = $statement->rowCount();


$output = '
    	<div class="text-muted"> Showing ' . $count_filter . ' to 10 of ' . $total_data . ' entries </div>
        <div class="table-responsive">
	        <table class="table">
	            <thead>
	                <tr>
	                    <th> &nbsp; </th>
	                    <th> Email </th>
	                    <th> Date </th>
	                    <th style="width:100px; min-width:100px;"> &nbsp; </th>
	                </tr>
	            </thead>
	            <tbody>
';

if ($total_data > 0) {
	$i = 1;
	foreach ($result as $row) {

		$output .= '
			<tr>
                <td class="align-middle col-checker">' . $i . '</td>
                <td> 
                    '.$row["subscriber_email"].'
                </td>
                <td class="align-middle"> '.pretty_date($row["createdAt"]).' </td>
                <td class="align-middle text-right">
                    <a href="?remove='.$row["subscriber_id"].'" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></a> 
                </td>
            </tr>
		';
		$i++;
	}

} else {
	$output .= '
		<tr class="text-warning">
			<td colspan="5">No data found!</td>
		</tr>
	';
}

$output .= '
			</tbody>
        </table>
    </div>
            
';

if ($total_data > 0) {
	$output .= '
		<ul class="pagination justify-content-center mt-4">
	';

	$total_links = ceil($total_data / $limit);

	$previous_link = '';
	$next_link = '';
	$page_link = '';

	if ($total_links > 4) {
		if ($page < 5) {
			for ($count = 1; $count <= 5; $count++) {
				$page_array[] = $count;
			}
			$page_array[] = '...';
			$page_array[] = $total_links;
		} else {
			$end_limit = $total_links - 5;
			if ($page > $end_limit) {
				$page_array[] = 1;
				$page_array[] = '...';

				for ($count = $end_limit; $count <= $total_links; $count++) {
					$page_array[] = $count;
				}
			} else {
				$page_array[] = 1;
				$page_array[] = '...';
				for ($count = $page - 1; $count <= $page + 1; $count++) {
					$page_array[] = $count;
				}
				$page_array[] = '...';
				$page_array[] = $total_links;
			}
		}
	} else {
		for ($count = 1; $count <= $total_links; $count++) {
			$page_array[] = $count;
		}
	}

	for ($count = 0; $count < count($page_array); $count++) {
		if ($page == $page_array[$count]) {
			$page_link .= '
                <li class="page-item active">
	                <a class="page-link" href="javascript:;">'.$page_array[$count].'</a>
	            </li>
			';

			$previous_id = $page_array[$count] - 1;
			if ($previous_id > 0) {
				$previous_link = '
	                <li class="page-item">
                        <a class="page-link page-link-go" href="javascript:;" data-page_number="'.$previous_id.'" tabindex="-1">
                        	<i class="fa fa-lg fa-angle-left"></i>
                        </a>
                    </li>
				';
			} else {
				$previous_link = '
	                <li class="page-item disabled">
	                    <a class="page-link" href="javascript:;" tabindex="-1">
	                    	<i class="fa fa-lg fa-angle-left"></i>
	                    </a>
	                </li>
				';
			}

			$next_id = $page_array[$count] + 1;
			if ($next_id >= $total_links) {
				$next_link = '
                    <li class="page-item disabled">
                        <a class="page-link" href="javascript:;">
                        	<i class="fa fa-lg fa-angle-right"></i>
                        </a>
                    </li>
				';
			} else {
				$next_link = '
                    <li class="page-item">
                        <a class="page-link page-link-go" href="javascript:;" data-page_number="'.$next_id.'">
                        	<i class="fa fa-lg fa-angle-right"></i>
                        </a>
                    </li>
				';
			}

		} else {
			
			if ($page_array[$count] == '...') {
				$page_link .= '
					<li class="page-item disabled">
                        <a class="page-link" href="javascript:;" tabindex="-1">...</a>
                    </li>
				';
			} else {
				$page_link .= '
					<li class="page-item">
						<a class="page-link page-link-go" href="javascript:;" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a>
					</li>
				';
			}
		}

	}

	$output .= $previous_link. $page_link . $next_link;
}

echo $output . '
					</ul>
                </div>
            ';

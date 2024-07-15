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
	SELECT * FROM gmsa_members 
	WHERE status = 0 
";
$search_query = ((isset($_POST['query'])) ? sanitize($_POST['query']) : '');
$find_query = str_replace(' ', '%', $search_query);
if ($search_query != '') {
	$query .= '
		AND (member_id LIKE "%'.$find_query.'%" 
		OR member_firstname LIKE "%'.$find_query.'%" 
		OR member_lastname LIKE "%'.$find_query.'%" 
		OR member_email LIKE "%'.$find_query.'%" 
		OR member_phone LIKE "%'.$find_query.'%" 
		OR member_dob LIKE "%'.$find_query.'%" 
		OR member_studentid LIKE "%'.$find_query.'%" 
		OR member_department LIKE "%'.$find_query.'%" 
		OR member_level LIKE "%'.$find_query.'%" 
		OR member_hostel LIKE "%'.$find_query.'%") 
	';
} else {
	$query .= 'ORDER BY createdAt DESC ';
}

$filter_query = $query . 'LIMIT ' . $start . ', ' . $limit . '';

$total_data = $conn->query("SELECT * FROM gmsa_members WHERE status = 0")->rowCount();

$statement = $conn->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$count_filter = $statement->rowCount();


$output = ' 
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#tab1">All(' . $total_data . ')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab2">Other</a>
            </li>
        </ul>
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                </div>
                <input type="text" id="search" class="form-control" placeholder="Search record">
            </div>
        </div>

    	<div class="text-muted"> Showing ' . $count_filter . ' to 10 of ' . $total_data . ' entries </div>
        <div class="table-responsive">
	        <table class="table">
	            <thead>
	                <tr>
	                    <th colspan="2" style="min-width:320px">
	                        <div class="thead-dd dropdown">
	                            <span class="custom-control custom-control-nolabel custom-checkbox"><input type="checkbox" class="custom-control-input" id="check-handle"> <label class="custom-control-label" for="check-handle"></label></span>
	                            <div class="thead-btn" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                <span class="fa fa-caret-down"></span>
	                            </div>
	                            <div class="dropdown-menu">
	                                <div class="dropdown-arrow"></div>
	                                <a class="dropdown-item" href="#">Select all</a> 
	                                <a class="dropdown-item" href="#">Unselect all</a>
	                                <div class="dropdown-divider"></div>
	                                <a class="dropdown-item" href="#">Bulk remove</a> 
	                                <a class="dropdown-item" href="#">Bulk edit</a> 
	                                <a class="dropdown-item" href="#">Separate actions</a>
	                            </div>
	                        </div>
	                    </th>
	                    <th> Level </th>
	                    <th> Programme </th>
	                    <th> Department </th>
	                    <th> Phone </th>
	                    <th> Hostel </th>
	                    <th style="width:100px; min-width:100px;"> &nbsp; </th>
	                </tr>
	            </thead>
	            <tbody>
';

if ($total_data > 0) {
	foreach ($result as $row) {

		$output .= '
			<tr>
                <td class="align-middle col-checker">
                    <div class="custom-control custom-control-nolabel custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="selectedRow[]" id="p3"> <label class="custom-control-label" for="p3"></label>
                    </div>
                </td>
                <td>
                    <a href="#" class="tile tile-img mr-1">
                        <img class="img-fluid" src="assets/images/dummy/img-1.jpg" alt="Card image cap">
                    </a> 
                    <a href="javascript:;" data-target="#memberModal_' . $row["id"] . '" data-toggle="modal">Tomato - Green</a>
                </td>
                <td class="align-middle"> '.$row["member_level"].' </td>
                <td class="align-middle"> '.ucwords($row["member_programme"]).' </td>
                <td class="align-middle"> '.ucwords($row["member_department"]).' </td>
                <td class="align-middle"> '.$row["member_phone"].' </td>
                <td class="align-middle"> '.ucwords($row["member_hostel"]).' </td>
                <td class="align-middle text-right">
                    <a href="?edit='.$row["member_id"].'" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Edit</span></a> 
                    <a href="?remove='.$row["member_id"].'" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></a> 
                </td>
            </tr>

            <!-- Trade details -->
            <div class="modal fade" id="memberModal_' . $row["id"] . '" tabindex="-1" aria-labelledby="memberModalLabel_' . $row["id"] . '" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content overflow-hidden">
						<div class="modal-header pb-0 border-0">
							<h1 class="modal-title h4" id="memberModalLabel_' . $row["id"] . '">' . $row["member_firstname"] . ' details</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body p-0 text-center">
							<ul class="list-group">
								<li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <small class="text-muted">Full name,</small>
			                        <p>' . ucwords($row["member_firstname"] . ' ' . $row["member_middlename"] . '  ' . $row["member_lastname"]) . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <small class="text-muted">Email,</small>
			                        <p>' . $row["member_email"] . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <small class="text-muted">Phone</small>
			                        <p>' . $row["member_phone"] . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <small class="text-muted">Gender</small>
			                        <p>' . $row["member_gender"] . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <small class="text-muted">Date of Birth</small>
			                        <p>' . $row["member_dob"] . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <small class="text-muted">Region</small>
			                        <p>' . ucwords($row["member_region"]) . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <small class="text-muted">City</small>
			                        <p id="send-amount">' . ucwords($row["member_city"]) . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <small class="text-muted">Digital address</small>
			                        <p id="send-amount">' . $row["member_digitaladdress"] . '</p>
			                    </li>
			                </ul>
			                <h3>School details</h>
							<ul class="list-group">
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <small class="text-muted">Student Id</small>
			                        <p>' . $row["member_studentid"] . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <small class="text-muted">Programme</small>
			                        <p>' . $row["member_programme"] . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <small class="text-muted">Department</small>
			                        <p>' . ucwords($row["member_department"]) . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <small class="text-muted">Admission type</small>
			                        <p>' . ucwords($row["member_admissiontype"]) . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <small class="text-muted">Admission year</small>
			                        <p>' . $row["member_admissionyear"] . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <small class="text-muted">Level</small>
			                        <p>' . ucwords($row["member_level"]) . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <small class="text-muted">Hostel</small>
			                        <p>' . ucwords($row["member_hostel"]) . '</p>
			                    </li>
			                </ul>
			                <h3>School details</h>
							<ul class="list-group">
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <small class="text-muted">Parent / Guardian name</small>
			                        <p>' . ucwords($row["member_guardianfullname"]) . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <small class="text-muted">Parent / Guardian name</small>
			                        <p>' . $row["member_guardianphonenumber"] . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <small class="text-muted">Date</small>
			                        <p>' . pretty_date($row["createdAt"]) . '</p>
			                    </li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		';
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
                        <a class="page-link" href="javascript:;" data-page_number="'.$previous_id.'" tabindex="-1">
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
                        <a class="page-link" href="javascript:;" data-page_number="'.$next_id.'">
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

<?php 

// LIST AND SEARCH FOR EXECUTIVES

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
	SELECT *, gmsa_executives.createdAt AS eca, gmsa_members.createdAt AS mca FROM gmsa_executives 
	INNER JOIN gmsa_members 
	ON gmsa_members.member_id = gmsa_executives.member_id 
	INNER JOIN gmsa_positions 
	ON gmsa_positions.position_id = gmsa_executives.position_id 
	WHERE gmsa_executives.status = 0 
";
$search_query = ((isset($_POST['query'])) ? sanitize($_POST['query']) : '');
$find_query = str_replace(' ', '%', $search_query);
if ($search_query != '') {
	$query .= '
		AND (member_id LIKE "%'.$find_query.'%" 
		OR member_firstname LIKE "%'.$find_query.'%" 
		OR member_middlename LIKE "%'.$find_query.'%" 
		OR member_lastname LIKE "%'.$find_query.'%" 
		OR member_programme LIKE "%'.$find_query.'%" 
		OR member_level LIKE "%'.$find_query.'%" 
		OR Position LIKE "%'.$find_query.'%") 
	';
} else {
	$query .= 'ORDER BY gmsa_executives.createdAt DESC ';
}

$filter_query = $query . 'LIMIT ' . $start . ', ' . $limit . '';

$total_data = $conn->query("SELECT * FROM gmsa_executives WHERE status = 0")->rowCount();

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
	                    <th> Position </th>
	                    <th> Level </th>
	                    <th> Programme </th>
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
                <td class="align-middle col-checker">
                    <div class="custom-control custom-control-nolabel custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="selectedRow[]" id="p3"> <label class="custom-control-label" for="p3"></label>
                    </div>
                </td>
                <td>
                    <a href="#" class="tile tile-img mr-1">
                        <img class="img-fluid" src="' . PROOT . (($row["member_picture"] == '') ? 'assets/media/default.png' : $row['member_picture']) . '" alt="Card image cap">
                    </a> 
                    <a href="javascript:;" data-target="#memberModal_' . $i . '" data-toggle="modal">'.ucwords($row["member_firstname"] . ' ' . $row["member_middlename"] . '  ' . $row["member_lastname"]).'</a>
                </td>
                <td class="align-middle"> '.ucwords($row["position"]).' </td>
                <td class="align-middle"> '.$row["member_level"].' </td>
                <td class="align-middle"> '.ucwords($row["member_programme"]).' </td>
                <td class="align-middle"> '.pretty_date($row["eca"]).' </td>
                <td class="align-middle text-right">
                    <a href="?remove='.$row["executive_id"].'" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></a> 
                </td>
            </tr>

            <!-- Executive details -->
            <div class="modal fade" id="memberModal_' . $i . '" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel_' . $i. '" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h6 class="modal-title" id="memberModalLabel_' . $i . '">' . $row["member_firstname"] . ' details</h6>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						</div>
						<div class="modal-body p-2">
							<ul class="list-group">
								<li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <p><small class="text-muted">Full name,</small><br>' . ucwords($row["member_firstname"] . ' ' . $row["member_middlename"] . '  ' . $row["member_lastname"]) . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <p><small class="text-muted">Email,</small><br>' . $row["member_email"] . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <p><small class="text-muted">Phone</small><br>' . $row["member_phone"] . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <p><small class="text-muted">Gender</small><br>' . $row["member_gender"] . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <p><small class="text-muted">Date of Birth</small><br>' . $row["member_dob"] . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <p><small class="text-muted">Region</small><br>' . ucwords($row["member_region"]) . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <p><small class="text-muted">City</small><br>' . ucwords($row["member_city"]) . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <p><small class="text-muted">Digital address</small><br>' . $row["member_digitaladdress"] . '</p>
			                    </li>
			                </ul>
			                <h6 class="my-1">School details</h6>
							<ul class="list-group">
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <p><small class="text-muted">Student Id</small><br>' . $row["member_studentid"] . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <p><small class="text-muted">Programme</small><br>' . $row["member_programme"] . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <p><small class="text-muted">Department</small><br>' . ucwords($row["member_department"]) . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <p><small class="text-muted">Admission type</small><br>' . ucwords($row["member_admissiontype"]) . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <p><small class="text-muted">Admission year</small><br>' . $row["member_admissionyear"] . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <p><small class="text-muted">Level</small><br>' . ucwords($row["member_level"]) . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <p><small class="text-muted">Hostel</small><br>' . ucwords($row["member_hostel"]) . '</p>
			                    </li>
			                </ul>
			                <h6 class="my-1">Parent details</h6>
							<ul class="list-group">
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <p><small class="text-muted">Parent / Guardian name</small><br>' . ucwords($row["member_guardianfullname"]) . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <p><small class="text-muted">Parent / Guardian name</small><br>' . $row["member_guardianphonenumber"] . '</p>
			                    </li>
			                    <li class="list-group-item" style="padding: 0.1rem 1rem;">
			                        <p><small class="text-muted">Date</small><br>' . pretty_date($row["createdAt"]) . '</p>
			                    </li>
							</ul>
						</div>
					</div>
				</div>
			</div>
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

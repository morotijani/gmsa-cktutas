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
    SELECT * FROM gmsa_news 
    INNER JOIN gmsa_categories 
    ON gmsa_categories.category_id = gmsa_news.news_category 
    INNER JOIN gmsa_admin 
    ON gmsa_admin.admin_id = gmsa_news.news_created_by 
    WHERE gmsa_news.status = 0
    
";
$search_query = ((isset($_POST['query'])) ? sanitize($_POST['query']) : '');
$find_query = str_replace(' ', '%', $search_query);
if ($search_query != '') {
	$query .= '
		AND (gmsa_categories.category LIKE "%'.$find_query.'%" 
		OR news_title LIKE "%'.$find_query.'%" 
		OR gmsa_admin.admin_fullname LIKE "%'.$find_query.'%" 
		OR gmsa_news.createdAt = "'.$find_query.'") 
	';
} else {
	$query .= 'ORDER BY gmsa_news.id DESC ';
}

$filter_query = $query . 'LIMIT ' . $start . ', ' . $limit . '';

$total_data = $conn->query("SELECT * FROM gmsa_news WHERE status = 0")->rowCount();

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
	                    <th></th>
                        <th>Heading</th>
                        <th>Category</th>
                        <th>Views</th>
                        <th>Date</th>
                        <th>Added by</th>
                        <th></th>
                        <th></th>
	                </tr>
	            </thead>
	            <tbody>
';

if ($total_data > 0) {
	$i = 1;
	foreach ($result as $row) {
		$output .= "
			<tr>
	    		<td>" . $i . "</td>
	            <td>" . $row['news_title'] . "</td>
	            <td>" . ucwords($row['category']) . "</td>
	            <td>" . $row['news_views'] . "</td>
	            <td>" . pretty_date($row['createdAt']) . "</td>
	            <td>" . ucwords($row['admin_fullname']) . "</td>
	            <td>
	            	<a class='badge badge-subtle badge-" . (($row['news_featured'] == 1) ? 'success' : 'dark') . " text-decoration-none' href='" . PROOT . 'admin/blog/add/featured/' . $row['news_id'] . '/' . (($row['news_featured'] == 0) ? 1 : 2) . "'>" . (($row['news_featured'] == 1) ? 'featured' : '+ featured') . "</a>
	            </td>
	            <td>
	                <a class='btn btn-primary text-decoration-none' href='javascript:;' data-toggle='modal' data-target='#viewModal" . $i . "'>View</a>&nbsp;
	                <a class='btn btn-secondary text-decoration-none' href='" . PROOT . "admin/blog/add/edit_news/" . $row['news_id'] . "'>Edit</a>&nbsp;
	                <a href='javascript:;' class='btn btn-danger text-decoration-none' data-toggle='modal' data-target='#deleteModal" . $i . "'>Delete</a>

	                <!-- VIEW DETAILS MODAL -->
					<div class='modal fade' id='viewModal" . $i . "' tabindex='-1' role='dialog' aria-labelledby='viewModalLabel".$i."' aria-hidden='true' data-backdrop='static' data-keyboard='false'>
					  	<div class='modal-dialog modal-lg modal-dialog-centered' role='document'>
					    	<div class='modal-content' style='background-color: rgb(51, 51, 51)'>
					    		<div class='modal-header'>
									<h6 class='modal-title' id='viewModalLabel".$i."'>" . $row["news_title"] . "</h6>
									<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span></button>
					    		</div>
					    		<img class='img-fluid' src='" . PROOT . $row['news_media'] ."' />
					    		<div class='modal-body p-2'>
					    			<br>
					    			<span class='badge badge-subtle badge-info'>" . ucwords($row['category']) . "</span>
					    			<br>
					      			<p>" . nl2br($row['news_content']) . "</p>
					      			<br>
					      			<small class='text-secondary'>
					      				Created By; " . ucwords($row['admin_fullname']) . " <br>
					      				Add On; " . pretty_date($row['createdAt']) . " <br>
					      				Views; " . $row['news_views'] . " <br>
					      			</small>
									<div class='d-flex justify-content-center my-4'>
					        			<button type='button' class='btn btn-secondary rounded-0' data-dismiss='modal'>Close</button>&nbsp;
					        			<a href='javascript:;' data-toggle='modal' data-target='#deleteModal" . $i . "' class='btn btn-danger rounded-0'>Delete.</a>
					      			</div>
					      		</div>
					    	</div>
					 	</div>
					</div>

					<!-- DELETE MODAL -->
					<div class='modal fade' id='deleteModal" . $i . "' tabindex='-1' role='dialog' aria-labelledby='newsModalLabel' aria-hidden='true'>
					  	<div class='modal-dialog modal-dialog-centered modal-sm' role='document'>
					    	<div class='modal-content' style='background-color: rgb(51, 51, 51)'>
					    		<div class='modal-body p-2'>
					      			<p>When you delete this categoy, all news and details under it will be deleted as well.</p>
					      			<br>
					        		<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
					        		<a href='" . PROOT . "admin/blog/add/delete/" . $row['news_id'] . "' class='btn btn-secondary'>Confirm Delete.</a>
					      		</div>
					    	</div>
					 	</div>
					</div>
	            </td>
	        </tr>
	    ";
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

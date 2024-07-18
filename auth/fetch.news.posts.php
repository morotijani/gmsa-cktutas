<?php 

// LIST AND SEARCH FOR TRADES

require_once ("./../db_connection/conn.php");


$limit = 1;
$page = 1;

if ($_POST['page'] > 1) {
	$start = (($_POST['page'] - 1) * $limit);
	$page = $_POST['page'];
} else {
	$start = 0;
}


$query = "
	SELECT *, gmsa_news.createdAt AS bca FROM gmsa_news 
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
		AND (news_title LIKE "%'.$find_query.'%" 
		OR category LIKE "%'.$find_query.'%" 
		OR bcs LIKE "%'.$find_query.'%") 
	';
} else {
	$query .= 'ORDER BY news_views DESC ';
}

$filter_query = $query . 'LIMIT ' . $start . ', ' . $limit . '';

$total_data = $conn->query("SELECT * FROM gmsa_news WHERE status = 0")->rowCount();

$statement = $conn->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$count_filter = $statement->rowCount();


$output = '';

if ($total_data > 0) {
	foreach ($result as $row) {

		$output .= '
			<article class="card card-hover-shadow border p-3 mb-4">
                <div class="row">
                    <div class="col-md-4">
                        <img src="' . PROOT . $row["news_media"] . '" class="img-fluid card-img" alt="blog-img" style="height: 200px; object-fit: cover; object-position: top;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body d-flex flex-column h-100 ps-0 pe-3">
                            <div><span class="badge text-bg-dark mb-3">'.ucwords($row['category']).'</span></div>
                            <h5 class="card-title mb-3 mb-md-0">'.$row["news_title"].'</h5>
                            <div class="d-sm-flex justify-content-between align-items-center mt-auto">
                                <p class="mb-2 heading-color fw-semibold">By '.ucwords($row['admin_fullname']).'</p>
                                <a class="icon-link icon-link-hover stretched-link" href="' . PROOT . 'news/' . $row['news_url'] . '">Read more<i class="bi bi-arrow-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
		';
	}

} else {
	$output .= '
		<div class="alert alert-warning">
			<p>No data found!</p>
		</div>
	';
}

if ($total_data > 0) {
	$output .= '
		<div class="col-12 mt-6">
            <ul class="pagination pagination-primary-soft d-flex justify-content-sm-between flex-wrap mb-0">
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
                <li class="page-item active"><a class="page-link" href="javascript:;">'.$page_array[$count].'</a></li>
			';

			$previous_id = $page_array[$count] - 1;
			if ($previous_id > 0) {
				$previous_link = '
                    <li class="page-item">
                        <a class="page-link page-link-go" href="javascript:;" data-page_number="'.$previous_id.'"><i class="fas fa-long-arrow-alt-left me-2 rtl-flip"></i>Prev</a>
                    </li>
				';
			} else {
				$previous_link = '
                    <li class="page-item disabled">
                        <a class="page-link" href="javascript:;"><i class="fas fa-long-arrow-alt-left me-2 rtl-flip"></i>Prev</a>
                    </li>
				';
			}

			$next_id = $page_array[$count] + 1;
			if ($next_id >= $total_links) {
				$next_link = '
                    <li class="page-item disabled">
                        <a class="page-link" href="javascript:;">Next<i class="fas fa-long-arrow-alt-right ms-2 rtl-flip"></i></a>
                    </li>
				';
			} else {
				$next_link = '
                    <li class="page-item">
                        <a class="page-link page-link-go" href="javascript:;" data-page_number="'.$next_id.'">Next<i class="fas fa-long-arrow-alt-right ms-2 rtl-flip"></i></a>
                    </li>
				';
			}

		} else {
			
			if ($page_array[$count] == '...') {
				$page_link .= '
                    <li class="page-item disabled"><a class="page-link" href="javascript:;">..</a></li>
				';
			} else {
				$page_link .= '
					<li class="page-item"><a class="page-link page-link-go" href="javascript:;" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
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

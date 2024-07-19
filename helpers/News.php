<?php 

	class News {
		private $i = 1;
		private $output = '';
		private $output_recent = '';
		private $output_featured = '';
		private $output_onefeatured = '';
		private $output_single = '';
		private $output_subscribers = '';
		private $output_poupular = '';
		private $output_trending = '';
		private $output_footer = '';
		
		private function findNews($conn, $id) {
			$query = " 
				SELECT * FROM gmsa_news 
				WHERE news_id = ? 
				LIMIT 1
			";
			$statement = $conn->prepare($query);
			$statement->execute([$id]);

			return $statement->rowCount();
		}

		public function allNews($conn, $status) {
			$query = "
		        SELECT * FROM gmsa_news 
		        INNER JOIN gmsa_categories 
		        ON gmsa_categories.category_id = gmsa_news.news_category 
		        INNER JOIN gmsa_admin 
		        ON gmsa_admin.admin_id = gmsa_news.news_created_by 
		        WHERE gmsa_news.status = ?
		        ORDER BY gmsa_news.id DESC 
		    ";
		    $statement = $conn->prepare($query);
		    $statement->execute([$status]);
		    $news = $statement->fetchAll();
		    if ($statement->rowCount() > 0) {
		    	// code...
			    foreach ($news as $new) {
			    	$option = "<a href='javascript:;' class='btn btn-danger text-decoration-none' data-toggle='modal' data-target='#deleteModal" . $this->i . "'>Delete</a>";
			    	if ($status == 1) {
			    		// code...
			    		// $option = "<a href='javascript:;' class='btn btn-danger text-decoration-none' data-toggle='modal' data-target='#deleteModal" . $this->i . "'>Restore</a>";
			    		$option = '';
			    	}

	                $this->output .= "
	                	<tr>
	                		<td>" . $this->i . "</td>
		                    <td>" . $new['news_title'] . "</td>
		                    <td>" . ucwords($new['category']) . "</td>
		                    <td>" . $new['news_views'] . "</td>
		                    <td>" . pretty_date($new['createdAt']) . "</td>
		                    <td>" . ucwords($new['admin_fullname']) . "</td>
		                    <td>
		                    	<a class='badge badge-subtle badge-" . (($new['news_featured'] == 1) ? 'success' : 'dark') . " text-decoration-none' href='" . PROOT . 'admin/blog/add/featured/' . $new['news_id'] . '/' . (($new['news_featured'] == 0) ? 1 : 2) . "'>" . (($new['news_featured'] == 1) ? 'featured' : '+ featured') . "</a>
		                    </td>
		                    <td>
		                        <a class='btn btn-primary text-decoration-none' href='javascript:;' data-toggle='modal' data-target='#viewModal" . $this->i . "'>View</a>
		                        <a class='btn btn-secondary text-decoration-none' href='" . PROOT . "admin/blog/add/edit_news/" . $new['news_id'] . "'>Edit</a>
		                        ".$option."

		                        <!-- VIEW DETAILS MODAL -->
								<div class='modal fade' id='viewModal" . $this->i . "' tabindex='-1' aria-labelledby='viewModalLabel' aria-hidden='true' data-bs-backdrop='static' data-bs-keyboard='false'>
								  	<div class='modal-dialog modal-dialog-centered'>
								    	<div class='modal-content' style='background-color: rgb(51, 51, 51)'>
								    		<div class='modal-header'>
								    			<h1 class='modal-title fs-5' id='viewModalLabel'>" . $new['news_title'] . "</h1>
        										<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
								    		</div>
								    		<img class='img-fluid' src='" . PROOT . $new['news_media'] ."' />
								    		<div class='modal-body'>
								    			<span class='badge badge-subtle badge-info'>" . ucwords($new['category']) . "</span>
								    			<br>
								      			<p>" . nl2br($new['news_content']) . "</p>
								      			<br>
								      			<small class='text-secondary'>
								      				Created By; " . ucwords($new['admin_fullname']) . " <br>
								      				Add On; " . pretty_date($new['createdAt']) . " <br>
								      				Views; " . $new['news_views'] . " <br>
								      			</small>
								      			<br>
								        		<button type='button' class='btn btn-secondary rounded-0' data-dismiss='modal'>Close</button>
								        		<a href='javascript:;' data-bs-toggle='modal' data-target='#deleteModal" . $this->i . "' class='btn btn-outline-danger rounded-0'>Delete.</a>
								      		</div>
								    	</div>
								 	</div>
								</div>

								<!-- DELETE MODAL -->
								<div class='modal fade' id='deleteModal" . $this->i . "' tabindex='-1' aria-labelledby='newsModalLabel' aria-hidden='true'>
								  	<div class='modal-dialog modal-dialog-centered modal-sm'>
								    	<div class='modal-content' style='background-color: rgb(51, 51, 51)'>
								    		<div class='modal-body'>
								      			<p>When you delete this categoy, all news and details under it will be deleted as well.</p>
								        		<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
								        		<a href='" . PROOT . "admin/blog/add/delete/" . $new['news_id'] . "' class='btn btn-outline-secondary'>Confirm Delete.</a>
								      		</div>
								    	</div>
								 	</div>
								</div>
		                    </td>
		                </tr>
		             ";
	            	$this->i++;
			    }
		    } else {
		    	$this->output = "
		    		<tr>
		    			<td colspan='8'>No data found!</td>
		    		</tr>
		    	";
		    }
		    return $this->output;
		}

		public function deleteNewsMedia($conn, $id, $image) {
	        $mediaLocation = BASEURL . $image;
	        $delete = unlink($mediaLocation);
	        unset($image);

	        if ($delete) {
		        $update = "
		            UPDATE gmsa_news 
		            SET news_media = ? 
		            WHERE news_id = ?
		        ";
		        $statement = $conn->prepare($update);
		        $result = $statement->execute(['', $id]);
		        return $result;
		    } else {
		    	return false;
		    }
		}

		// get number of featured
		private function get_number_of_featured($conn) {
			$query = " 
				SELECT * FROM gmsa_news 
				WHERE news_featured = ? 
			";
			$statement = $conn->prepare($query);
			$statement->execute([1]);

			return $statement->rowCount();
		}

		// set featured or un featured
		public function featuredNews($conn, $feature, $id) {
			$featured = 0;
			if ($feature != 0) {
				$featured = $this->get_number_of_featured($conn);
			}
			$news = $this->findNews($conn, $id);
			if ($featured < 5) {
				if ($news > 0) {
					// code...
			        $query = "
			        	UPDATE gmsa_news 
			        	SET news_featured = ?
			        	WHERE news_id = ?
			        ";
			        $statement = $conn->prepare($query);
			        $result = $statement->execute([$feature, $id]);
			        return $result;
				} else {
					return false;
				}
			} else {
				return false;
			}
		}

		// delete news by setting status to 1
		public function deleteNews($conn, $id) {
	        $query = "
	        	UPDATE gmsa_news 
	        	SET status = ?
	        	WHERE news_id = ?
	        ";
	        $statement = $conn->prepare($query);
	        $result = $statement->execute([1, $id]);
	        return $result;
		}

		// fetch all news except featured
		public function fetchNews($conn, $offset, $per_page) {
			$today = date("d");
			$query = "
				SELECT *, gmsa_news.createdAt AS ca FROM gmsa_news 
				INNER JOIN gmsa_categories 
				ON gmsa_categories.id = gmsa_news.news_category
				WHERE gmsa_news.news_featured = ? 
				AND gmsa_news.status = ? 
				-- AND (gmsa_news.news_views > 1 AND DAY(gmsa_news.createdAt) = ?) 
				-- OR (gmsa_news.news_views <= 1 AND DAY(gmsa_news.createdAt) <= ?)
				ORDER BY gmsa_news.createdAt DESC 
				LIMIT {$offset}, {$per_page}
			";
			$statement = $conn->prepare($query);
			// $statement->execute([0, 0, $today, $today]);
			$statement->execute([0, 0]);
			$rows = $statement->fetchAll();

			foreach ($rows as $row) {

				$this->output .= '
					<div class="col-sm-6">
                        <div class="card">
                            <!-- Card img -->
                            <div class="position-relative">
                                <img class="card-img" src="' . PROOT . $row["news_media"]. '" alt="Card image" style="height: 280px; object-fit: cover">
                                <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                    <!-- Card overlay bottom -->
                                    <div class="w-100 mt-auto">
                                        <!-- Card category -->
                                        <a href="' . PROOT . 'category/' . $row["category_url"] . '" class="badge text-bg-danger mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>' . ucwords($row["category"]) . '</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-0 pt-3">
                                <h4 class="card-title"><a href="' . PROOT . 'view/' . $row["news_url"] . '" class="btn-link text-reset fw-bold">' . ucwords($row["news_title"]) . '</a></h4>
                                <p class="card-text">' . strip_tags(substr($row['news_content'], 0, 90)) . ' ...</p>
                                <!-- Card info -->
                                <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                    <li class="nav-item">
                                        <div class="nav-link">
                                            <div class="d-flex align-items-center position-relative">
                                                <div class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="dist/media/admin-male.svg" alt="avatar">
                                                </div>
                                                <span class="ms-3">by <a href="#" class="stretched-link text-reset btn-link">C.O</a></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">' . pretty_date_notime($row["ca"]) . '</li>
                                </ul>
                            </div>
                        </div>
                    </div>
				';
			}

			return $this->output;
		}

		// fetch all news except featured
		public function fetchRecentNews($conn) {
			$query = "
				SELECT *, gmsa_news.createdAt AS ca FROM gmsa_news 
				INNER JOIN gmsa_categories 
				ON gmsa_categories.id = gmsa_news.news_category
				WHERE gmsa_news.news_featured = ?
				AND gmsa_news.status = ? 
				ORDER BY gmsa_news.createdAt DESC 
				LIMIT 4
			";
			$statement = $conn->prepare($query);
			$statement->execute([0, 0]);
			$rows = $statement->fetchAll();

			foreach ($rows as $row) {

				$this->output_recent .= '
					<div class="card mb-3">
                        <div class="row g-3">
                            <div class="col-4">
                                <img class="rounded" src="' . PROOT . $row["news_media"]. '" alt="" style="width: 75px; height: 55px; object-fit: cover;">
                            </div>
                            <div class="col-8">
                                <h6><a href="' . PROOT . 'view/' . $row["news_url"] . '" class="btn-link stretched-link text-reset fw-bold">' . ucwords($row["news_title"]) . '</a></h6>
                                <div class="small mt-1">' . pretty_date_notime($row["ca"]) . '</div>
                            </div>
                        </div>
                    </div>
				';
			}

			return $this->output_recent;
		}
		
		// fetch the 2 featured news
		public function fetchFeaturedNews($conn) {
			$query = "
				SELECT *, gmsa_news.createdAt AS ca FROM gmsa_news 
				INNER JOIN gmsa_categories 
				ON gmsa_categories.id = gmsa_news.news_category
				WHERE gmsa_news.news_featured = ?
				AND gmsa_news.status = ? 
				ORDER BY gmsa_news.createdAt ASC 
				LIMIT 2
			";
			$statement = $conn->prepare($query);
			$statement->execute([1, 0]);
			$rows = $statement->fetchAll();

			foreach ($rows as $row) {
				$this->output_featured .= '
					<div class="col-md-6">
                        <div class="card card-overlay-bottom card-grid-sm card-bg-scale" style="background-image:url(' . PROOT . $row["news_media"]. '); background-position: center left; background-size: cover;">
                            <!-- Card Image overlay -->
                            <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4"> 
                                <div class="w-100 mt-auto">
                                    <!-- Card category -->
                                    <a href="' . PROOT . 'category/' . $row["category_url"] . '" class="badge text-bg-success mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>' . ucwords($row["category"]) . '</a>
                                    <!-- Card title -->
                                    <h4 class="text-white"><a href="' . PROOT . 'view/' . $row["news_url"] . '" class="btn-link stretched-link text-reset">' . ucwords($row["news_title"]) . '</a></h4>
                                    <!-- Card info -->
                                    <ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
                                        <li class="nav-item position-relative">
                                            <div class="nav-link">by <a href="#" class="stretched-link text-reset btn-link">C.O</a>
                                            </div>
                                        </li>
                                        <li class="nav-item">' . pretty_date_notime($row["ca"]) . '</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
				';
			}
			return $this->output_featured;
		}
		
		// fetch the random 1 news
		public function fetchOneRandomNews($conn) {
			$query = "
				SELECT *, gmsa_news.createdAt AS ca FROM gmsa_news 
				INNER JOIN gmsa_categories 
				ON gmsa_categories.id = gmsa_news.news_category
				WHERE gmsa_news.news_featured = ?
				AND gmsa_news.status = ? 
				ORDER BY RAND()
				LIMIT 1 
			";
			$statement = $conn->prepare($query);
			$statement->execute([1, 0]);
			$row = $statement->fetchAll();

			return '
				<div class="col-12 d-none d-lg-block">
                    <div class="card card-overlay-bottom card-grid-sm card-bg-scale" style="background-image:url(' . PROOT . $row[0]["news_media"] . '); background-position: center left; background-size: cover;">
                        <!-- Card Image -->
                        <!-- Card Image overlay -->
                        <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4"> 
                            <div class="w-100 mt-auto">
                                <!-- Card category -->
                                <a href="' . PROOT . 'category/' . $row[0]["category_url"] . '" class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>' . ucwords($row[0]["category"]) . '</a>
                                <!-- Card title -->
                                <h4 class="text-white"><a href="' . PROOT . 'view/' . $row[0]["news_url"] . '" class="btn-link stretched-link text-reset">' . ucwords($row[0]["news_title"]) . '</a></h4>
                                <!-- Card info -->
                                <ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
                                    <li class="nav-item position-relative">
                                        <div class="nav-link">by <a href="#" class="stretched-link text-reset btn-link">C.O</a>
                                        </div>
                                    </li>
                                    <li class="nav-item">' . pretty_date_notime($row[0]["ca"]) . '</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
			';
		}

		// get main or one feature post for the news
		public function fetch_oneFeaturedNews($conn) {
			$query = "
				SELECT *, gmsa_news.createdAt AS ca FROM gmsa_news 
				INNER JOIN gmsa_categories 
				ON gmsa_categories.id = gmsa_news.news_category
				WHERE gmsa_news.news_featured = ?
				AND gmsa_news.status = ? 
				ORDER BY gmsa_news.createdAt DESC 
				LIMIT 1
			";
			$statement = $conn->prepare($query);
			$statement->execute([1, 0]);
			$rows = $statement->fetchAll();

			foreach ($rows as $row) {
				$this->output_onefeatured .= '
					<div class="col-lg-6">
		                <div class="card card-overlay-bottom card-grid-lg card-bg-scale" style="background-image:url(' . PROOT . $row["news_media"] . '); background-position: center left; background-size: cover;">
		                    <!-- Card featured -->
		                    <span class="card-featured" title="Featured post"><i class="fas fa-star"></i></span>
		                    <!-- Card Image overlay -->
		                    <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4"> 
		                        <div class="w-100 mt-auto">
		                            <!-- Card category -->
		                            <a href="' . PROOT . 'category/' . $row["category_url"] . '" class="badge text-bg-danger mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>' . ucwords($row["category"]) . '</a>
		                            <!-- Card title -->
		                            <h2 class="text-white h1"><a href="' . PROOT . 'view/' . $row["news_url"] . '" class="btn-link stretched-link text-reset">' . ucwords($row["news_title"]) . '</a></h2>
		                            <p class="text-white">' . strip_tags(substr($row['news_content'], 0, 130)) . ' ...</p>
		                            <!-- Card info -->
		                            <ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
		                                <li class="nav-item">
		                                    <div class="nav-link">
		                                        <div class="d-flex align-items-center text-white position-relative">
		                                            <div class="avatar avatar-sm">
		                                                <img class="avatar-img rounded-circle" src="dist/media/admin-male.svg" alt="avatar">
		                                            </div>
		                                            <span class="ms-3">by <a href="#" class="stretched-link text-reset btn-link">C.O</a></span>
		                                        </div>
		                                    </div>
		                                </li>
		                                <li class="nav-item">' . pretty_date_notime($row["ca"]) . '</li>
		                                <li class="nav-item">5 min read</li>
		                            </ul>
		                        </div>
		                    </div>
		                </div>
		            </div>
				';
			}
			return $this->output_onefeatured;
		}

		// single view for news
		public function singleView($conn, $newsUrl) {
			$query = "
				SELECT *, gmsa_news.id AS news_id, gmsa_news.createdAt AS ca FROM gmsa_news 
				INNER JOIN gmsa_categories 
				ON gmsa_categories.category_id = gmsa_news.news_category 
				INNER JOIN gmsa_admin 
				ON gmsa_admin.admin_id = gmsa_news.news_created_by 
				WHERE gmsa_news.news_url = ?
				AND gmsa_news.status = ? 
				LIMIT 1
			";
			$statement = $conn->prepare($query);
			$statement->execute([$newsUrl, 0]);
			$row = $statement->fetchAll();
			if ($statement->rowCount() > 0) {
				return '
				    <section class="pt-lg-8">
		                <div class="container pt-4 pt-lg-0">
		                    <div class="row g-4 g-sm-7">
		                        <div class="col-lg-8">
		                            <div class="d-flex position-relative z-index-9">
		                                <nav aria-label="breadcrumb">
		                                    <ol class="breadcrumb breadcrumb-dots mb-1">
		                                        <li class="breadcrumb-item"><a href="'.PROOT.'">Home</a></li>
		                                        <li class="breadcrumb-item"><a href="'.PROOT.'news">Blog</a></li>
		                                        <li class="breadcrumb-item active" aria-current="page">GMSA news</li>
		                                    </ol>
		                                </nav>
		                            </div>
		                            <h1 class="h2 mb-0">' . $row[0]['news_title'] . '</h1>
		                            <div class="d-flex align-items-center flex-wrap mt-4">
		                                <a href="#" class="badge text-bg-dark mb-0">Lifestyle</a>
		                                <span class="text-secondary opacity-3 mx-3">|</span>
		                                <a href="#" class="text-secondary text-primary-hover mb-0"><i class="bi bi-eye me-2"></i>' . $row[0]["news_views"] . ' view' . (($row[0]["news_views"] > 1) ? 's' : '') . '</a>
		                                <span class="text-secondary opacity-3 mx-3">|</span>
		                                <span class="text-secondary">' . pretty_date_notime($row[0]['ca']) . '</span>
		                            </div>
		                            <img src="'.PROOT . $row[0]['news_media'].'" class="img-fluid rounded mt-5" alt="blog-img">

		                            <p class="mt-5">'.$row[0]["news_content"].'</p>
		                        </div>
		                        <div class="col-lg-4 ps-xl-6">
		                            <div class="align-items-center mt-5">
		                                <h6 class="mb-3 d-inline-block">Related post:</h6>

		                                <ul class="list-group list-group-flush">
		                                    <li class="list-group-item ps-0"><a href="#" class="heading-color text-primary-hover fw-semibold">5 investment doubts you should clarify</a></li>
		                                    <li class="list-group-item ps-0"><a href="#" class="heading-color text-primary-hover fw-semibold">Mastering Responsive Web Design with Bootstrap</a></li>
		                                    <li class="list-group-item ps-0"><a href="#" class="heading-color text-primary-hover fw-semibold">Effortless Web Development with Mizzle</a></li>
		                                    <li class="list-group-item ps-0"><a href="#" class="heading-color text-primary-hover fw-semibold">Sleek and Responsive - Designing with Bootstrap and Mizzle</a></li>
		                                    <li class="list-group-item ps-0"><a href="#" class="heading-color text-primary-hover fw-semibold">Ten questions you should answer truthfully.</a></li>
		                                </ul>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </section>
				';
			} else {
				return false;
			}
		}

		//
		public function updateViews($conn, $newsUrl) {
			$query = "
	        	UPDATE gmsa_news 
	        	SET news_views = news_views + 1
	        	WHERE news_url = ?
	        ";
	        $statement = $conn->prepare($query);
	        $statement->execute([$newsUrl]);
		}


		// popular post
		public function get_popular_post($conn) {}

		// News subscriber
		public function addSubscriber($conn, $email) {
			// check if email already exist
			$sql = "
				SELECT * FROM tein_subscribers 
				WHERE subscriber_email = ? 
			";
			$statement = $conn->prepare($sql);
			$statement->execute([$email]);

			if ($statement->rowCount() > 0) {
				return 'This email has already been used to subscribed.';
			} else {
				$query = "
					INSERT INTO tein_subscribers (subscriber_email) 
					VALUES (?)
				";
				$statement = $conn->prepare($query);
				$result = $statement->execute([$email]);
				if (isset($result)) {
					return 'You have successfully subscribed for daily news update.';
				} else {
					return false;
				}
			}
		}

		// all subscribers
		public function allSubscribers($conn) {
			$query = "
				SELECT * FROM tein_subscribers 
				ORDER BY id DESC
			";
			$statement = $conn->prepare($query);
			$statement->execute();
			$rows = $statement->fetchAll();
			$count = $statement->rowCount();

			if ($count > 0) {
				foreach ($rows as $row) {
					$this->output_subscribers .= '
						<tr>
							<td>' . $this->i . '</td>
							<td>' . $row['subscriber_email'] . '</td>
							<td>' . pretty_date_notime($row['createdAt']) . '</td>
							<td>
								<a href="javascript:;" class="badge bg-danger text-decoration-none" data-bs-toggle="modal" data-bs-target="#deleteSubscriberModal' . $this->i . '">Delete</a>
								<!-- DELETE MODAL -->
								<div class="modal fade" id="deleteSubscriberModal' . $this->i . '" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
								  	<div class="modal-dialog modal-dialog-centered modal-sm">
								    	<div class="modal-content" style="background-color: rgb(51, 51, 51);"">
								    		<div class="modal-body">
								      			<p>When you delete this subscriber, this subscriber will no longer be able to receive daily updates on news.</p>
								        		<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
								        		<a href=' . PROOT . "admin/blog/subscribers/delete_subscriber/" . $row['id'] . ' class="btn btn-sm btn-outline-secondary">Confirm Delete.</a>
								      		</div>
								    	</div>
								 	</div>
								</div>
							</td>
						</tr>
					';
					$this->i++;
				}
			} else {
				$this->output_subscribers .= '
					<tr>
						<td colspan="4">No data found</td>
					</tr>
				';
			}

			return $this->output_subscribers;
		}

		public function deleteSubscriber($conn, $id) {
			$query = "
				DELETE FROM tein_subscribers 
				WHERE id = ? 
			";
			$statement = $conn->prepare($query);
			$result = $statement->execute([$id]);

			if ($result) {
				// code...
				return true;
			} else {
				return false;
			}
		}

		// fetch popular news
		public function popularNews($conn) {
			$thisMonth = date('m');
			$query = "
				SELECT *, gmsa_news.id AS news_id, gmsa_news.createdAt AS ca FROM gmsa_news 
				INNER JOIN gmsa_categories 
				ON gmsa_categories.id = gmsa_news.news_category
				WHERE gmsa_news.status = ? 
				AND gmsa_news.news_views > ? 
				AND MONTH(gmsa_news.createdAt) = ?
				ORDER BY gmsa_news.news_views DESC
			";
			$statement = $conn->prepare($query);
			$statement->execute([0, 10, $thisMonth]);
			$rows = $statement->fetchAll();
			if ($statement->rowCount() > 0) {
				// code...
				foreach ($rows as $row) {
					// code...
					$this->output_poupular .= '
						<div class="card">
                            <!-- Card img -->
                            <div class="position-relative">
                                <img class="card-img" src="' . PROOT . $row["news_media"]. '" alt="Card image">
                                <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                    <!-- Card overlay bottom -->
                                    <div class="w-100 mt-auto">
                                        <a href="' . PROOT . 'category/' . $row["category_url"] . '" class="badge text-bg-secondary mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>' . ucwords($row["category"]) . '</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-0 pt-3">
                                <h5 class="card-title"><a href="' . PROOT . 'view/' . $row["news_url"] . '" class="btn-link text-reset fw-bold">' . ucwords($row["news_title"]) . '</a></h5>
                                <!-- Card info -->
                                <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                    <li class="nav-item">
                                        <div class="nav-link">
                                            <div class="d-flex align-items-center position-relative">
                                                <div class="avatar avatar-xs">
                                                    <img class="avatar-img rounded-circle" src="dist/media/admin-male.svg" alt="avatar">
                                                </div>
                                                <span class="ms-3">by <a href="#" class="stretched-link text-reset btn-link">C.O</a></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">' . pretty_date_notime($row["ca"]) . '</li>
                                </ul>
                            </div>
                        </div>
					';
				}
			} else {
				// return 'asem';
			}
			return $this->output_poupular;
		}

		// fetch popular news
		public function trendingNews($conn) {
			$thisMonth = date('m');
			$query = "
				SELECT * FROM gmsa_news 
				WHERE news_views > ? 
				AND MONTH(createdAt) = ? 
				ORDER BY news_views DESC
				LIMIT 4 
			";
			$statement = $conn->prepare($query);
			$statement->execute([10, $thisMonth]);
			$rows = $statement->fetchAll();
			if ($statement->rowCount() > 0) {
				foreach ($rows as $row) {
					// code...
					$this->output_trending .= '
						<div> <a href="' . PROOT . 'view/' . $row["news_url"] . '" class="text-reset btn-link">' . ucwords($row["news_title"]) . '</a></div>
					';
				}
			} else {
				$this->output_trending .= '
						<div> <a href="' . PROOT . 'get-membership-card" class="text-reset btn-link">Register TEIN membership card</a></div>
						<div> <a href="' . PROOT . 'pay.dues" class="text-reset btn-link">Pay TEIN membership dues</a></div>
					';
			}
			return $this->output_trending;
		}

		// fetch popular news
		public function recentFooterNews($conn) {
			$query = "
				SELECT *, gmsa_news.id AS news_id, gmsa_news.createdAt AS ca FROM gmsa_news 
				INNER JOIN gmsa_categories 
				ON gmsa_categories.id = gmsa_news.news_category
				WHERE gmsa_news.status = ? 
				ORDER BY gmsa_news.id DESC 
				LIMIT 2
			";
			$statement = $conn->prepare($query);
			$statement->execute([0]);
			$rows = $statement->fetchAll();
			if ($statement->rowCount() > 0) {
				foreach ($rows as $row) {
					// code...
					$this->output_footer .= '
					<div class="mb-4 position-relative">
		                    <div><a href="' . PROOT . 'category/' . $row["category_url"] . '" class="badge text-bg-danger mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>' . ucwords($row["category"]) . '</a></div>
		                    <a href="' . PROOT . 'view/' . $row["news_url"] . '" class="btn-link text-white fw-normal">' . ucwords($row["news_title"]) . '</a>
		                    <ul class="nav nav-divider align-items-center small mt-2 text-muted">
		                        <li class="nav-item position-relative">
		                            <div class="nav-link">by <a href="#" class="stretched-link text-reset btn-link">C.O</a>
		                            </div>
		                        </li>
		                        <li class="nav-item">' . pretty_date_notime($row["ca"]) . '</li>
		                    </ul>
		                </div>
					';
				}
			} else {;
			}
			return $this->output_footer;
		}


	}


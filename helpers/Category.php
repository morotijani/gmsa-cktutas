<?php 

	class Category {
		private $i = 1;
		private $output = '';
		
		public function listCategory($conn) {
			$query = "
				SELECT * FROM gmsa_categories 
				WHERE status = ? 
				ORDER BY category
			";
			$statement = $conn->prepare($query);
			$statement->execute([0]);
			return $statement->fetchAll();
		}

		public function listCategoryWithLimit($conn) {
			$query = "
				SELECT * FROM gmsa_categories 
				WHERE status = ? 
				ORDER BY category 
				LIMIT 4
			";
			$statement = $conn->prepare($query);
			$statement->execute([0]);
			return $statement->fetchAll();
		}

		public function allCategory($conn) {
			$query = "
		        SELECT * FROM gmsa_categories 
		        ORDER BY category ASC 
		    ";
		    $statement = $conn->prepare($query);
		    $statement->execute();
		    $categories = $statement->fetchAll();
		    if ($statement->rowCount() > 0) {
		    	// code...
			    foreach ($categories as $category) {
	                $this->output .= "
	                	<tr>
		                    <td>
		                        <a class='btn btn-secondary text-decoration-none' href='" . PROOT . "admin/blog/category/edit_category/" . $category['category_id'] . "'>Edit</a>
		                    </td>
		                    <td>" . ucwords($category['category']) . "</td>
		                    <td>" . pretty_date($category['createdAt']) . "</td>
		                    <td>
		                        <a href='javascript:;' class='btn btn-danger text-decoration-none' data-toggle='modal' data-target='#deleteModal" . $this->i . "'>Delete</a>

								<div class='modal fade' id='deleteModal" . $this->i . "' tabindex='-1' aria-labelledby='subscribeModalLabel' aria-hidden='true'>
								  	<div class='modal-dialog modal-dialog-centered modal-sm'>
								    	<div class='modal-content'>
								    		<div class='modal-body'>
								      			<p>When you delete this categoy, all news and details under it will be deleted as well.</p>
								        		<button type='button' class='btn' data-dismiss='modal'>Close</button>
								        		<a href='" . PROOT . "admin/blog/category/delete/" . $category['category_id'] . "' class='btn btn-secondary'>Confirm Delete.</a>
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
		    			<td colspan='4'>No data found!</td>
		    		</tr>
		    	";
		    }
		    return $this->output;
		}

		public function deleteCategory($conn, $id) {
	        $query = "
	        	DELETE FROM gmsa_categories 
	        	WHERE category_id = ?
	        ";
	        $statement = $conn->prepare($query);
	        $result = $statement->execute([$id]);
	        return $result;
		}


		// fetch all news base on category
		public function fetchCategoryNews($conn, $url) {
			$query = "
				SELECT *, gmsa_news.createdAt AS ca FROM gmsa_categories 
				INNER JOIN gmsa_news 
				ON gmsa_news.news_category = gmsa_categories.category_id 
				INNER JOIN gmsa_admin 
				ON gmsa_admin.admin_id = gmsa_news.news_created_by
				WHERE gmsa_categories.category_url = ? 
				AND gmsa_news.status = ? 
				ORDER BY gmsa_news.createdAt DESC
			";
			$statement = $conn->prepare($query);
			$statement->execute([$url, 0]);
			$rows = $statement->fetchAll();

			if ($statement->rowCount() > 0) {
				foreach ($rows as $row) {
					$this->output .= '
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
				return false;
			}
			return $this->output;
		}
	}


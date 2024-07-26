<?php 


class AllFunctions {
	private $front = 'GMSA-';
	
	public function generate_identity_number($id) {
		$thisYr = date("y");
		$thisYr = substr($thisYr, -2);
		$output = $this->front . $thisYr . '-';
		$output = $output . str_pad($id, 5, "0", STR_PAD_LEFT);
		return $output;
	}
}

// add to logs
function add_to_log($message, $log_from) {
	global $conn;

	$log_id = guidv4();
	$createdAt = date("Y-m-d H:i:s A");
	$sql = "
		INSERT INTO `gmsa_logs`(`log_id`, `log_message`, `log_from`, `createdAt`) 
		VALUES (?, ?, ?, ?)
	";
	$statement = $conn->prepare($sql);
	$result = $statement->execute([$log_id, $message, $log_from, $createdAt]);

	return false;
	if ($result) {
		return true;
	}
}


// find student by student id
function find_by_student_id($student_id) {
	global $conn;

	$query = "
		SELECT * FROM gmsa_members 
		WHERE gmsa_members.member_studentid = ? 
	";
	$statement = $conn->prepare($query);
	$statement->execute([$student_id]);
	$count_rows = $statement->rowCount();

	$row = $statement->fetchAll();
	return (($count_rows > 0) ? $row[0] : '');
}

// find student by email
function find_by_student_email($email) {
	global $conn;

	$query = "
		SELECT * FROM gmsa_members 
		WHERE gmsa_members.member_email = ? 
	";
	$statement = $conn->prepare($query);
	$statement->execute([$email]);
	$count_rows = $statement->rowCount();

	$row = $statement->fetchAll();
	return (($count_rows > 0) ? $row[0] : '');
}

// find member by member_id
function find_by_member_id($member_id) {
	global $conn;

	$query = "
		SELECT * FROM gmsa_members 
		WHERE gmsa_members.member_id = ? 
		LIMIT 1
	";
	$statement = $conn->prepare($query);
	$statement->execute([$member_id]);
	$count_rows = $statement->rowCount();

	$row = $statement->fetchAll();
	return (($count_rows > 0) ? $row[0] : '');
}


// find prayer by id
function find_prayer_by_id($id) {
	global $conn;

	$query = "
		SELECT * FROM gmsa_prayer_time 
		WHERE gmsa_prayer_time.prayer_id = ? 
	";
	$statement = $conn->prepare($query);
	$statement->execute([$id]);
	$count_rows = $statement->rowCount();

	$row = $statement->fetchAll();
	return (($count_rows > 0) ? $row[0] : '');
}

// find contact by id
function find_contact_by_id($id) {
	global $conn;

	$query = "
		SELECT * FROM gmsa_contacts 
		WHERE gmsa_contacts.message_id = ? 
	";
	$statement = $conn->prepare($query);
	$statement->execute([$id]);
	$count_rows = $statement->rowCount();

	$row = $statement->fetchAll();
	return (($count_rows > 0) ? $row[0] : '');
}

// find subscriber by id
function find_subscriber_by_id($id) {
	global $conn;

	$query = "
		SELECT * FROM gmsa_subscribers 
		WHERE gmsa_subscribers.subscriber_id = ? 
	";
	$statement = $conn->prepare($query);
	$statement->execute([$id]);
	$count_rows = $statement->rowCount();

	$row = $statement->fetchAll();
	return (($count_rows > 0) ? $row[0] : '');
}


// find activity by id
function find_activity_by_id($id) {
	global $conn;

	$query = "
		SELECT * FROM gmsa_activities 
		WHERE gmsa_activities.activity_id = ? 
	";
	$statement = $conn->prepare($query);
	$statement->execute([$id]);
	$count_rows = $statement->rowCount();

	$row = $statement->fetchAll();
	return (($count_rows > 0) ? $row[0] : '');
}


// find member by student id
function find_member_by_studentID($conn, $studentid) {

	$query = "
		SELECT * FROM gmsa_members 
		WHERE gmsa_members.member_studentid = ? 
	";
	$statement = $conn->prepare($query);
	$statement->execute([$studentid]);
	$count_rows = $statement->rowCount();

	$row = $statement->fetchAll();
	return (($count_rows > 0) ? $row[0] : '');
}

// find member by student id
function find_member_by_id($conn, $studentid) {

	$query = "
		SELECT * FROM gmsa_members 
		WHERE gmsa_members.member_id = ? 
	";
	$statement = $conn->prepare($query);
	$statement->execute([$studentid]);
	$count_rows = $statement->rowCount();

	$row = $statement->fetchAll();
	return (($count_rows > 0) ? $row[0] : '');
}


// find member by student id
function find_paid_dues_by_reference($conn, $reference) {

	$query = "
		SELECT * FROM gmsa_dues 
		WHERE gmsa_dues.transaction_reference = ? 
	";
	$statement = $conn->prepare($query);
	$statement->execute([$reference]);
	$count_rows = $statement->rowCount();

	$row = $statement->fetchAll();
	return (($count_rows > 0) ? $row[0] : '');
}

// get amount to pay using level
function get_amount_to_pay_using_level($conn, $studentid, $level) {
	global $site_row;

	$query = "
		SELECT * FROM gmsa_dues 
		WHERE gmsa_dues.student_id = ? 
		ORDER BY gmsa_dues.id DESC 
		LIMIT 1
	";
	$statement = $conn->prepare($query);
	$statement->execute([$studentid]);
	$count_rows = $statement->rowCount();
	$row = $statement->fetchAll();

	$levelAmount = 0;
	// $level = 100;
	if ($count_rows > 0) {
		// code...
		if ($row[0]['level'] == 100) {
			$amount = $conn->query("SELECT SUM(transaction_amount) as amt FROM gmsa_dues WHERE level = 100 AND student_id = '$studentid'")->fetchAll();
			if ($amount[0]['amt'] >= $site_row['dues_for_fresher']) {
				$levelAmount = $site_row['dues_for_continue'];
				$level = 200;
			} else {
				$level = 100;
				if ($amount[0]['amt'] == 0.00) {
					// code...
					$levelAmount = $site_row['dues_for_fresher'];
				} else {
					$levelAmount = $site_row['dues_for_fresher'] - $amount[0]['amt'];
				}
			}
		}

		if ($row[0]['level'] == 200) {
			$amount = $conn->query("SELECT SUM(transaction_amount) as amt FROM gmsa_dues WHERE level = 200 AND student_id = '$studentid'")->fetchAll();
			if ($amount[0]['amt'] >= $site_row['dues_for_continue']) {
				$levelAmount = $site_row['dues_for_continue'];
				$level = 300;
			} else {
				$level = 200;
				if ($amount[0]['amt'] == 0.00) {
					// code...
					$levelAmount = $site_row['dues_for_continue'];
				} else {
					$levelAmount = $site_row['dues_for_continue'] - $amount[0]['amt'];
				}
			}
		}

		if ($row[0]['level'] == 300) {
			$amount = $conn->query("SELECT SUM(transaction_amount) as amt FROM gmsa_dues WHERE level = 300 AND student_id = '$studentid'")->fetchAll();
			if ($amount[0]['amt'] >= $site_row['dues_for_continue']) {
				$levelAmount = $site_row['dues_for_continue'];
				$level = 400;
			} else {
				$level = 300;
				if ($amount[0]['amt'] == 0.00) {
					// code...
					$levelAmount = $site_row['dues_for_continue'];
				} else {
					$levelAmount = $site_row['dues_for_continue'] - $amount[0]['amt'];
				}
			}
		}

		if ($row[0]['level'] == 400) { 
			$level = 400;
			$amount = $conn->query("SELECT SUM(transaction_amount) as amt FROM gmsa_dues WHERE level = 400 AND student_id = '$studentid'")->fetchAll();
			if ($amount[0]['amt'] < $site_row['dues_for_continue']) {
				$levelAmount = $site_row['dues_for_continue'] - $amount[0]['amt'];
			} else {
				$levelAmount = 'Done paying.';
			}
		}
	} else {
		if ($level == 100) {
            // code...
            $levelAmount = $site_row['dues_for_fresher'];
        } else {
            $levelAmount = $site_row['dues_for_continue'];
        }
	}

	return ['level' => $level, 'levelAmount' => $levelAmount];
}

// count members by status
function count_members($conn, $status) {

	$query = "
		SELECT * FROM gmsa_members 
		WHERE gmsa_members.status = ? 
	";
	$statement = $conn->prepare($query);
	$statement->execute([$status]);
	return $statement->rowCount();
}

// count news by status
function count_news($conn, $status) {
	
	$query = "
		SELECT * FROM gmsa_news 
		WHERE gmsa_news.status = ? 
	";
	$statement = $conn->prepare($query);
	$statement->execute([$status]);
	return $statement->rowCount();
}

// count activities by status
function count_activities($conn, $status) {
	
	$query = "
		SELECT * FROM gmsa_activities 
		WHERE gmsa_activities.status = ? 
	";
	$statement = $conn->prepare($query);
	$statement->execute([$status]);
	return $statement->rowCount();
}

// count activities by status
function total_dues_this_year($conn) {
	$thisYear = date('Y');
	$query = "
		SELECT SUM(transaction_amount) AS amt FROM gmsa_dues 
        WHERE YEAR(createdAt) = ? 
	";
	$statement = $conn->prepare($query);
	$statement->execute([$thisYear]);
	$row = $statement->fetchAll();

	return (($statement->rowCount() > 0) ?  money($row[0]['amt']) : '');
}

// fetch featured news with limit
function fetch_featured_news($conn, $limit, $featured) {
	$query = "
		SELECT *, gmsa_news.createdAt AS bca FROM gmsa_news 
		INNER JOIN gmsa_categories
		ON gmsa_categories.category_id = gmsa_news.news_category 
		INNER JOIN gmsa_admin 
		ON gmsa_admin.admin_id = gmsa_news.news_created_by
		WHERE news_featured = ? 
		AND gmsa_news.status = ? 
		ORDER BY news_views DESC
		LIMIT $limit
	";
	$statement = $conn->prepare($query);
	$statement->execute([$featured, 0]);
	$count_rows = $statement->rowCount();

	$row = $statement->fetchAll();
	return (($count_rows > 0) ? $row : '');
}

// count activities by status
function get_category_for_user_view($conn) {
	$query = "
		SELECT * FROM gmsa_categories  
        WHERE status = ? 
	";
	$statement = $conn->prepare($query);
	$statement->execute([0]);
	$row = $statement->fetchAll();

	return (($statement->rowCount() > 0) ?  $row : '');
}

function fetch_activities($conn, $limit) {

	$sql = "
        SELECT * FROM gmsa_activities 
        WHERE gmsa_activities.status = ? 
        ORDER BY gmsa_activities.activity_date ASC
    ";
    if ($limit != '') {
    	$sql .= "LIMIT $limit";
    }
    $statement = $conn->prepare($sql);
    $statement->execute([0]);
    $rows = $statement->fetchAll();

    return (($statement->rowCount() > 0) ?  $rows : '');
}

// fetch all prayer times
function get_prayer_time($conn) {
	$sql = "
        SELECT * FROM gmsa_prayer_time 
    ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $rows = $statement->fetchAll();

    return (($statement->rowCount() > 0) ?  $rows : '');
}

// get all position
function get_positions($conn) {
	$sql = "
        SELECT * FROM gmsa_positions 
        WHERE status = 0 
    ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $rows = $statement->fetchAll();

    return (($statement->rowCount() > 0) ?  $rows : '');
}

// find executive by member id
function find_executive_by_member_id($conn, $member_id) {
	$sql = "
        SELECT * FROM gmsa_executives 
        WHERE member_id = ?
    ";
    $statement = $conn->prepare($sql);
    $statement->execute([$member_id]);
    $rows = $statement->fetchAll();

    return (($statement->rowCount() > 0) ?  $rows : '');
}


// find executive by member id
function fetch_all_executives($conn, $limit) {
	$sql = "
        SELECT * FROM gmsa_executives 
        INNER JOIN gmsa_positions 
        ON gmsa_positions.position_id = gmsa_executives.position_id 
        INNER JOIN gmsa_members 
        ON gmsa_members.member_id = gmsa_executives.member_id 
        WHERE gmsa_executives.status = ?
    ";
    if ($limit != 'all') {
    	$sql .= " LIMIT $limit";
    }
    $statement = $conn->prepare($sql);
    $statement->execute([0]);
    $rows = $statement->fetchAll();

    return (($statement->rowCount() > 0) ?  $rows : '');
}

// find donation with reference
function find_donation_details_with_refence($conn, $reference) {
	$sql = "
		SELECT * FROM gmsa_donations 
		WHERE reference = ?
	";
	$statement = $conn->prepare($sql);
	$statement->execute([$reference]);
	$rows = $statement->fetchAll();

	return (($statement->rowCount() > 0) ?  $rows : '');
}

// find donation with reference
function find_admin_by_admin_id($conn, $id) {
	$sql = "
		SELECT * FROM gmsa_admin 
		WHERE admin_id = ?
	";
	$statement = $conn->prepare($sql);
	$statement->execute([$id]);
	$rows = $statement->fetchAll();

	return (($statement->rowCount() > 0) ?  $rows : '');
}

// find donation with reference
function provide_admin_title($permission) {
	global $admin_data;

	// 
	$title = '';
	if ($permission == 'admin,patron,finance,editor') {
		$title = 'Patron';
	} elseif ($permission == 'admin,finance,editor') {
		// code...
		$title = 'Super Admin';
	} elseif ($permission == 'finance') {
		$title = 'Finance';
		// code...
	} elseif ($permission == 'editor') {
		// code...
		$title = 'Editor';
	}
	return strtoupper($title);
}


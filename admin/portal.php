<?php
 	session_start();
 	date_default_timezone_set("Asia/Bangkok");

	// loginAdmin
	if(isset($_GET['loginAdmin'])) {
		$adminUserName = $_POST['username'];
		$adminPassword = $_POST['password'];

		include_once('../db_connect.php');

		$sqlSelect = "SELECT 1 FROM admin_info WHERE user_name = ? AND password = ?";
		$stmt = $conn->prepare($sqlSelect);
		$stmt->bind_param("ss", $adminUserName, $adminPassword);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows > 0) {
		    if($row = $result->fetch_assoc()) {
		    	$_SESSION['bacara_logined_admin'] = array(
		    		'user_name' => $adminUserName
		    	);
		    	echo 1;
		    }
		}
		$stmt->close();
		$conn->close();

	// updateCredit
	} else if(isset($_GET['updateCredit'])) {
		$selectedUserId = $_POST['userId'];
		$credit = $_POST['credit'];

		include_once('../db_connect.php');

		$sqlSelect = "SELECT 1 FROM user_credit WHERE user_id = ? ";
		$stmt = $conn->prepare($sqlSelect);
		$stmt->bind_param("s", $selectedUserId);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows > 0) {
		    if($row = $result->fetch_assoc()) {
				$sqlUpdate = "UPDATE user_credit SET credit = ?, update_date = ? WHERE user_id = ?";
				$stmt2 = $conn->prepare($sqlUpdate);
				$now = date("Y-m-d H:i:s");
				$stmt2->bind_param("iss", $credit, $now, $selectedUserId);
				$stmt2->execute();
		    	echo $stmt2->affected_rows;
				$stmt2->close();
		    }
		} else {
				$sqlInsert = "INSERT user_credit ";
			    $sqlInsert .= "(user_id, credit, update_date) ";
			    $sqlInsert .= "VALUES(?,?,?)";
		        $stmt2 = $conn->prepare($sqlInsert);
		        $now = date("Y-m-d H:i:s");
				$stmt2->bind_param("sis", $selectedUserId, $credit, $now);
				$stmt2->execute();
				echo $stmt2->affected_rows;
				$stmt2->close();
		}

		$stmt->close();
		$conn->close();

	// changePassword
	} else if(isset($_GET['changePassword'])) {
		$currentPassword = $_POST['currentPassword'];
		$newPassword = $_POST['newPassword'];
		$confirmPassword = $_POST['confirmPassword'];

		if ($newPassword != $confirmPassword) {
			echo "New Password ไม่ตรงกับ Confirm Password";
		} else if(isset($_SESSION['bacara_logined_admin'])) { 
			$loginedAdmin = $_SESSION['bacara_logined_admin'];
			$adminUserName = $loginedAdmin['user_name'];

			include_once('../db_connect.php');

			$sqlSelect = "SELECT password FROM admin_info WHERE user_name = ?";
			$stmt = $conn->prepare($sqlSelect);
			$stmt->bind_param("s", $adminUserName);
			$stmt->execute();
			$result = $stmt->get_result();
			if ($result->num_rows > 0) {
			    if($row = $result->fetch_assoc()) {
			    	$adminPassword = $row['password'];

			    	if ($currentPassword != $adminPassword) {
			    		echo "Password ไม่ตรงกับ Password เดิม";
			    	} else {
			    		$sqlUpdate = "UPDATE admin_info SET password = ? WHERE user_name = ?";
						$stmt2 = $conn->prepare($sqlUpdate);
						$stmt2->bind_param("ss", $newPassword, $adminUserName);
						$stmt2->execute();
						echo 1;
						$stmt2->close();
			    	}
			    }
			}

			$stmt->close();
			$conn->close();
		}
	}
?>
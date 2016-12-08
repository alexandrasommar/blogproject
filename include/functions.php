<?php
function selectMonth () {
	global $conn;
	$query = "SELECT YEAR(post_date) AS YEAR, MONTH(post_date) AS MONTH, COUNT(*) AS TOTAL FROM posts WHERE post_status = 1 GROUP BY YEAR, MONTH DESC";

	if ($result = mysqli_query($conn, $query)) {
	while ($row = mysqli_fetch_assoc($result)) {
	        $year = $row['YEAR'];
	        $monthNum = $row['MONTH'];
	        $monthName = strftime('%B', mktime(0, 0, 0, $monthNum, 10, $year));
	        $numposts = $row['TOTAL'];
	        echo "<option value='$monthNum'>$monthName ($numposts)</option>";
	    }
	   }

	}

function showMonths () {
	global $conn;
	if(isset($_POST['submit'])) {
	if(!empty($_POST['submit'])) {
	$month = $_POST['choose_month'];
	$query = "SELECT posts.*, categories.* FROM posts LEFT JOIN categories ON posts.post_category_id = categories.cat_id WHERE SUBSTRING(post_date,6,7) = {$month} AND posts.post_status = 1 ORDER BY posts.post_date DESC";
	$stmt = $conn->stmt_init();
	if($stmt->prepare($query)) {
	$stmt->execute();
	$stmt->bind_result($post_id, $category_id, $post_title, $post_author, $post_author_id, $post_date, $post_image, $post_content, $post_status, $cat_id, $cat_name);
	$month = strftime('%B', mktime(0, 0, 0, $month, 10));
	echo "<h2>" . $month . "</h2>";
	while(mysqli_stmt_fetch($stmt)) {
			echo "<ul>";
			echo "<li>" . $post_date . "<br>";
			echo "<a href='post.php?post=$post_id'><h3>" . $post_title . "</a></h3>";
			echo substr($post_content, 0, 40) . "<br>";
			echo $post_author . "<br></li>";
			echo "</ul>";
			}
		} 
 	}else { 
		echo "query failed"; 
	}

	}
}
?>
<?php

/*
* The function counts how many posts there are per month.
* The query checks the month and the year based on post_date 
* from the posts table where the status is published.
*
* @param number $year is the year from post_date
* @param number $month is the month from post_date
* @param string $monthName converts the month number to month name
*
* If there are posts, the function returns an <option>. 
*/

function selectMonth () {
	global $conn;
	$query = "SELECT YEAR(post_date) AS YEAR, MONTH(post_date) AS MONTH, COUNT(*) AS TOTAL FROM posts WHERE post_status = 1 GROUP BY YEAR DESC, MONTH DESC";

	if ($result = mysqli_query($conn, $query)) {
	while ($row = mysqli_fetch_assoc($result)) {
	        $year = $row['YEAR'];
	        $monthNum = $row['MONTH'];
	        $monthName = strftime('%B', mktime(0, 0, 0, $monthNum, 10, $year));
	        $monthName = ucfirst($monthName);
	        $numposts = $row['TOTAL'];
	        echo "<option value='$monthNum'>$monthName ($numposts)</option>";
	    }
	   }
	   mysqli_free_result($result);
	}

/*
* The function counts how many comments there are per post.
* The query checks the number of comments that belong to the post. 
*
* @param number $row_cnt is the number of rows that are in the result
*
* If there are comments, the function returns the number of comments.
* Else a message to post comments is displayed. 
*/

function countComments () {
	global $conn;
	$query = "SELECT * FROM comments WHERE comment_post_id = '{$_GET['post']}'";
	if ($result = mysqli_query($conn, $query)) {
		
		$row_cnt = mysqli_num_rows($result);
		if ($row_cnt == 0) {
			echo "<p>Antal kommentarer ($row_cnt)</p>";
			echo "<p>Tyvärr finns det inga kommentarer än. Bli den första att kommentera!</p>";
		} else {
			echo "<p>Antal kommentarer ($row_cnt)</p>";
		}
	}
  mysqli_free_result($result);
}
?>
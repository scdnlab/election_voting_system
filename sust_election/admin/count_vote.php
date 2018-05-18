<?
    include("../includes/configure.php");
	
	$vote_count = new vote_count();    
    $total=$vote_count->findCount_query("select count(distinct(vote_count.student_id)) as total from vote_count,student where vote_count.student_id=student.id and student.status='Active' and vote_count.election_id=$_REQUEST[election_id]","total");
	echo $total;exit;
?>

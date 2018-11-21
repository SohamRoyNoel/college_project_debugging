
<?php include "includes/header.php";?>

<?php include "includes/nav.php";?>
 
        <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
  		<!--banner-->	
		    <div class="banner">
		   
				<h2>
				<a href="index.php">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>QNA</span>
				</h2>
		    </div>
		    <br>

			<div class="panel">
			<div class="panel-heading">
			<h3 class="panel-title">QNAs</h3>
				</div>
			<div class="panel-body">
      <form action="" method='post'>    
           <table class="table table-hover">

                                   
										<thead>
						<tr>	
                    															
					    <th>Id</th>
                        <th>Questions</th>
                        <th>Answers</th>
                                         
											</tr>
										</thead>
										<tbody>
										
<?php 
    
    $query = "SELECT faq_question.id, faq_question.question, faq_reply.qid, faq_reply.reply FROM faq_question LEFT JOIN faq_reply ON faq_question.id = faq_reply.qid ";
    $select_posts = mysqli_query($connection,$query);  

    while($row = mysqli_fetch_assoc($select_posts)) {
        $id            = $row['id'];
        $question        = $row['question'];
        $qid         = $row['qid'];
        $reply          = $row['reply'];
   
        
        echo "<tr>";
         echo "<td>$id</td>";
         echo "<td>$question</td>";
         echo "<td>$reply</td>";
 
        echo "</tr>";

    }


      ?>     
                                                               		
										</tbody>
									</table>
                </form>
			 </div>
</div>










<?php include "includes/footer.php";?>
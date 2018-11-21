<?php


if(isset($_POST['checkBoxArray'])) {

foreach($_POST['checkBoxArray'] as $postValueId ){
        
  $bulk_options = $_POST['bulk_options'];
        
        switch($bulk_options) {
                

            
  case 'delete':
        
$query = "DELETE FROM jobs WHERE id = {$postValueId}  ";
        
 $update_to_delete_status = mysqli_query($connection,$query);
            
confirmQuery($update_to_delete_status);

     break;
   case 'clone':
  $query = "SELECT * FROM jobs WHERE id = '{$postValueId}' ";
            $select_post_query = mysqli_query($connection, $query);


          
            while ($row = mysqli_fetch_array($select_post_query)) {
         
                    $company_idp = $row['company_id'];
                    $object1 = $row['object'];
                    $title1 = $row['title'];
                    $dates1 = $row['date'];
                    $hremail1 = $row['HRem'];
                    $hrcontact1 = $row['HRph'];
                    $salary1 = $row['salary'];
                    $location1 = $row['location'];
                    $target1 = $row['targetTo'];
                    $skill1 = $row['skill'];
                    $education1 = $row['mineducation'];
                    $role1 = $row['role'];
                     $type1 = $row['type'];

          }
    $query = "INSERT INTO jobs(company_id, object,title, date,HRem,HRph,salary,location,targetTo,skill,mineducation,role,type) ";
             
      $query .= "VALUES({$company_idp},'{$object1}','{$title1}',now(),'{$hremail1}','{$hrcontact1}','{$salary1}', '{$location1}', '{$target1}', '{$skill1}', '{$education1}', '{$role1}', 'company') "; 

                $copy_query = mysqli_query($connection, $query);   

               if(!$copy_query ) {

                die("QUERY FAILED" . mysqli_error($connection));
               }   
                 
                 break;

     }
    
    } 

}


?>

			<div class="panel">
			<div class="panel-heading">
			<h3 class="panel-title">Jobs</h3>
				</div>
			<div class="panel-body">
      <form action="" method='post'>    
           <table class="table table-hover">
   <div id="bulkOptionContainer" class="col-xs-4">        
           <select class="form-control" name="bulk_options" id="">
        <option value="">Select Options</option>
        <option value="delete">Delete</option>
         <option value="clone">Clone</option>
        </select>

        </div>
    <div class="col-xs-4">

<input type="submit" name="submit" class="btn btn-success" value="Apply">
<a class="btn btn-primary" href="jobs.php?source=add_job">Add New</a>

 </div>
                                   
										<thead>
						<tr>	
                        <th></th>																
					    <th>Id</th>
                        <th>Company</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Role</th>
                        <th>Education</th>
                        <th>Skill</th>
                        <th>Salary</th>
                        <th>Object</th>
                        <th>Location</th>
                        <th>Edit</th>
                        <th>Delete</th>
             
											</tr>
										</thead>
										<tbody>
										
<?php 
    
    $query = "SELECT * FROM jobs WHERE type = 'company'  ORDER BY id DESC  ";
    $select_posts = mysqli_query($connection,$query);  

    while($row = mysqli_fetch_assoc($select_posts)) {
                    $id1 = $row['id'];
                    $company_idp = $row['company_id'];
                    $object1 = $row['object'];
                    $title1 = $row['title'];
                    $dates1 = $row['date'];
                    $hremail1 = $row['HRem'];
                    $hrcontact1 = $row['HRph'];
                    $salary1 = $row['salary'];
                    $location1 = $row['location'];
                    $target1 = $row['targetTo'];
                    $skill1 = $row['skill'];
                    $education1 = $row['mineducation'];
                    $role1 = $row['role'];
        
        echo "<tr>";
        ?>
        
        <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $id1; ?>'></td>
        
        <?php
        
         echo "<td>$id1</td>";
        
        $query = "SELECT * FROM company WHERE id = {$company_idp} ";
        $select_company_id = mysqli_query($connection,$query); 
        while($row = mysqli_fetch_assoc($select_company_id)) {
        $name = $row['name'];
        $img = $row['img'];
        
        echo "<td>$name</td>";
        echo "<td><img width='100' src='../companyImage/$img' alt='image'></td>";
        
        }
  
      echo "<td>$title1</td>";
         echo "<td>$role1</td>";
        echo "<td>$education1</td>";
        echo "<td>$skill1</td>";
         echo "<td>$salary1</td>";
        echo "<td>$object1</td>";
        echo "<td>$location1</td>";

        echo "<td><a href='jobs.php?source=edit_job&p_id={$id1}'><i class='fa fa-edit'></i></a></td>";
        echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='jobs.php?delete={$id1}'><i class='fa fa-trash'></i></a></td>"; 

        echo "</tr>";

    }



      ?>                                		
										</tbody>
									</table>
                </form>
			 </div>
</div>

<?php 

if(isset($_GET['delete'])){

    $the_post_id = escape($_GET['delete']);
    
    $query = "DELETE FROM jobs WHERE id = {$the_post_id} ";
    $delete_query = mysqli_query($connection, $query);
    header("Location: jobs.php");
}




?>

                        

							
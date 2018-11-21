<?php

    if(isset($_GET['p_id'])){
    
    $the_post_id =  escape($_GET['p_id']);

    }


    $query = "SELECT * FROM jobs WHERE id = $the_post_id  ";
    $select_jobs_by_id = mysqli_query($connection,$query);  

    while($row = mysqli_fetch_assoc($select_jobs_by_id)) {
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
        
         }


    if(isset($_POST['update_job'])) {
        
        
        $title          =  escape($_POST['title']);
        $education          =  escape($_POST['education']);
        $skill    =  escape($_POST['skill']);
        $target        =  escape($_POST['target']);
        $location        =  escape($_POST['location']);
        $salary           =  escape($_POST['salary']);
        $hremail           =  escape($_POST['hremail']);
        $object           =  escape($_POST['object']);
      
   
        
        

        $title = mysqli_real_escape_string($connection, $title);

        
          $query = "UPDATE jobs SET ";
          $query .="title  = '{$title}', ";
          $query .="mineducation = '{$education}', ";
          $query .="skill = '{$skill}', ";
          $query .="targetTo = '{$target}', ";
          $query .="location   = '{$location}', ";
          $query .="salary= '{$salary}', ";
          $query .="HRem  = '{$hremail}' ";
          $query .= "WHERE id = {$the_post_id} ";
        
        $update_post = mysqli_query($connection,$query);
        
        confirmQuery($update_post);
        
      print("<script>window.alert('Post Updated');</script>");
    

  

    }

?> 
        
        <div class="validation-system">
 		
 		<div class="validation-form">
 	<!---->
  	    
        <form id="form"  action="" method="post" enctype="multipart/form-data">
         	<div class="vali-form">
            <div class="col-md-6 form-group1">
              <label for="title" class="control-label">Title</label>
              <input maxlength="10" value="<?php echo $title1; ?>" type="text" placeholder="Title" required="" name="title">
            </div>
            <div class="clearfix"> </div>
            </div>
     
             <div class="clearfix"> </div>
          <div class="col-md-6 form-group1">
              <label for="education" class="control-label">Education</label>
              <input maxlength="10" value="<?php echo $education1; ?>" type="text" placeholder="Education" required=""  name="education">
            </div>
            <br>
           <div class="col-md-6 form-group1">
              <label for="skill" class="control-label">Skills</label>
              <input maxlength="10" value="<?php echo $skill1; ?>" type="text" placeholder="Skills" required=""  name="skill">
            </div>
            <br>
            <div class="col-md-6 form-group1">
              <label for="target" class="control-label">Target</label>
              <input maxlength="10" value="<?php echo $target1; ?>" type="text" placeholder="Target" required=""  name="target">
            </div>
            <br>
            <div class="col-md-6 form-group1">
              <label for="location" class="control-label">Location</label>
              <input maxlength="20" value="<?php echo $location1; ?>" type="text" placeholder="Location" required=""  name="location">
            </div>
            <br>
            <div class="col-md-6 form-group1">
              <label for="salary" class="control-label">Salary</label>
              <input onkeypress="return isNumberKey(event)" value="<?php echo $salary1; ?>" type="text" placeholder="" required=""  name="salary">
            </div>
             <script>
                    function isNumberKey(evt){
                        var charCode = (evt.which) ? evt.which : event.keyCode
                        if (charCode > 31 && (charCode < 48 || charCode > 57))
                            return false;
                        return true;
                    }
                </script>
            <br>
            <div class="col-md-6 form-group1">
              <label for="hremail1" class="control-label">Email</label>
              <input maxlength="20" minlength="5" value="<?php echo $hremail1; ?>" type="email" placeholder="Email" required=""  name="hremail">
            </div>
            <div class="clearfix"> </div>
            <br>
            <div class="col-md-12 form-group1 ">
              <label for="object" class="control-label">Post</label>
              <textarea maxlength="200" id="body" name="object"  placeholder="Write...." required=""><?php echo str_replace('\r\n', '</br>', $object1) ; ?></textarea>
            </div>
            <br>
             <div class="clearfix"> </div>
            <div class="col-md-12 form-group">
              <button name="update_job" type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-default">Reset</button>
            </div>

          <div class="clearfix"> </div>
     
            </form>
 	<!---->
 </div>

</div>
   <script>
    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
	 
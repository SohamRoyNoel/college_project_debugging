    <?php


   if(isset($_POST['create_job'])) {
       
       
        $title          =  escape($_POST['title']);
        $education          =  escape($_POST['education']);
        $skill    =  escape($_POST['skill']);
        $target        =  escape($_POST['target']);
        $location        =  escape($_POST['location']);
        $salary           =  escape($_POST['salary']);
        $hremail           =  escape($_POST['hremail']);
        $object           =  escape($_POST['object']);
        $company_id        = escape($_POST['company_id']);
            $role        = escape($_POST['role']);
            $hrph         = escape($_POST['HRph']);
            $date         = escape(date('d-m-y'));

      $query = "INSERT INTO jobs(company_id, object,title, date,HRem,HRph,salary,location,targetTo,skill,mineducation,role,type) ";
             
      $query.="VALUES({$company_id},'{$object}','{$title}',now(),'{$hremail}','{$hrph}','{$salary}','{$location}','{$target}','{$skill}','{$education}','{$role}','company')"; 
             
      $create_post_query = mysqli_query($connection, $query);  
          
      confirmQuery($create_post_query);

      $the_post_id = mysqli_insert_id($connection);

   print("<script>window.alert('Job Created');</script>");

}
?>    
      
          <div class="validation-system">
 		
 		<div class="validation-form">
 	<!---->
  	    
        <form id="form"  action="" method="post" enctype="multipart/form-data">
         	<div class="vali-form">
            <div class="col-md-6 form-group1">
              <label for="title" class="control-label">Title</label>
              <input maxlength="20" type="text" placeholder="Title" required="" name="title">
            </div>
            <div class="clearfix"> </div>
            </div>
     
             <div class="clearfix"> </div>
          <div class="col-md-6 form-group1">
              <label for="education" class="control-label">Education</label>
              <input maxlength="10" type="text" placeholder="Education" required=""  name="education">
            </div>
            <br>
           <div class="col-md-6 form-group1">
              <label for="skill" class="control-label">Skills</label>
              <input maxlength="10" type="text" placeholder="Skills" required=""  name="skill">
            </div>
            <br>
            <div class="col-md-6 form-group1">
              <label for="target" class="control-label">Target</label>
              <input maxlength="10" type="text" placeholder="Target" required=""  name="target">
            </div>
            <br>
            <div class="col-md-6 form-group1">
              <label for="location" class="control-label">Location</label>
              <input maxlength="20" type="text" placeholder="Location" required=""  name="location">
            </div>
            <br>
            <div class="col-md-6 form-group1">
              <label for="salary" class="control-label">Salary</label>
              <input onkeypress="return isNumberKey(event)" type="text" placeholder="" required=""  name="salary">
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
            <div class="clearfix"> </div>
            <br>
            <div class="col-md-6 form-group1">
              <label for="hremail1" class="control-label">Email</label>
              <input maxlength="30" minlength="5" type="email" placeholder="Email" required=""  name="hremail">
            </div>
            <br>
            <div class="panel-body">
            <label for="company" class="control-label">Company</label>
            <select name="company_id" id="" class="form-control">
             <?php

        $query = "SELECT * FROM company ";
        $select_company = mysqli_query($connection,$query);
        confirmQuery($select_company);
           while($row = mysqli_fetch_assoc($select_company )) {
        $id = $row['id'];
        $name = $row['name'];
         echo "<option value='$id'>{$name}</option>";
   }

?>
         </select>
            </div>
            <div class="clearfix"> </div>
            <br>
            <div class="col-md-6 form-group1">
              <label for="role" class="control-label">Role</label>
              <input maxlength="10" type="text" placeholder="Role" required=""  name="role">
            </div>
            <div class="clearfix"> </div>
            <br>
            <div class="col-md-6 form-group1">
              <label for="HRph" class="control-label">Phone no.</label>
              <input maxlength="10" minlength="10" onkeypress="return isNumberKey(event)" type="text" placeholder="No." required=""  name="HRph">
            </div>
            <script>
                    function isNumberKey(evt){
                        var charCode = (evt.which) ? evt.which : event.keyCode
                        if (charCode > 31 && (charCode < 48 || charCode > 57))
                            return false;
                        return true;
                    }
                </script>
            <div class="clearfix"> </div>
            <br>
            <div class="col-md-12 form-group1 ">
              <label for="object" class="control-label">Post</label>
              <textarea maxlength="200" id="froala-editor" name="object"  placeholder="Write...." required=""></textarea>
            </div>
            <br>
             <div class="clearfix"> </div>
             <br>
            <div class="col-md-12 form-group">
              <button name="create_job" type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-default">Reset</button>
            </div>

          <div class="clearfix"> </div>
     
            </form>
 	<!---->
 </div>

</div>
  <script>
  $(function() {
    $('textarea#froala-editor').froalaEditor()
  });
</script>
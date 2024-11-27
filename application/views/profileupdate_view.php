<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- form start -->
              <div class="box-header with-border">
                <h3 class="box-title">Update Your Profile</h3>
              </div>
              
              <form class="form-horizontal" action="<?php echo base_url(); ?>profile/update" method="post" entype="multipart/form-data">
              <?php //echo form_open_multipart('profile/update'); ?>
              <input type="hidden" name="id" value="<?php echo $details[0]->id; ?>">
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Account For :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="Account_For" value="<?php echo $details[0]->Account_For; ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Title :</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="Title">
                          <option value="">Select a title</option>
                          <option value="Mr." <?php if($details[0]->Title == "Mr.") { ?> selected <?php } ?>>Mr.</option>
                          <option value="Mrs." <?php if($details[0]->Title == "Mrs.") { ?> selected <?php } ?>>Mrs.</option>
                          <option value="Dr." <?php if($details[0]->Title == "Dr.") { ?> selected <?php } ?>>Dr.</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Name :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="Name" value="<?php echo $details[0]->Name; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">House :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="House" value="<?php echo $details[0]->House; ?>" placeholder="Enter house no.">
                    </div>
                  </div>
                
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Street Name :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="Street" value="<?php echo $details[0]->Street; ?>" placeholder="Enter street name...">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Location :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="Location" value="<?php echo $details[0]->Location; ?>" placeholder="Enter your location">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">City :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="City" value="<?php echo $details[0]->City; ?>" placeholder="Enter your city">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">State :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="State" value="<?php echo $details[0]->State; ?>" placeholder="Enter your state">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Country :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="Country" value="<?php echo $details[0]->Country; ?>" placeholder="Enter your country">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Pin Code :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="Zip" value="<?php echo $details[0]->Zip; ?>" placeholder="Enter your pin code">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Phone No. :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="Phone1" value="<?php echo $details[0]->Phone1; ?>" placeholder="Enter your phone no.">
                    </div>
                  </div>
                  
                </div>

                <div class="col-md-6">

                  
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Notes :</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="Notes" placeholder="Write something about yourself..."><?php echo $details[0]->Notes; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Email Id :</label>
                    <div class="col-sm-8">
                      <input type="email" class="form-control" name="Email" value="<?php echo $details[0]->UserName; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">User Name :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="UserName" value="<?php echo $details[0]->UserName; ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Password :</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control" name="Password" value="" placeholder="********">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Confirm Password :</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control" name="Confirm_Password" value="" placeholder="********">
                    </div>
                  </div>
                 

                  <div class="form-group">
                    <?php    
                    $error_Title = form_error('Title');
                    $error_Name = form_error('Name');
                    $error_Location = form_error('Location');
                    $error_City = form_error('City');
                    $error_State = form_error('State');
                    $error_Country = form_error('Country');
                    $error_Zip = form_error('Zip');
                    $error_Phone1 = form_error('Phone1');
                    $error_Email = form_error('Email');
                    $error_Password = form_error('Password');
                    $error_Confirm_Password = form_error('Confirm_Password');

                   
                    ?>
                    <div class="error">
                       <?php 
                        if(isset($success_msg)) 
                        {
                            echo $success_msg."<br/>";
                        }
                        
                        if($error_Title <> NULL) 
                        { 
                          echo "<div class='error' style='color:red;'>*".strip_tags($error_Title)."</font></div>";                  
                        }
                        elseif($error_Name <> NULL) 
                        { 
                          echo "<div class='error' style='color:red;'>*".strip_tags($error_Name)."</font></div>";                  
                        }
                        elseif($error_Location <> NULL) 
                        { 
                          echo "<div class='error' style='color:red;'>*".strip_tags($error_Location)."</font></div>";                  
                        }
                        elseif($error_City <> NULL) 
                        { 
                          echo "<div class='error' style='color:red;'>*".strip_tags($error_City)."</font></div>";                  
                        }
                        elseif($error_State <> NULL) 
                        { 
                          echo "<div class='error' style='color:red;'>*".strip_tags($error_State)."</font></div>";                  
                        }
                        elseif($error_Country <> NULL) 
                        { 
                          echo "<div class='error' style='color:red;'>*".strip_tags($error_Country)."</font></div>";                  
                        }
                        elseif($error_Zip <> NULL) 
                        { 
                          echo "<div class='error' style='color:red;'>*".strip_tags($error_Zip)."</font></div>";                  
                        }
                        elseif($error_Phone1 <> NULL) 
                        { 
                          echo "<div class='error' style='color:red;'>*".strip_tags($error_Phone1)."</font></div>";                  
                        }
                        elseif($error_Email <> NULL) 
                        { 
                          echo "<div class='error' style='color:red;'>*".strip_tags($error_Email)."</font></div>";                  
                        }
                        elseif($error_Password <> NULL) 
                        { 
                          echo "<div class='error' style='color:red;'>*".strip_tags($error_Password)."</font></div>";                  
                        }
                        elseif($error_Confirm_Password <> NULL) 
                        { 
                          echo "<div class='error' style='color:red;'>*".strip_tags($error_Confirm_Password)."</font></div>";                  
                        }
                      ?> 
                      <?php echo $this->session->flashdata('msg'); ?>    
                    </div>   
                  </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-info pull-right">Update</button>
              </div>
              </form>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<script>
 
</script>
</body>
</html>

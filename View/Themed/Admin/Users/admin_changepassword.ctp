
<?php 



    if(isset($_SESSION['msg']) && !empty($_SESSION['msg']))
    {
        $m =$_SESSION['msg'];
        unset($_SESSION['msg']);

        if($m==3)
        {
            echo "<script>

                toastr.warning('confirm password mismatched.');
        </script>";
        }
        elseif($m==1)
        {
            echo "<script>

                toastr.success('Password changed successfully.');
        </script>";
        }
        else
        {
            echo "<script>

                toastr.info('Incorrect current password.');
        </script>";
        }
    }
?>
<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Settings <small></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Change password
                            </li>


                        </ol>
                    </div>
                </div>

                <div class="clearfix"></div><br/>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel panel-success">
                            <div class="panel-heading">Change Password</div>
                          <div class="panel-body">
                            <form action="<?php echo $this->webroot;?>admin/users/changepassword" method="POST">
                              <div class="form-group">
                                <label for="currnetpass">Current Password:</label>
                                <input type="password" class="form-control" id="currentpass" name="oldpassword" required>
                              </div>
                              <div class="form-group">
                                <label for="pwd">New Password:</label>
                                <input type="password" class="form-control" id="pwd" name="newpassword" required>
                              </div>

                              <div class="form-group">
                                <label for="cpwd">Confirm Password:</label>
                                <input type="password" class="form-control" id="cpwd" name="confirmpassword" required>
                              </div>

                              <button type="submit" class="btn btn-default">Submit</button>
                            </form>
                          </div>
                          <!-- <div class="panel-footer">Panel footer</div> -->
                        </div>
                        
                    </div>
                </div>
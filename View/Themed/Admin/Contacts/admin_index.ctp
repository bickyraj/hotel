

<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Contact <small>lists</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Contact Dashboard
                            </li>


                        </ol>
                        <?php if(empty($contact)):?>
                            <button type="button" id="addRoomsBtn" class="btn btn-success pull-right">Add +</button>
                        <?php endif;?>
                    </div>
                </div>

                <div class="clearfix"></div><br/>
                <div class="row">
                    <div class="col-lg-6">
                        <!-- <h2>Bordered Table</h2> -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Website</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $n=1; if(!empty($contact)):?>

                                            <tr>
                                                <td><?php echo $n++;?></td>
                                                <td><?php echo $contact['Contact']['address'];?></td>
                                                <td><?php echo $contact['Contact']['phone'];?></td>
                                                <td><?php echo $contact['Contact']['email'];?></td>
                                                <td><?php echo $contact['Contact']['website'];?></td>
                                                <td>
                                                        <Button type="button" id="editModalBtn" class="btn btn-xs btn-success">Edit</Button>
                                                </td>
                                            </tr>
                                        <?php else:?>

                                        <tr>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                    <?php endif;?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

<div id="addRoomModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Add Contact</h4>
        </div>
      <div class="modal-body">
            <form action="/neelaya/admin/contacts/addContact" role="form" id="RoomAdminIndexForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">

                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="data[Contact][address]" required>
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" name="data[Contact][phone]" required>
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="data[Contact][email]" required>
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>

                            <div class="form-group">
                                <label>Website</label>
                                <input type="text" class="form-control" name="data[Contact][website]" required>
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>

                          <!--   <button type="submit" class="btn btn-default">Submit Button</button>
                            <button type="reset" class="btn btn-default">Reset Button</button> -->
                            <div class="modal-footer"><input type="submit" value="Submit" name="submit" class="btn btn-primary" /></div>
                        </form>
        
      </div>
      <!-- dialog buttons -->
      
    </div>
  </div>
</div>


<?php if(!empty($contact)):?>
    <div id="editModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Contact</h4>
            </div>
          <div class="modal-body">
                <form action="/neelaya_api/admin/contacts/editContact" role="form" id="RoomAdminIndexForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                <input type="hidden" name="data[Contact][id]" value="<?php echo $contact['Contact']['id'];?>">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="data[Contact][address]" value="<?php echo $contact['Contact']['address'];?>" required>
                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="data[Contact][phone]" value="<?php echo $contact['Contact']['phone'];?>" required>
                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="data[Contact][email]" value="<?php echo $contact['Contact']['email'];?>" required>
                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                </div>

                                <div class="form-group">
                                    <label>Website</label>
                                    <input type="text" class="form-control" name="data[Contact][website]" value="<?php echo $contact['Contact']['website'];?>" required>
                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                </div>

                              <!--   <button type="submit" class="btn btn-default">Submit Button</button>
                                <button type="reset" class="btn btn-default">Reset Button</button> -->
                                <div class="modal-footer"><input type="submit" value="Submit" name="editContact" class="btn btn-primary" /></div>
                            </form>
            
          </div>
          <!-- dialog buttons -->
          
        </div>
      </div>
    </div>
<?php endif;?>
<script>
        $(function()
            {

                $("#addRoomsBtn").on('click', function(event)
                    {
                        $("#addRoomModal").modal("show");
                    });

                $("#editModalBtn").on('click', function(event)
                    {
                        $("#editModal").modal("show");
                    });
            });
    </script>
<?php
 // echo "<pre>";print_r($roomtype);
 ?>

<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo $roomtype['Roomtype']['type'];?> <small>room type</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Rooms Dashboard
                            </li>


                        </ol>
                        <a href="<?php echo $this->webroot;?>admin/roomtypes" type="button" class="btn btn-success pull-right">Back</a>
                        <button type="button" id="addRoomsBtn" class="btn btn-success pull-right" style="margin-right:5px;">Add +</button>
                    </div>
                </div>

                <div class="clearfix"></div><br/>
                <div class="row">
                    <div class="col-lg-12">
                        <!-- <h2>Bordered Table</h2> -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>feature</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($features)):?>
                                        <?php $n=1; foreach ($features as $feature):?>

                                            <tr>
                                                <td><?php echo $n++;?></td>
                                                <td><?php echo $feature['Roomfeature']['features'];?></td>
                                                <td>

                                                    <button class="btn btn-xs btn-success editBtn" data-Id="<?php echo $feature['Roomfeature']['id'];?>" style="float:left; margin-right:5px;">Edit</button>

                                                    <form class="deleteForm" action="<?php echo URL_VIEW.'admin/roomfeatures/deletefeature';?>" method="POST">
                                                    	<input type="hidden" name="data[Roomfeature][roomtype_id]" value="<?php echo $roomtype['Roomtype']['id'];?>">
                                                        <input type="hidden" value="<?php echo $feature['Roomfeature']['id'];?>" name="data[Roomfeature][id]"/>
                                                        <input type="hidden" name="deleteBtn" class="btn btn-xs btn-danger" value="Delete" />
                                                    </form>
                                                    <button class="btn btn-xs btn-danger deleteBtn">Delete</button>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                        <?php else:?>

                                        <tr>
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
            <h4 class="modal-title">Add Rooms</h4>
        </div>
      <div class="modal-body">
            <?php echo $this->Form->create('Roomfeature', array('type'=>'file','role'=>'form'), array('action'=>'features'));?>

            				<input type="hidden" name="data[Roomfeature][roomtype_id]" value="<?php echo $roomtype['Roomtype']['id'];?>">
                            <div class="form-group">
                                <label>Features</label>
                                <input type="text" class="form-control" name="data[Roomfeature][features]" required>
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
<script>
        $(function()
            {

                $(".deleteBtn").on('click', function(event)
                    {
                        var e = $(this);
                        bootbox.confirm("Are you sure you want to delete?", function(result) {

                                if(result === true)
                                {
                                    e.siblings(".deleteForm").submit();
                                }
                            }); 
                    });

                $("#addRoomsBtn").on('click', function(event)
                    {
                        $("#addRoomModal").modal("show");
                    });

                $(".editBtn").on('click', function(event)
                    {

                        var Id = $(this).attr('data-Id');
                        var url = '<?php echo $this->webroot;?>roomfeatures/roomfeaturedetails/'+Id+'.json';
                        
                        $.ajax(
                            {
                                url:url,
                                type:'post',
                                datatype:'jsonp',
                                success:function(response)
                                {
                                    // console.log(response);
                                    var data = response.roomfeature.Roomfeature;

                                    bootbox.dialog({
                                            title: "Edit Feature",
                                            message: '<form action="<?php echo $this->webroot;?>admin/roomfeatures/editroomfeature" role="form" id="OfferAdminIndexForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">'+
                                                            '<input type="hidden" name="data[Roomfeature][id]" value="'+data.id+'">'+

                                                            '<input type="hidden" name="data[Roomfeature][roomtype_id]" value="<?php echo $roomtype["Roomtype"]["id"];?>">'+

                                                            '<div class="form-group">'+
                                                                '<label>Feature</label>'+
                                                                '<input type="text" class="form-control" name="data[Roomfeature][features]" required value="'+data.features+'">'+
                                                            '</div>'+
                                                               
                                                            '</div>'+

                                                            '<div class="modal-footer"><input type="submit" value="Submit" name="submitEditBtn" class="btn btn-primary" /></div>'+
                                                        '</form>',
                                        }
                                    );
                                }
                            });
                    });
            });
    </script>
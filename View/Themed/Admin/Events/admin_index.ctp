

<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Events <small>lists</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Events Dashboard
                            </li>


                        </ol>
                        <button type="button" id="addEventBtn" class="btn btn-success pull-right">Add +</button>
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
                                        <th>Title</th>
                                        <!-- <th>Descriptions</th> -->
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($events)):?>
                                        <?php $n=1; foreach ($events as $event):?>

                                            <tr>
                                                <td><?php echo $n++;?></td>
                                                <td><?php echo $event['Event']['title'];?></td>
                                                <!-- <td><?php echo $event['Event']['description'];?></td> -->
                                                <td><?php echo $this->Html->image('../webroot/files/event/image/'.$event['Event']['image_dir'].'/thumb_'.$event['Event']['image'],['alt'=>'gear_img','class'=>'media-object', 'width'=>'200']);?></td>
                                                <td>
                                                    <button class="btn btn-xs btn-success editBtn" data-Id="<?php echo $event['Event']['id'];?>" style="float:left; margin-right:5px;">Edit</button>

                                                    <form class="deleteForm" action="<?php echo URL_VIEW.'admin/events/deleteEvent';?>" method="POST">
                                                        <input type="hidden" value="<?php echo $event['Event']['id'];?>" name="data[Event][id]"/>
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
            <h4 class="modal-title">Add Events</h4>
        </div>
      <div class="modal-body">
            <form action="/neelaya/admin/events/addEvent" role="form" id="RoomAdminIndexForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="data[Event][title]" required>
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control mytextarea" rows="3" name="data[Event][description]"></textarea>
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>

                            <div class="form-group">
                                <?php echo $this->Form->input('Event.image', array('type' => 'file')); ?>
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

                $("#addEventBtn").on('click', function(event)
                    {
                        $("#addRoomModal").modal("show");
                    });

                $(".editBtn").on('click', function(event)
                    {

                        var Id = $(this).attr('data-Id');
                        var url = '<?php echo $this->webroot;?>events/eventdetails/'+Id+'.json';
                        
                        $.ajax(
                            {
                                url:url,
                                type:'post',
                                datatype:'jsonp',
                                success:function(response)
                                {
                                    // console.log(response);
                                    var data = response.event.Event;

                                    bootbox.dialog({
                                            title: "Edit Event",
                                            message: '<form action="<?php echo $this->webroot;?>admin/events/editevent" role="form" id="OfferAdminIndexForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">'+
                                                            '<input type="hidden" name="data[Event][id]" value="'+data.id+'">'+
                                                            '<div class="form-group">'+
                                                                '<label>Title</label>'+
                                                                '<input type="text" class="form-control" name="data[Event][title]" required value="'+data.title+'">'+
                                                            '</div>'+

                                                            '<div class="form-group">'+
                                                                '<label>Description</label>'+
                                                                '<textarea class="form-control mytextarea" rows="3" name="data[Event][description]">'+data.description+'</textarea>'+
                                                            '</div>'+

                                                            '<div class="form-group">'+
                                                                '<label>Image</label>'+
                                                                '<img class="media-object" src="<?php echo $this->webroot;?>img/../webroot/files/event/image/'+data.image_dir+'/thumb_'+data.image+'" alt="" width="200">'+
                                                               
                                                            '</div>'+

                                                            '<div class="form-group">'+
                                                                '<?php echo $this->Form->input("Event.image", array("type" => "file", "required"=>false)); ?>'+
                                                               
                                                            '</div>'+
                                                            '<div class="modal-footer"><input type="submit" value="Submit" name="submitEditBtn" class="btn btn-primary" /></div>'+
                                                        '</form>',
                                        }
                                    );
                                
                                    tinymce.init({
                                                    selector: "textarea"
                                                });
                                }
                            });
                    });

            });
    </script>
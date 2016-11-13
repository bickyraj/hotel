<!-- <?php  echo "<pre>"; print_r($this->params->pass[0]);?> -->

<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo $roomtype['Roomtype']['type'];?> Slider <small>lists</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Room Slider Dashboard
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
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($images)):?>
                                        <?php $n=1; foreach ($images as $image):?>

                                            <tr>
                                                <td><?php echo $n++;?></td>
                                                <td><?php echo $this->Html->image('../webroot/files/roomslider/image/'.$image['Roomslider']['image_dir'].'/thumb_'.$image['Roomslider']['image'],['alt'=>'gear_img','class'=>'media-object', 'width'=>'200']);?></td>
                                                <td>
                                                    <button class="btn btn-xs btn-success editBtn" data-Id="<?php echo $image['Roomslider']['id'];?>" style="float:left; margin-right:5px;">Edit</button>

                                                    <form class="deleteForm" action="<?php echo URL_VIEW.'admin/roomsliders/deleteImage';?>" method="POST">
                                                        <input type="hidden" name="data[Roomslider][roomtype_id]" value="<?php echo $this->params->pass[0];?>">
                                                        <input type="hidden" value="<?php echo $image['Roomslider']['id'];?>" name="data[Roomslider][id]"/>
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
            <h4 class="modal-title">Add Image</h4>
        </div>
      <div class="modal-body">
            <?php echo $this->Form->create('Roomslider', array('type'=>'file','role'=>'form'), array('action'=>'features'));?>

                            <input type="hidden" name="data[Roomslider][roomtype_id];?>" value="<?php echo $this->params->pass[0];?>">
                            <div class="form-group">
                                <?php echo $this->Form->input('Roomslider.image', array('type' => 'file')); ?>
                                <p class="help-block">Size: 848px X 350px</p>
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
                        var url = '<?php echo $this->webroot;?>roomsliders/roomsliderdetails/'+Id+'.json';
                        
                        $.ajax(
                            {
                                url:url,
                                type:'post',
                                datatype:'jsonp',
                                success:function(response)
                                {
                                    // console.log(response);
                                    var data = response.roomslider.Roomslider;

                                    bootbox.dialog({
                                            title: "Edit Event",
                                            message: '<form action="<?php echo $this->webroot;?>admin/roomsliders/editroomslider" role="form" id="OfferAdminIndexForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">'+
                                            '<input type="hidden" name="data[Roomslider][roomtype_id];?>" value="<?php echo $this->params->pass[0];?>">'+
                                                            '<input type="hidden" name="data[Roomslider][id]" value="'+data.id+'">'+

                                                            '<div class="form-group">'+
                                                                '<label>Image</label>'+
                                                                '<img class="media-object" src="<?php echo $this->webroot;?>img/../webroot/files/roomslider/image/'+data.image_dir+'/thumb_'+data.image+'" alt="" width="200">'+
                                                               
                                                            '</div>'+

                                                            '<div class="form-group">'+
                                                                '<?php echo $this->Form->input("Roomslider.image", array("type" => "file", "required"=>false)); ?>'+
                                                                '<p class="help-block">Size: 848px X 350px</p>'+
                                                               
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
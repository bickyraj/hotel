

<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Room Type <small>lists</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Room Type Dashboard
                            </li>


                        </ol>
                        <button type="button" id="addRoomsBtn" class="btn btn-success pull-right">Add +</button>
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
                                        <th>Type</th>
                                        <!-- <th>Content</th> -->
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($roomtypes)):?>
                                        <?php $n=1; foreach ($roomtypes as $roomtype):?>

                                            <tr>
                                                <td><?php echo $n++;?></td>
                                                <td><?php echo $roomtype['Roomtype']['type'];?></td>
                                                <!-- <td><?php echo $roomtype['Roomtype']['content'];?></td> -->
                                                <td><?php echo $roomtype['Roomtype']['price'];?></td>
                                                <td>
                                                    <?php echo $this->Html->image('../webroot/files/roomtype/image/'.$roomtype['Roomtype']['image_dir'].'/thumb_'.$roomtype['Roomtype']['image'],['alt'=>'gear_img','class'=>'media-object', 'width'=>'200']);?>
                                                </td>
                                                <td>
                                    <a href="<?php echo $this->webroot.'admin/';?>roomfeatures/features/<?php echo $roomtype['Roomtype']['id'];?>" class="btn btn-xs btn-success editBtn" style="float:left;margin-right:5px;">Features</a>

                                    <a href="<?php echo $this->webroot.'admin/';?>roomsliders/sliders/<?php echo $roomtype['Roomtype']['id'];?>" class="btn btn-xs btn-primary editBtn" style="float:left;margin-right:5px;">Sliders</a>
                                                    <button class="btn btn-xs btn-success editBtn" data-Id="<?php echo $roomtype['Roomtype']['id'];?>" style="float:left; margin-right:5px;">Edit</button>

                                                    <form class="deleteForm" action="<?php echo URL_VIEW.'admin/roomtypes/deleteRoomtype';?>" method="POST">
                                                        <input type="hidden" value="<?php echo $roomtype['Roomtype']['id'];?>" name="data[Roomtype][id]"/>
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
            <h4 class="modal-title">Add Room Type</h4>
        </div>
      <div class="modal-body">
            <?php echo $this->Form->create('Roomtype', array('type'=>'file','role'=>'form'), array('action'=>'index'));?>

                            <div class="form-group">
                                <label>Type</label>
                                <input type="text" class="form-control" name="data[Roomtype][type]" required>
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>

                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control mytextarea" rows="3" name="data[Roomtype][content]"></textarea>
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" class="form-control" name="data[Roomtype][price]" required>
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>

                            <div class="form-group">
                                <?php echo $this->Form->input('Roomtype.image', array('type' => 'file')); ?>
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
                        var url = '<?php echo $this->webroot;?>roomtypes/roomtypedetails/'+Id+'.json';
                        
                        $.ajax(
                            {
                                url:url,
                                type:'post',
                                datatype:'jsonp',
                                success:function(response)
                                {
                                    // console.log(response);
                                    var data = response.roomtype.Roomtype;

                                    bootbox.dialog({
                                            title: "Edit Roomtype",
                                            message: '<form action="<?php echo $this->webroot;?>admin/roomtypes/editroomtype" role="form" id="OfferAdminIndexForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">'+
                                                            '<input type="hidden" name="data[Roomtype][id]" value="'+data.id+'">'+
                                                            '<div class="form-group">'+
                                                                '<label>Type</label>'+
                                                                '<input type="text" class="form-control" name="data[Roomtype][type]" required value="'+data.type+'">'+
                                                            '</div>'+

                                                            '<div class="form-group"><label>Content</label><textarea class="form-control mytextarea" rows="3" name="data[Roomtype][content]">'+data.content+'</textarea></div>'+


                                                            '<div class="form-group">'+
                                                                '<label>Price</label>'+
                                                                '<input type="text" class="form-control" name="data[Roomtype][price]" required value="'+data.price+'">'+
                                                            '</div>'+

                                                            '<div class="form-group">'+
                                                                '<label>Image</label>'+
                                                                '<img class="media-object" src="<?php echo $this->webroot;?>img/../webroot/files/roomtype/image/'+data.image_dir+'/thumb_'+data.image+'" alt="" width="200">'+
                                                               
                                                            '</div>'+

                                                            '<div class="form-group">'+
                                                                '<?php echo $this->Form->input("Roomtype.image", array("type" => "file", "required"=>false)); ?>'+
                                                               
                                                            '</div>'+
                                                            '<div class="modal-footer"><input type="submit" value="Submit" name="submitEditBtn" class="btn btn-primary" /></div>'+
                                                        '</form>',
                                        }
                                    );

                                                tinymce.init({
                                                    selector: ".mytextarea"
                                                });
                                }
                            });
                    });
            });
    </script>
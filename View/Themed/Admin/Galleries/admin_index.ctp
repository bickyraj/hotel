

<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Galleries <small>lists</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Galleries Dashboard
                            </li>
                        </ol>
                        <button type="button" id="addRoomsBtn" class="btn btn-success pull-right">Add +</button>
                        <a href="<?php echo $this->webroot;?>admin/galleries/choosepic" type="button" class="btn btn-success pull-right" style="margin-right:5px;">Choose pic for gallery</a>
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
                                                <td><?php echo $this->Html->image('../webroot/files/gallery/image/'.$image['Gallery']['image_dir'].'/thumb_'.$image['Gallery']['image'],['alt'=>'gear_img','class'=>'media-object', 'width'=>'200']);?></td>
                                                <td>
                                                    <button class="btn btn-xs btn-success editBtn" data-Id="<?php echo $image['Gallery']['id'];?>" style="float:left; margin-right:5px;">Edit</button>

                                                    <form class="deleteForm" action="<?php echo URL_VIEW.'admin/galleries/deleteImage';?>" method="POST">
                                                        <input type="hidden" value="<?php echo $image['Gallery']['id'];?>" name="data[Gallery][id]"/>
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
            <form action="/neelaya/admin/galleries/addImage" role="form" id="RoomAdminIndexForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">


                            <div class="form-group">
                                <?php echo $this->Form->input('Gallery.image', array('type' => 'file')); ?>
                                <p class="help-block">Size: 929px X 622px</p>
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
                        var url = '<?php echo $this->webroot;?>galleries/gallerydetails/'+Id+'.json';
                        
                        $.ajax(
                            {
                                url:url,
                                type:'post',
                                datatype:'jsonp',
                                success:function(response)
                                {
                                    // console.log(response);
                                    var data = response.gallery.Gallery;

                                    bootbox.dialog({
                                            title: "Edit Event",
                                            message: '<form action="<?php echo $this->webroot;?>admin/galleries/editgallery" role="form" id="OfferAdminIndexForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">'+
                                                            '<input type="hidden" name="data[Gallery][id]" value="'+data.id+'">'+

                                                            '<div class="form-group">'+
                                                                '<label>Image</label>'+
                                                                '<img class="media-object" src="<?php echo $this->webroot;?>img/../webroot/files/gallery/image/'+data.image_dir+'/thumb_'+data.image+'" alt="" width="200">'+
                                                               
                                                            '</div>'+

                                                            '<div class="form-group">'+
                                                                '<?php echo $this->Form->input("Gallery.image", array("type" => "file", "required"=>false)); ?>'+
                                                                '<p class="help-block">Size: 929px X 622px</p>'+
                                                               
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
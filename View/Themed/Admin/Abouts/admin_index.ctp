
<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            About Us Page <small>about us</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> About Us Dashboard
                            </li>


                        </ol>

                        <?php if(empty($about)):?>
                        <button type="button" id="addRoomsBtn" class="btn btn-success pull-right">Add +</button>
                    <?php else:?>

                    <button type="button" data-Id="<?php echo $about['About']['id'];?>" class="btn btn-success pull-right editBtn">Edit</button>

                    <?php endif;?>
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
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($about)):?>
                                            <tr>
                                                <td><?php echo $about['About']['description'];?></td>
                                            </tr>
                                        <?php else:?>

                                        <tr>
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
            <h4 class="modal-title">Add Content</h4>
        </div>
      <div class="modal-body">
            <form action="/neelaya/admin/abouts/addAbout" role="form" id="RoomAdminIndexForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control mytextarea" rows="3" name="data[About][description]"></textarea>
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>

                            <div class="form-group">
                                <?php echo $this->Form->input('About.image', array('type' => 'file')); ?>
                                <p class="help-block">Size: 838px X 350px</p>
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

                $("#addRoomsBtn").on('click', function(event)
                    {
                        $("#addRoomModal").modal("show");
                    });

                $(".editBtn").on('click', function(event)
                    {

                        var Id = $(this).attr('data-Id');
                        var url = '<?php echo $this->webroot;?>abouts/aboutdetails/'+Id+'.json';
                        
                        $.ajax(
                            {
                                url:url,
                                type:'post',
                                datatype:'jsonp',
                                success:function(response)
                                {
                                    // console.log(response);
                                    var data = response.about.About;

                                    bootbox.dialog({
                                            title: "Edit About Us",
                                            message: '<form action="<?php echo $this->webroot;?>admin/abouts/editabout" role="form" id="OfferAdminIndexForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">'+
                                                            '<input type="hidden" name="data[About][id]" value="'+data.id+'">'+
                                                           '<div class="form-group"><label>Description</label><textarea class="form-control mytextarea" rows="3" name="data[About][description]">'+data.description+'</textarea></div>'+
                                                           '<div class="form-group">'+
                                                                '<label>Image</label>'+
                                                                '<img class="media-object" src="<?php echo $this->webroot;?>img/../webroot/files/about/image/'+data.image_dir+'/thumb_'+data.image+'" alt="" width="200">'+
                                                               
                                                            '</div>'+

                                                            '<div class="form-group">'+
                                                                '<?php echo $this->Form->input("About.image", array("type" => "file", "required"=>false)); ?>'+
                                                                '<p class="help-block">Size: 929px X 622px</p>'+
                                                               
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
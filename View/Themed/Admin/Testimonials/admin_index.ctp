

<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Testimonial <small>lists</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Testimonial Dashboard
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
                                        <!-- <th>Descriptions</th> -->
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($testimonials)):?>
                                        <?php $n=1; foreach ($testimonials as $testimonial):?>

                                            <tr>
                                                <td><?php echo $n++;?></td>
                                                <td><?php echo $testimonial['Testimonial']['fullname'];?></td>
                                                <!-- <td><?php echo $testimonial['Testimonial']['description'];?></td> -->
                                                <td>

                                                    <button class="btn btn-xs btn-primary viewBtn" data-Id="<?php echo $testimonial['Testimonial']['id'];?>" style="float:left; margin-right:5px;">View</button>

                                                    <button class="btn btn-xs btn-success editBtn" data-Id="<?php echo $testimonial['Testimonial']['id'];?>" style="float:left; margin-right:5px;">Edit</button>

                                                <?php if($testimonial['Testimonial']['status']==0):?>
                                                    <form action="<?php echo URL_VIEW.'admin/testimonials/postTestimonial';?>" method="POST" style="float:left; margin-right:5px;">
                                                        <input type="hidden" value="<?php echo $testimonial['Testimonial']['id'];?>" name="data[Testimonial][id]"/>
                                                        <input type="submit" name="deleteBtn" class="btn btn-xs btn-primary" value="Post" />
                                                    </form>
                                                <?php else:?>
                                                    <form action="<?php echo URL_VIEW.'admin/testimonials/unpostTestimonial';?>" method="POST" style="float:left; margin-right:5px;">
                                                        <input type="hidden" value="<?php echo $testimonial['Testimonial']['id'];?>" name="data[Testimonial][id]"/>
                                                        <input type="submit" name="deleteBtn" class="btn btn-xs btn-warning" value="Unpost" />
                                                    </form>
                                                <?php endif;?>

                                                    <form class="deleteForm" action="<?php echo URL_VIEW.'admin/testimonials/deleteTestimonial';?>" method="POST" style="float:left; margin-right:5px;">
                                                        <input type="hidden" value="<?php echo $testimonial['Testimonial']['id'];?>" name="data[Testimonial][id]"/>
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
            <h4 class="modal-title">Add Testimonials</h4>
        </div>
      <div class="modal-body">
            <form action="/neelaya/admin/testimonials/addTestimonial" role="form" id="RoomAdminIndexForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="data[Testimonial][fullname]" required>
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="data[Testimonial][email]" required>
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>

                            <div class="form-group">
                                <label>Comment</label>
                                <textarea class="form-control mytextarea" rows="3" name="data[Testimonial][comment]"></textarea>
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
                        var url = '<?php echo $this->webroot;?>testimonials/testimonialdetails/'+Id+'.json';
                        
                        $.ajax(
                            {
                                url:url,
                                type:'post',
                                datatype:'jsonp',
                                success:function(response)
                                {
                                    // console.log(response);
                                    var data = response.testimonial.Testimonial;

                                    bootbox.dialog({
                                            title: "Edit Testimonial",
                                            message: '<form action="<?php echo $this->webroot;?>admin/testimonials/edittestimonial" role="form" id="OfferAdminIndexForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">'+
                                                            '<input type="hidden" name="data[Testimonial][id]" value="'+data.id+'">'+
                                                            '<div class="form-group">'+
                                                                '<label>Name</label>'+
                                                                '<input type="text" class="form-control" name="data[Testimonial][fullname]" required value="'+data.fullname+'">'+
                                                            '</div>'+

                                                            '<div class="form-group">'+
                                                                '<label>Email</label>'+
                                                                '<input type="text" class="form-control" name="data[Testimonial][email]" required value="'+data.email+'">'+
                                                            '</div>'+

                                                            '<div class="form-group">'+
                                                                '<label>Comment</label>'+
                                                                '<textarea class="form-control mytextarea" rows="3" name="data[Testimonial][comment]">'+data.comment+'</textarea>'+
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

                
                $(".viewBtn").on('click', function(event)
                    {

                        var Id = $(this).attr('data-Id');
                        var url = '<?php echo $this->webroot;?>testimonials/testimonialdetails/'+Id+'.json';
                        
                        $.ajax(
                            {
                                url:url,
                                type:'post',
                                datatype:'jsonp',
                                success:function(response)
                                {
                                    // console.log(response);
                                    var data = response.testimonial.Testimonial;

                                    bootbox.dialog({
                                            title: "Testimonial",
                                            message:
                                            '<div class="body">'+
                                                '<div>From : '+data.fullname+'</div><br/>'+
                                                '<div>Email : '+data.email+'</div><br/>'+
                                                '<div>Comment : '+data.comment+'</div><br/>'+
                                            '</div>'
                                        }
                                    );
                                }
                            });
                    });

            });
    </script>
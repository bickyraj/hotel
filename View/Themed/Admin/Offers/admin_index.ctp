

<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Offers <small>lists</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Offers Dashboard
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
                                        <th>Title</th>
                                        <!-- <th>Content</th> -->
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($offers)):?>
                                        <?php $n=1; foreach ($offers as $offer):?>

                                            <tr>
                                                <td><?php echo $n++;?></td>
                                                <td><?php echo $offer['Offer']['title'];?></td>
                                                <!-- <td><?php echo $offer['Offer']['content'];?></td> -->
                                                <td>
                                                    <?php echo $this->Html->image('../webroot/files/offer/image/'.$offer['Offer']['image_dir'].'/thumb_'.$offer['Offer']['image'],['alt'=>'gear_img','class'=>'media-object', 'width'=>'200']);?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-xs btn-primary" style="float:left; margin-right:5px;" href="<?php echo $this->webroot.'admin/';?>offerlists/index/<?php echo $offer['Offer']['id'];?>">Offers</a>

                                                    <button class="btn btn-xs btn-success editBtn" data-Id="<?php echo $offer['Offer']['id'];?>" style="float:left; margin-right:5px;">Edit</button>

                                                    <form class="deleteForm" action="<?php echo URL_VIEW.'admin/offers/deleteOffer';?>" method="POST">
                                                        <input type="hidden" value="<?php echo $offer['Offer']['id'];?>" name="data[Offer][id]"/>
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
            <h4 class="modal-title">Add Offer</h4>
        </div>
      <div class="modal-body">
            <?php echo $this->Form->create('Offer', array('type'=>'file','role'=>'form'), array('action'=>'index'));?>

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="data[Offer][title]" required>
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>

                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control mytextarea" rows="3" name="data[Offer][content]"></textarea>
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>

                            <div class="form-group">
                                <?php echo $this->Form->input('Offer.image', array('type' => 'file')); ?>
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
                        var url = '<?php echo $this->webroot;?>offers/offerdetails/'+Id+'.json';
                        
                        $.ajax(
                            {
                                url:url,
                                type:'post',
                                datatype:'jsonp',
                                success:function(response)
                                {
                                    // console.log(response);
                                    var data = response.offer.Offer;

                                    bootbox.dialog({
                                            title: "Edit Offer",
                                            message: '<form action="<?php echo $this->webroot;?>admin/offers/editoffer" role="form" id="OfferAdminIndexForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">'+
                                                            '<input type="hidden" name="data[Offer][id]" value="'+data.id+'">'+
                                                            '<div class="form-group">'+
                                                                '<label>Title</label>'+
                                                                '<input type="text" class="form-control" name="data[Offer][title]" required value="'+data.title+'">'+
                                                            '</div>'+
                                                            '<div class="form-group"><label>Content</label><textarea class="form-control mytextarea" rows="3" name="data[Offer][content]">'+data.content+'</textarea></div>'+

                                                            '<div class="form-group">'+
                                                                '<label>Image</label>'+
                                                                '<img class="media-object" src="<?php echo $this->webroot;?>img/../webroot/files/offer/image/'+data.image_dir+'/thumb_'+data.image+'" alt="" width="200">'+
                                                               
                                                            '</div>'+

                                                            '<div class="form-group">'+
                                                                '<?php echo $this->Form->input("Offer.image", array("type" => "file")); ?>'+
                                                               
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
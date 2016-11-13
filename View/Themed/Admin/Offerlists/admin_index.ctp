<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo $offer['Offer']['title'];?> <small>offer</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> <?php echo $offer['Offer']['title'];?> Dashboard
                            </li>


                        </ol>
                        <a href="<?php echo $this->webroot;?>admin/offers" type="button" class="btn btn-success pull-right">Back</a>

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
                                        <th>offers</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($offerlists)):?>
                                        <?php $n=1; foreach ($offerlists as $offerlist):?>

                                            <tr>
                                                <td><?php echo $n++;?></td>
                                                <td><?php echo $offerlist['Offerlist']['title'];?></td>
                                                <td>
                                                    <button class="btn btn-xs btn-success editBtn" data-Id="<?php echo $offerlist['Offerlist']['id'];?>" style="float:left; margin-right:5px;">Edit</button>

                                                    <form class="deleteForm" action="<?php echo URL_VIEW.'admin/offerlists/deleteofferlist';?>" method="POST">
                                                    	<input type="hidden" name="data[Offerlist][offer_id]" value="<?php echo $offer['Offer']['id'];?>">
                                                        <input type="hidden" value="<?php echo $offerlist['Offerlist']['id'];?>" name="data[Offerlist][id]"/>
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
            <h4 class="modal-title">Add Offers</h4>
        </div>
      <div class="modal-body">
            <?php echo $this->Form->create('Offerlist', array('type'=>'file','role'=>'form'), array('action'=>'index'));?>

            				<input type="hidden" name="data[Offerlist][offer_id]" value="<?php echo $offer['Offer']['id'];?>">
                            <div class="form-group">
                                <label>Offer</label>
                                <input type="text" class="form-control" name="data[Offerlist][title]" required>
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
                        var url = '<?php echo $this->webroot;?>offerlists/offerlistdetails/'+Id+'.json';
                        
                        $.ajax(
                            {
                                url:url,
                                type:'post',
                                datatype:'jsonp',
                                success:function(response)
                                {
                                    // console.log(response);
                                    var data = response.offerlist.Offerlist;

                                    bootbox.dialog({
                                            title: "Edit Offers",
                                            message: '<form action="<?php echo $this->webroot;?>admin/offerlists/editofferlist" role="form" id="OfferAdminIndexForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">'+
                                                            '<input type="hidden" name="data[Offerlist][offer_id]" value="<?php echo $offer["Offer"]["id"];?>">'+
                                                            '<input type="hidden" name="data[Offerlist][id]" value="'+data.id+'">'+
                                                            '<div class="form-group">'+
                                                                '<label>Title</label>'+
                                                                '<input type="text" class="form-control" name="data[Offerlist][title]" required value="'+data.title+'">'+
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
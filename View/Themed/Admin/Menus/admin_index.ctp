

<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Pages <small>lists</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Pages Dashboard
                            </li>


                        </ol>
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($menus)):?>
                                        <?php $n=1; foreach ($menus as $menu):?>

                                            <tr>
                                                <td><?php echo $n++;?></td>
                                                <td><?php echo $menu['Menu']['pages'];?></td>
                                                <td>
                                                    <button class="btn btn-xs btn-success editBtn" data-Id="<?php echo $menu['Menu']['id'];?>" style="float:left; margin-right:5px;">Edit</button>
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
<script>
        $(function()
            {

                $(".editBtn").on('click', function(event)
                    {

                        var Id = $(this).attr('data-Id');
                        var url = '<?php echo $this->webroot;?>menus/menudetails/'+Id+'.json';
                        
                        $.ajax(
                            {
                                url:url,
                                type:'post',
                                datatype:'jsonp',
                                success:function(response)
                                {
                                    // console.log(response);
                                    var data = response.menu.Menu;
                                    var editor_id = "mytextarea_"+data.id;

                                    bootbox.dialog({
                                            title: data.pages,
                                            message: '<form action="<?php echo $this->webroot;?>admin/menus/editmenu" role="form" id="OfferAdminIndexForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">'+
                                                            '<input type="hidden" name="data[Menu][id]" value="'+data.id+'">'+

                                                            '<div class="form-group">'+
                                                                '<label>Description</label>'+
                                                                '<textarea class="form-control mytextarea" id="mytextarea_'+data.id+'" rows="3" name="data[Menu][description]">'+data.description+'</textarea>'+
                                                            '</div>'+
                                                            '<div class="modal-footer"><input type="submit" value="Submit" name="submitEditBtn" class="btn btn-primary" /></div>'+
                                                        '</form>',
                                        }
                                    );
                                tinymce.execCommand('mceRemoveEditor',true,editor_id);
                                tinymce.execCommand('mceAddEditor',true,editor_id);
                                
                                
                                    
                                }
                            });
                    });

            });
    </script>
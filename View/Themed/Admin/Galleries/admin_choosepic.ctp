

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
                        <a href="<?php echo $this->webroot;?>admin/galleries" type="button" class="btn btn-success pull-right">Back</a>
                        <a type="button" id="publicshBtn" class="btn btn-success pull-right" style="margin-right:5px;">Publish</a>
                    </div>
                </div>

                <div class="clearfix"></div><br/>

<div class="row">

<form id="chooseform" action="/neelaya/admin/galleries/choosepic" role="form" id="RoomAdminIndexForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    <?php if(!empty($images)):?>
        <?php $n=0; foreach ($images as $image):?>

        <input type="hidden" name="data[<?php echo $n;?>][Gallery][id]" value="<?php echo $image['Gallery']['id'];?>">
  <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
              <?php echo $this->Html->image('../webroot/files/gallery/image/'.$image['Gallery']['image_dir'].'/thumb_'.$image['Gallery']['image'],['alt'=>'gear_img']);?>
              <div class="caption">
                <!-- <h3>Thumbnail label</h3> -->
               <div class="input-group">
      <span class="">
        <input type="checkbox" aria-label="..." name="data[<?php echo $n;?>][Gallery][status]" <?php echo($image['Gallery']['status']==1)?'checked':'';?>>
      </span>
    </div><!-- /input-group -->
              </div>
            </div>
              </div>

        <?php $n++; endforeach;?>
        <?php else:?>
    <?php endif;?>

    <!-- <input style="display:none;" id="chooseSubmit" type="submit" value="Submit" name="submit" class="btn btn-primary" /> -->
</form>
    

</div>

<script type="text/javascript">

        $(function()
        {
            $("#publicshBtn").click(function(event)
                {
                    $("#chooseform").submit();
                });
        });
</script>


<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Rooms <small>lists</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Rooms Dashboard
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
                                        <th>Bed</th>
                                        <th>Max</th>
                                        <th>Room Size</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($rooms)):?>
                                        <?php $n=1; foreach ($rooms as $room):?>

                                            <tr>
                                                <td><?php echo $n++;?></td>
                                                <td><?php echo $room['Room']['title'];?></td>
                                                <td><?php echo $room['Room']['bed'];?></td>
                                                <td><?php echo $room['Room']['max'];?></td>
                                                <td><?php echo $room['Room']['roomsize'];?></td>
                                                <td><?php echo $room['Room']['price'];?></td>
                                                <td>
                                                    <?php echo $this->Html->image('../webroot/files/room/image/'.$room['Room']['image_dir'].'/thumb_'.$room['Room']['image'],['alt'=>'gear_img','class'=>'media-object', 'width'=>'200']);?>
                                                </td>
                                                <td>
                                                    <form action="<?php echo URL_VIEW.'admin/rooms/deleteRoom';?>" method="POST">
                                                        <input type="hidden" value="<?php echo $room['Room']['id'];?>" name="data[Room][id]"/>
                                                        <input type="submit" name="deleteBtn" class="btn btn-xs btn-danger" value="Delete" />
                                                    </form>
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
            <h4 class="modal-title">Add Rooms</h4>
        </div>
      <div class="modal-body">
            <?php echo $this->Form->create('Room', array('type'=>'file','role'=>'form'), array('action'=>'index'));?>

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="data[Room][title]" required>
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>

                            <div class="form-group">
                                <label>Bed</label>
                                <input type="text" class="form-control" name="data[Room][bed]" required>
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>

                            <div class="form-group">
                                <label>Max</label>
                                <input type="number" class="form-control" name="data[Room][max]" required>
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>

                            <div class="form-group">
                                <label>Room Size</label>
                                <input type="number" class="form-control" name="data[Room][roomsize]" required>
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" class="form-control" name="data[Room][price]" required>
                                <!-- <p class="help-block">Example block-level help text here.</p> -->
                            </div>

                            <div class="form-group">
                                <?php echo $this->Form->input('Room.image', array('type' => 'file')); ?>
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

                $("#addRoomsBtn").on('click', function(event)
                    {
                        $("#addRoomModal").modal("show");
                    });
            });
    </script>
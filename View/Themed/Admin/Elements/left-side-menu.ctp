<?php 
    // echo "<pre>";
    // print_r($roomtypes);
    // print_r($this->params);die();

?>

<ul class="nav navbar-nav side-nav">
                    <li class="<?php echo ($this->params['controller']=='users')?'active':'';?>">
                        <a href="<?php echo $this->webroot;?>admin/users"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="<?php echo ($this->params['controller']=='abouts')?'active':'';?>">
                        <a href="<?php echo $this->webroot.'admin/';?>abouts"><i class="fa fa-fw fa-wrench"></i> About Us</a>
                    </li>

                    <li class="<?php echo ($this->params['controller']=='features')?'active':'';?>">
                        <a href="<?php echo $this->webroot.'admin/';?>features"><i class="fa fa-fw fa-wrench"></i> Hotel Amenities</a>
                    </li>
                    <!-- <li>
                        <a href="<?php echo $this->webroot.'admin/';?>rooms"><i class="fa fa-fw fa-bar-chart-o"></i> Rooms</a>
                    </li> -->
                    <li class="<?php echo ($this->params['controller']=='events')?'active':'';?>">
                        <a href="<?php echo $this->webroot.'admin/';?>events"><i class="fa fa-fw fa-table"></i> Events</a>
                    </li>

                    <li class="<?php echo ($this->params['controller']=='menus')?'active':'';?>">
                        <a href="<?php echo $this->webroot.'admin/';?>menus"><i class="fa fa-fw fa-table"></i> Pages Descriptions</a>
                    </li>

                    <li class="<?php echo ($this->params['controller']=='galleries')?'active':'';?>">
                        <a href="<?php echo $this->webroot.'admin/';?>galleries"><i class="fa fa-fw fa-edit"></i> Galleries</a>
                    </li>

                    <li class="<?php echo ($this->params['controller']=='testimonials')?'active':'';?>">
                        <a href="<?php echo $this->webroot.'admin/';?>testimonials"><i class="fa fa-fw fa-edit"></i> Testimonials</a>
                    </li>

                    <li class="<?php echo ($this->params['controller']=='roomtypes')?'active':'';?>">
                        <a href="<?php echo $this->webroot.'admin/';?>roomtypes"><i class="fa fa-fw fa-desktop"></i> Room Type</a>
                    </li>
                    
                    <li class="<?php echo ($this->params['controller']=='banners')?'active':'';?>">
                        <a href="<?php echo $this->webroot.'admin/';?>banners"><i class="fa fa-fw fa-wrench"></i> Home Page Sliders</a>
                    </li>
                    <li class="<?php echo ($this->params['controller']=='contacts')?'active':'';?>">
                        <a href="<?php echo $this->webroot.'admin/';?>contacts"><i class="fa fa-fw fa-wrench"></i> Contact</a>
                    </li>

                    <li class="<?php echo ($this->params['controller']=='offers')?'active':'';?>">
                        <a href="<?php echo $this->webroot.'admin/';?>offers"><i class="fa fa-fw fa-wrench"></i> Offers</a>
                    </li>
                    
                </ul>
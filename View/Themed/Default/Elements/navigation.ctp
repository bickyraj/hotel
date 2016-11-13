<div class="collapse navbar-collapse" id="main-navigation">
    <ul class="nav navbar-nav navbar-right">
        <li class="<?php echo ($this->name == 'Pages')?'active':'';?>"><a href="<?php echo $this->webroot;?>pages">Home</a></li>
        <li class="dropdown <?php echo ($this->name == 'Abouts')?'active':'';?>">
          <a href="<?php echo $this->webroot;?>abouts">About</a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo $this->webroot;?>events" class="<?php echo ($this->name == 'Events')?'active':'';?>">News & Events</a></li>
                <li><a href="<?php echo $this->webroot;?>galleries" class="<?php echo ($this->name == 'Galleries')?'active':'';?>">Gallery</a></li>
                <li><a href="<?php echo $this->webroot;?>testimonials">Testimonials</a></li>
            </ul>

        </li>

        <li class="dropdown <?php echo ($this->name == 'Roomtypes')?'active':'';?>">
            <a href="<?php echo $this->webroot;?>roomtypes">Rooms</a>
            <ul class="dropdown-menu">
                <?php foreach ($roomtypes as $roomtype):?>
                    <li><a href="<?php echo $this->webroot;?>roomfeatures/index/<?php echo $roomtype['Roomtype']['id'];?>"><?php echo $roomtype['Roomtype']['type'];?></a></li>
                <?php endforeach;?>
            </ul>
        </li>
        <li class="<?php echo ($this->name == 'Offers')?'active':'';?>"><a href="<?php echo $this->webroot;?>offers">Offers</a></li>
        <li><a href="javascript:;" class="checkAvailability">Reservation</a></li>
        <li class="<?php echo ($this->name == 'Contacts')?'active':'';?>"><a href="<?php echo $this->webroot;?>contacts">Contact</a></li>
    </ul>
</div>
<div class="logo-text">Neelaya</div>

<?php echo $this->Html->css('login'); ?>

<div class="login-form">
	<?php echo $this->Form->create('User', array('class'=>array('box', 'login'))); ?>
		<ul>
			<li><h2>Admin Login</h2></li>
			<li><label>Email</label></li>
			<li><input type="text" name="data[User][email]" required/></li>
			<li><label>Password</label></li>
			<li><input type="password" name="data[User][password]" required/></li>
			<li><input type="submit" value="Login" name="login_submit" /></li>
		</ul>
</div>
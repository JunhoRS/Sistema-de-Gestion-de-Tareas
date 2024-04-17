<?php include "app/views/userViews/headerTop.php"; ?>
<link rel="stylesheet" href="<?php echo constant('PUBLIC');?>css/users/iframe0.css">
<?php include "app/views/userViews/headerBottom.php"; 
      include "app/views/userViews/navbars.php"; 
      
      if(!empty($this->selectFile)){
      	foreach($this->selectFile as $row){
			?>
  		<div class="main">
  			<a href='<?php echo constant('URL').'public/files/'.
  			$row['FILE'];?>' class='linkDownload' download>
  				<button class='btnDownload'>
  					Download <i class='fas fa-download'></i>
  				</button>
  			</a>
      	<iframe src="<?php echo constant('PUBLIC').'files/'.
      	$row['FILE'];?>" id="iframe"></iframe>
			</div>
			<?php
      	}
      } else {
      	echo '<h2>File not found!!</h2>';
      } ?>
  
  </body>
  <script src="<?php echo constant('PUBLIC');?>js/users/iframe.js"></script>
  <script src="<?php echo constant('PUBLIC');?>js/users/navbars.js"></script>
</html>
<?php include 'app/views/userViews/headerTop.php'; ?>
<link rel="stylesheet" href="<?php echo constant('PUBLIC');?>css/users/editTask.css">
<?php include 'app/views/userViews/headerBottom.php';
	 		include "app/views/userViews/navbars.php"; ?>
    
    <div class="main">
      <div class="projectDiv">
        <h2>My project</h2>
        <div class="headerContent">
          
          <?php 
          if(!empty($this->selectTask)){
          	foreach($this->selectTask as $row){ ?>
          <div class="task">
            <div class="lineDiv"></div>
            <p class="task-title"><?php echo $row['TITLE'];?></p>
            <p class="task-desc"><?php echo $row['DESCRIPTION'];?></p>

            <div id='filesDiv'>
            	<?php 
            	if(!empty($this->selectFiles)){
            		foreach($this->selectFiles as $file){ ?>
      	      <a href="<?php echo constant('URL').
      	          'iframe/view/'. $file['IDPROJECT'].'/'
      	          .$file['IDTASK'].'/'. $file['ID'];?>">
            	<div class="fileDiv">
              	<p id="fileIcon"></p>
	              <p id="fileInfo"></p>
  	            <p id="fileName"><?php echo $file['FILE'];?></p>
    	        </div></a>
      	    	<?php 
      	    		} 
      	    	} ?>
      	    </div>
          </div>
          <?php } ?>

          <div class="task">
            <form method="post" enctype="multipart/form-data" id="taskForm">
              <div class="inputDiv" id="filesDivAdded">
                <div id="inputfileDiv">
                  <input type='file' name="inputFile" id="idinputfile" class="idinputfile">
                  <label for='idinputfile' class='fileLabel'>
                    <i class="fas fa-upload"></i>
                  </label>
                  <span id="fileName">Add file</span>
                </div>
              </div>
              <input type='hidden' id='idProject' 
              value='<?php echo $this->idProject; ?>'>
              <input type='hidden' id='idTask' 
              value='<?php echo $this->idTask; ?>'>
            
              <p>The maximum size is 3MB !!</p>
            </form>
          </div>
          <?php
          } else {
          	echo '<h2>No results!!</h2>';
          }	?>
        </div>
      </div>
    </div>

  
  </body>
  <script src="<?php echo constant('PUBLIC');?>js/users/navbars.js"></script>
  <script src="<?php echo constant('PUBLIC');?>js/users/addFile.js"></script>
</html>
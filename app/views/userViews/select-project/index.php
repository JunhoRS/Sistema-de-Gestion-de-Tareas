<?php include 'app/views/userViews/headerTop.php'; ?>
<link rel="stylesheet" type='text/css' href="<?php echo constant('PUBLIC');?>css/users/select-list0.css">
<?php include 'app/views/userViews/headerBottom.php';
	 		include "app/views/userViews/navbars.php"; ?>
    
    <div class="main">

      <div class="leftList">

        <div class="projectsDiv">
          <p id="titleLeftList">My Projects</p>
          <ul>
          	<?php foreach($this->selectAll as $row){ ?>
            <a href="<?php echo constant('URL').'select/view/'.$row['ID'];?>"><li>
            	<?php echo $row['TITLE'];?></li></a>
            <?php } ?>
          </ul>
        </div>

      </div> 

      <div class="content">
        <div class="projectDiv">
        <?php
        if(!empty($this->selectProject)){
        	foreach($this->selectProject as $row){ 
        		$percent= $row['PERCENT'];
        		if($row['STATUS']=='Incomplete'){
        			$colorLine= 'progressIncomplete';
        		} else {
        		if($percent<20){ $colorLine= 'progress0'; }
        		else if($percent<40 && $percent>=20){ 
        			$colorLine= 'progress20'; }
        		else if($percent<60 && $percent>=40){ 
        			$colorLine= 'progress40'; }
        		else if($percent<80 && $percent>=60){ 
        			$colorLine= 'progress60'; }
        		else if($percent<100 && $percent>=80){ 
        			$colorLine= 'progress80'; }
        		else if($percent==100){ $colorLine= 'progress100'; }
        		}
        ?>
          <h2><?php echo $row['TITLE'];?></h2>
          <div class="projectContent">
            <div class="actionsDiv">
              <a href="<?php echo constant('URL').'dashboard';?>">
                <button class="actionBtn">
                  Dashboard <i class="far fa-folder"></i>
                </button>
              </a>
              <a href="<?php echo constant('URL').'select/viewTasks/'.$row['ID'];?>">
                <button class="actionBtn">
                  See All <i class="fas fa-list-alt"></i>
                </button>
              </a>
              <a href="<?php echo constant('URL').'newProject';?>">
                <button class="actionBtn">
                  Add Project <i class="fas fa-folder-plus"></i>
                </button>
              </a>
              <button class="actionBtn" id='btnModalDelete'>
                Delete Project <i class="fas fa-trash-alt"></i>
              </button>
              <a href="<?php echo constant('URL').'select/completedProject/'.$row['ID'];?>">
                <button class="actionBtn">
                  Completed <i class="fas fa-check"></i>
                </button>
              </a>
              <a href="#form">
                <button class="actionBtn" id="formTaskBtn">
                  Add Task <i class="fas fa-plus"></i>
                </button>
              </a>
            </div>

            <div class="lineDiv"></div>
            <p class="progress-title">Your progress:</p>
            <div class="progressLine">
              <div id="progress-bar" class='<?php echo $colorLine; ?>' style='width: <?php echo $percent;?>%;'></div>
              <div class="percent"><?php echo $percent;?>%</div>
            </div>
            <div class="progress-title">Statement: 
            <p id="statementText" class='<?php echo $row['STATUS'];?>Return'>
            	<?php echo $row['STATUS'];?></p></div>
            <div class="lineDiv"></div>

            <div class="tasks" id="tasksDiv">
	            <p class="delivery-date">Delivery date: 
                <i class="fas fa-calendar-alt"></i>
	            	<?php echo $row['DELIVDATE'];?>
	            </p>
              <br>
              <h3>Pending tasks: </h3>
              <?php 
              if(!empty($this->selectTasks)){
              	foreach($this->selectTasks as $task){ 
              ?>
              <div class="task">
	              <div class="lineDiv"></div>
  	            <p class="task-title"><?php echo $task['TITLE'];?></p>
    	          <p class="task-desc"><?php echo $task['DESCRIPTION'];?></p>

      	        <?php 
      	        $filesRows= $this->model->selectFilesAll($task['ID']);
      	        if(!empty($filesRows)){
      	          foreach($filesRows as $file){ ?>
      	        <a href="<?php echo constant('URL').
      	          'iframe/view/'. $file['IDPROJECT'].'/'
      	          .$file['IDTASK'].'/'. $file['ID'];?>">
      	        <div class="fileDiv">
        	        <p id="fileIcon"></p>
          	      <p id="fileInfo"></p>
            	    <p id="fileName"><?php echo $file['FILE'];?></p>
              	</div><?php 
              	  } 
              	} ?></a>
      	        <p class="completBtns">Completed: 
            	    <a href='<?php echo constant('URL').'select/completedTask/'.$task['IDPROJECT'].'/'. $task['ID'];?>'>
            	    	<button><i class="fas fa-check"></i>
            	    	</button>
            	    </a>
          	    </p>
        	      <a href="<?php echo constant('URL').'addFiles/view/'.$task['IDPROJECT'].'/'.$task['ID'];?>">
      	          <button class="btnAddTask">Add File</button>
    	          </a>
  	          </div>
  	          <?php 
                }
        			} else {
        				echo '<h2>No results!</h2>';
        			} 
  	          ?>
		         </div>
            
            <div id="formTasksDiv">
              <div class="lineDiv"></div>
              <h3>Add Task:</h3>
              <form class="formDiv" method="post"
               enctype="multipart/form-data" id="taskForm">
                <div class="inputDiv">
                  <input type="text" id="task-title"
                  placeholder="Title">
                </div>

                <div class="inputDiv">
                  <textarea id="task-description" 
                  placeholder="Description"></textarea>
                </div>

                <div class="inputDiv">
                  <input type="button" id="btnSendTask" value="send">
                </div>
                
                <p id="errorLine"></p>
                <input type="hidden" id="idProject" 
                value="<?php echo $row['ID'];?>">
              </form>
            </div>

            <hr id="form" class="hrForm">

						<div id="myModal" class="modal">
  						<div class="modal-content">
    						<span class="close closeIcon">&times;</span>
    						<h1 class="modal-content_text">
    							Delete <?php echo $row['TITLE'];?>
    						</h1>
    						<h2 class="modal-content_text">
    							Are you sure?
    						</h2>
    						<a class="modal-content_link" href="<?php echo constant('URL').'select/delete/'.$row['ID'];?>">Delete</a>
    						<button class="close modal-content_btn">Cancel</button>
  						</div>
						</div>
          
          </div>
          
        <?php 
          }
        } else {
          echo '<h2> No results! </h2>';
        } ?>
        </div>
	  	</div>
      
		</div>

  
  </body>
  <script src="<?php echo constant('PUBLIC');?>js/users/select-project1.js"></script>
  <script src="<?php echo constant('PUBLIC');?>js/users/navbars.js"></script>
</html>
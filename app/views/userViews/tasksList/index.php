<?php include 'app/views/userViews/headerTop.php'; ?>
<link rel="stylesheet" type='text/css' href="<?php echo constant('PUBLIC');?>css/users/listTasks.css">
<?php include 'app/views/userViews/headerBottom.php';
	 		include "app/views/userViews/navbars.php"; 

		if(!empty($this->selectProject)){  ?>

    <header>
      <div class="projectDiv">
        <h2>My project</h2>
        <div class="headerContent">
        <?php
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
          
          <div class="lineDiv"></div>

          <p class="progress-title"><?php echo $row['TITLE'];?></p>
          <div class="progressLine">
            <div class="progress <?php echo $colorLine;?>"
            style="width: <?php echo $percent;?>%;"></div>
            <div class="percent"><?php echo $percent;?>%</div>
          </div>
          <div class="progress-title">Statement: 
            <p id="statementText" class='<?php echo $row['STATUS'];?>Return'>
            	<?php echo $row['STATUS'];?></p>
          </div>
          <div class="lineDiv"></div>
          <div class="dateDiv">
	        <p class="delivery-date">Delivery date: 
            <i class="fas fa-calendar-alt"></i>
	        <?php echo $row['DELIVDATE'];?></p>
          </div>

        </div>
        <?php } ?>
      </div>
    </header>

    <div class="main">

      <div class="pendingDiv">
        <div class="tasksDiv">
          <h3>In progress</h3>
          <div class="tasksList">
            <ul>
            	<li><p class="progressLineTask"
              id="pendingLine"></p></li><?php
            if(!empty($this->selectPending)){
              foreach($this->selectPending as $task){ ?>
              <li>
                <p class="titleTask">
                	<?php echo $task['TITLE'];?>
                </p>
                <p class="descTask">
                	<?php echo $task['DESCRIPTION'];?>
                </p>
                <?php 
      	        $filesRows= $this->model->selectFilesAll($task['ID']);
      	        if(!empty($filesRows)){
      	          foreach($filesRows as $file){ ?>
                <p class="fileTask">
                	<i class="far fa-file"></i>
                	<?php echo $file['FILE'];?>
                </p>
                <?php
                  }
                } ?>
              </li>
            <?php
              }
            } else {
            	echo '<h4 style="margin: 7px;">No results!</h4>';
            }
            ?>
            </ul>
          </div>
        </div>
      </div>
      
      <div class="completedDiv">
        <div class="tasksDiv">
          <h3>Completed</h3>
          <div class="tasksList">
            <ul>
              <li><p class="progressLineTask"
              id="completedLine"></p></li><?php
            if(!empty($this->selectCompleted)){
              foreach($this->selectCompleted as $task){ ?>
              <li>
                <p class="titleTask">
                	<?php echo $task['TITLE'];?>
                </p>
                <p class="descTask">
                	<?php echo $task['DESCRIPTION'];?>
                </p>
                <?php
      	        $filesRows= $this->model->selectFilesAll($task['ID']);
      	        if(!empty($filesRows)){
      	          foreach($filesRows as $file){ ?>
                <p class="fileTask">
                	<i class="far fa-file"></i>
                	<?php echo $file['FILE'];?>
                </p>
                <?php
                  }
                } ?>
              </li>
            <?php
              }
            } else {
            	echo '<h4 style="margin: 7px;">No results!</h4>';
            }
            ?>
            </ul>
          </div>
        </div>
      </div>
      
      <div class="incompleteDiv">
        <div class="tasksDiv">
          <h3>Incomplete</h3>
          <div class="tasksList">
            <ul>
              <li><p class="progressLineTask"
              id="incompleteLine"></p></li><?php
            if(!empty($this->selectIncomplete)){
              foreach($this->selectIncomplete as $task){ ?>
              <li>
                <p class="titleTask">
                	<?php echo $task['TITLE'];?>
                </p>
                <p class="descTask">
                	<?php echo $task['DESCRIPTION'];?>
                </p>
                <?php 
      	        $filesRows= $this->model->selectFilesAll($task['ID']);
      	        if(!empty($filesRows)){
      	          foreach($filesRows as $file){ ?>
                <p class="fileTask">
                	<i class="far fa-file"></i>
                	<?php echo $file['FILE'];?>
                </p>
                <?php
                  }
                } ?>
              </li>
            <?php
              }
            } else {
            	echo '<h4 style="margin: 7px;">No results!</h4>';
            }
            ?>
            </ul>
          </div>
        </div>
      </div>

    </div>

		<?php
		} else { ?>
      <div class="projectDiv">
        <h2>My project</h2>
        <div class="headerContent">
        	<h2>No results!</h2>
        </div>
      </div>
        	
    <?php }	?>
  
  </body>
  <script src="<?php echo constant('PUBLIC');?>js/users/navbars.js"></script>
</html>
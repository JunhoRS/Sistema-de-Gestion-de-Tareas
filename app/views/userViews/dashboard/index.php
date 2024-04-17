<?php include 'app/views/userViews/headerTop.php'; ?>
<link rel="stylesheet" href="<?php echo constant('PUBLIC');?>css/users/dashboard.css">
<?php include 'app/views/userViews/headerBottom.php';
	 		include "app/views/userViews/navbars.php"; ?>
 
    <div class="main">

      <div class="pendingDiv">
        <div class="projectsDiv">
          <h3>In progress</h3>
          <div class="tasksDiv">
            <ul>
              <li class="progressLine" id="pendingLine"></li>
              <?php 
              if(!empty($this->selectPending)){
              	foreach($this->selectPending as $row){
              ?>
              <a href="<?php echo constant('URL').'select/view/'.$row['ID'];?>"><li><?php echo $row['TITLE'];?></li></a>
              <?php 
                }
              } else {
                echo '<a href=""><li><b>No results!!</b></li></a>';
              } ?>
            </ul>
          </div>
        </div>
      </div>
      
      <div class="completedDiv">
        <div class="projectsDiv">
          <h3>Completed</h3>
          <div class="tasksDiv">
            <ul>
              <li class="progressLine" id="completedLine"></li>
              <?php 
              if(!empty($this->selectCompleted)){
              	foreach($this->selectCompleted as $row){
              ?>
              <a href="<?php echo constant('URL').'select/view/'.$row['ID'];?>"><li><?php echo $row['TITLE'];?></li></a>
              <?php 
                }
              } else {
                echo '<a href=""><li><b>No results!!</b></li></a>';
              } ?>
            </ul>
          </div>
        </div>
      </div>
      
      <div class="incompleteDiv">
        <div class="projectsDiv">
          <h3>Incomplete</h3>
          <div class="tasksDiv">
            <ul>
              <li class="progressLine" id="incompleteLine"></li>
              <?php 
              if(!empty($this->selectIncomplete)){
              	foreach($this->selectIncomplete as $row){
              ?>
              <a href="<?php echo constant('URL').'select/view/'.$row['ID'];?>"><li><?php echo $row['TITLE'];?></li></a>
              <?php 
                }
              } else {
                echo '<a href=""><li><b>No results!!</b></li></a>';
              } ?>
            </ul>
          </div>
        </div>
      </div>

    </div>

  
  </body>
  <script src="<?php echo constant('PUBLIC');?>js/users/navbars.js"></script>
</html>
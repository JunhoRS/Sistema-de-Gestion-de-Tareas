<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?php echo constant('PUBLIC');?>css/users/newProject.css">
    <link rel="stylesheet" href="<?php echo constant('PUBLIC');?>css/users/styles0.css">
    <script src="<?php echo constant('PUBLIC');?>js/icons.js"></script>

    <title>Projects App</title>
  </head>
  <body>
    
    <?php include "app/views/userViews/navbars.php"; ?>
    
    <div class="main">

      <div class="projectDiv">
        <h2>Add Project</h2>
        <div class="headerContent">

          <form action="<?php echo constant('URL').'newProject/addNew';?>" method="post">
            <div class="formDiv">
              <input type="text" placeholder="Project Title" name="title">
            </div>
            <div class="formDiv">
              <textarea placeholder="Project Description" name="desc"></textarea>
            </div>
            <div class="formDiv" id="dateDiv">
              <p class="dateTitle">Date of delivery:</p>
              <select name="year">
                <option value="0">Year</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
              </select>
        
              <select name="month">
                <option value="0">Month</option>
                <?php
                $months= ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        
                for($i = 0; $i < 12; $i++){
                  $v= $i + 1;
        
                  print "<option value='".$v."'>
                  ".$months[$i]."</option>";
                }
                ?>
              </select>
        
              <select name="day">
                <option value="0">Day</option>
                <?php
                for($i = 1; $i <= 31; $i++){ ?>
                  <option value='<?php echo $i ?>'>
                  <?php echo $i; ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="formDiv">
              <input type="submit" value="Save" name='saveSubmit'>
            </div>
          </form>

        </div>
      </div>

    </div>

  
  </body>
  <script src="<?php echo constant('PUBLIC');?>js/users/navbars.js"></script>
</html>
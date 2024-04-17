  
  <div class="resultsValid">
    <p><b>Name: </b><?php echo $names; ?></p>
    <p><b>Surname: </b><?php echo $surnames; ?></p>
    <p><b>Username: </b><?php echo $username; ?></p>
  </div>
  <div style="display:none;">
    <input type="text" name="names" 
     value="<?php echo $names; ?>">
    <input type="text" name="surnames" 
     value="<?php echo $surnames; ?>">
    <input type="text" name="username" 
     value="<?php echo $username; ?>">
    <input type="text" name="password" 
     value="<?php echo $pass; ?>">
    <input type="hidden" name="checkAccess" value="TRUE">
  </div>
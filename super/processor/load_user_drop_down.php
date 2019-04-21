<?php
        require_once '../patch/function.php';
         require_once '../patch/db.inc.php';
  //fetching the positions
  $sql = "SELECT c_id,last_name,first_name FROM candidate";
    $result = query($sql);
  ?>
        <option value="">SELECT CANDIDATE </option>
        <?php
          while ($all_data = mysqli_fetch_assoc($result)): ?>
        <option value="<?php echo display_DB($all_data['c_id']); ?>">
         <?php echo display_DB($all_data['last_name']). " ". display_DB($all_data['first_name']) ?></option>
                <?php endwhile; ?>

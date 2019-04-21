<?php
        require_once '../patch/function.php';
         require_once '../patch/db.inc.php';
  //fetching the positions
  $sql = "SELECT position,pos_id FROM positions";
    $result = query($sql);
  ?>
        <option value="">SELECT POSITION FOR USER</option>
        <?php
          while ($all_data = mysqli_fetch_assoc($result)): ?>
     <option value="<?php echo database_clean($all_data['pos_id']); ?>">
         <?php echo database_clean($all_data['position'])?></option>
                <?php endwhile; ?>

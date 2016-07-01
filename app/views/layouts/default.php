
            <h3>Select One Operation</h3>
            <form action="index.php" method="POST">
            <input type="text" name="field" value="<?php echo $field;?>" style="display: none;"/>
            <button name="operation" type="submit" value="create">Add</button>
            <button name="operation" type="submit" value="list">Read</button>
            <button name="operation" type="submit" value="update">Update</button>
            <button name="operation" type="submit" value="delete">Delete</button><br>
            </form>
        <?php
        /**
        * This provides the the basic selection of Professions and Operations
        */
        //$field is used for setting field like student, teacher or course
        
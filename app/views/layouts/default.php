            <h3>Welcome to Default Page<br>
            Select one of the Entity and then Select One Action</h3>
            <form action="index.php" method="POST">
            <input name="entity" type="radio" value="Student">Student</input>
            <input name="entity" type="radio" value="Teacher">Teacher</input>
            <input name="entity" type="radio" value="Course">Course</input><br><br>
            <button name="action" type="submit" value="create">Add</button>
            <button name="action" type="submit" value="list">Read</button>
            <button name="action" type="submit" value="update">Update</button>
            <button name="action" type="submit" value="delete">Delete</button><br>
            </form>
        <?php
        /**
        * This provides the the basic selection of Professions and Operations
        */
        //$attribute is used for setting attribute like student, teacher or course
        
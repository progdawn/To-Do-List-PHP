<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="images/favicon.ico">
        <title>To Do List</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/main.css" rel="stylesheet">
    </head>
    
    <body>
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="get_todo.php">View List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="new_task.php">Add Task</a>
                    </li>
                </ul>
            </div>
        </nav>
        
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                  
                        <?php
                            require_once("connect.php");

                            if(!(empty($_POST['description'])))
                            {        
                                $description = mysqli_real_escape_string($conn, trim($_REQUEST['description']));
                                $status= mysqli_real_escape_string($conn, trim($_REQUEST['status']));
                                $priority = mysqli_real_escape_string($conn, trim($_REQUEST['priority']));
                                $sql= "INSERT INTO todo(description, status, priority) VALUES ('" . $description . "'," .
                                                                    "'" . $status . "'," .
                                                                    "'" . $priority . "')";
                                if ($conn->query($sql) == false) 
                                {
                                    $errmsg = 'Wrong SQL: ' . $sql . ' Error: ' . $conn->error;
                                    trigger_error($errmsg, E_USER_ERROR);
                                }
                                else
                                {
                                    $last_inserted_id = $conn->insert_id;
                                    $affected_rows = $conn->affected_rows;
                                    echo('<h2 class="display-4">Task added!</h2>');
                                    echo('<br />Last inserted Id: ' . $last_inserted_id);
                                    echo('<br />Affected rows: ' . $affected_rows . '<br />');
                                    echo("Task successfully added to the database.");                                    
                                    echo("SQL statement: " . $sql);
                                    exit();
                                }
                            }else {
                                echo('<h2 class="display-4">Failed to enter task</h2>');
                                echo("Description is required");
                            }
                        ?> 
                    </div>
                </div>
            </div>
        </section>
        <script src="../js/jquery-3.3.1.min.js"></script>
		<script src="../js/popper.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/main.js"></script>
    </body>
</html>
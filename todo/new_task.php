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
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Add Task <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    
       <section>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <h2 class="display-4">Add a new task</h2>
                        <form class="container" action="insert_process.php" method="post">
                               <div class="form-group col-md-6">
                                  <label for="description">Description</label>
                                   <input type="text" class="form-control" name="description" aria-describedby="description-help" placeholder="Enter description" value="<?php if(isset($_POST['description'])) echo $_POST['description']; ?>" required>
                                   <small id="description-help" class="form-text text-muted">What do you want to do?</small>
                               </div>
                               <div class="form-group col-md-2">
                                   <label for="status">Status</label>
                                   <select id="status" name="status" class="d-block w-100 form-control" aria-describedby="status-help">
                                        <option value="Not Started" selected>Not Started</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Complete">Completed</option>
                                        <option value="Cancelled">Cancelled</option>
                                    </select>
                                    <small id="status-help" class="form-text text-muted">How's it coming along?</small>
                               </div>
                               <div class="form-group col-md-2">
                                   <label for="priority">Priority</label>
                                   <select id="priority" name="priority" class="d-block w-100 form-control" aria-describedby="priority-help">
                                        <option value="High" selected>High</option>
                                        <option value="Normal" selected>Normal</option>
                                        <option value="Low">Low</option>
                                    </select>
                                    <small id="priority-help" class="form-text text-muted">How important is it?</small>
                               </div>
                            <input type="submit" value="Save Entry" />
                        </form>
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
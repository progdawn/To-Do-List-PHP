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
       <?php
            require_once 'connect.php';
        
            //number of records per page
            $display = 2;
        
            //determine number of pages
            if(isset($_GET['p']) && is_numeric($_GET['p'])){
                $pages = $_GET['p'];
            }else {
                //count records in database
                $q = "SELECT COUNT(id) FROM todo";
                $r = @mysqli_query($conn, $q);
                $row = @mysqli_fetch_array($r, MYSQLI_NUM);
                $records = $row[0];
                
                //calculate number of pages
                if($records > $display){
                    $pages = ceil($records/$display);
                }else {
                    $pages = 1;
                }
            }
        
            //determine starting point in database
            if(isset($_GET['s']) && is_numeric($_GET['p'])){
                $start = $_GET['s'];
            }else {
                $start = 0;
            }
        
            //sorting the columns
            $sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'priority';
        
            switch($sort){
                case 'description':
                    $order_by = "description ASC";
                    break;
                case 'status':
                    $order_by = "status ASC";
                    break;
                case 'priority':
                    $order_by = "priority ASC";
                    break;
                default:
                    $order_by = "priority ASC";
                    $sort = 'priority';
                    break;
            }
        ?>       
       
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">View List <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="new_task.php">Add Task</a>
                    </li>
                </ul>
            </div>
        </nav>
        
        <section>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <h2 class="display-4">To Do</h2>
                        <?php

                            $q = "SELECT * FROM todo LIMIT $start, $display";
        
                            $r = @mysqli_query($conn, $q);
        
                            $num = mysqli_num_rows($r);
                        
                            //$sql = "SELECT * FROM todo";
                            //$result = $conn->query($sql);

                            //if($result == false)
                            //    trigger_error('Wrong SQL:' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
                            //else
                            //{
                            //    echo('<table class="table">
                            //        <thead>
                            //            <tr>
                            //                <th scope="col">Description</th>
                            //                <th scope="col">Status</th>
                            //                <th scope="col">Priority</th>
                            //            </tr>
                            //        </thead>
                            //        <tbody>');
                            //        while($arr = $result->fetch_array(MYSQLI_ASSOC))
                            //        {
                            //            echo "<tr>";
                            //                echo "<td>" . $arr['description'] . "</td>";
                            //                echo "<td>" . $arr['status'] . "</td>";
                            //                echo "<td>" . $arr['priority'] . "</td>";
                            //            echo "</tr>";
                            //        }
                            //        echo "</tbody>";
                            //    echo "</table>";
                            //}
                            //mysqli_close($conn);
                        
                            if($r == false)
                                trigger_error('Wrong SQL:' . $q . ' Error: ' . $conn->error, E_USER_ERROR);
                            else {
                                if($num > 0){
                                 echo('<table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Description</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Priority</th>
                                        </tr>
                                    </thead>
                                    <tbody>');
                                    
                                    while($row = mysqli_fetch_array($r))
                                    {
                                        echo "<tr>";
                                            echo "<td>" . $row['description'] . "</td>";
                                            echo "<td>" . $row['status'] . "</td>";
                                            echo "<td>" . $row['priority'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";
                                    echo "</table>";
                                }else {
                                    echo"<p>No records were returned</p>";
                                }
                            }
                        
                            if($pages > 1){
                                
                                $current_page = ($start/$display) + 1;
                                
                                if($current_page != 1){                                    
                                    echo('<a href="get_todo.php?s=' . ($start - $display) . '&p=' . $pages . '&sort=' . $sort . '">Previous </a>');
                                }else {
                                    echo "Previous";
                                }
                                
                                for($i = 1; $i <= $pages; $i++){
                                    if($i != $current_page){
                                        echo('<a href="get_todo.php?s=' . ($display * ($i - 1)) . '&p=' . $pages . '&sort=' . $sort . '">' . $i . '</a>');
                                    }else {
                                        echo($i . ' ');
                                    }
                                }
                                
                                if($current_page != $pages){
                                    echo('<a href="get_todo.php?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort . '">Next</a>');
                                }else {
                                    echo "Next";
                                }
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









































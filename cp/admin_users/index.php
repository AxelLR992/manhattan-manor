<?php
    include_once '../app_includes/check_login.php';
    include_once '../app_includes/db_connect.php';
    if ($_SESSION['usr_level'] !== "admin") {
        include_once '../app_includes/db_close.php';  
        header('Location: ../login/rejected.php?c=Permission denied to access this content.');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Netvision Control Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- Data Tables -->
    <link href="../css/jquery.dataTables.css" rel="stylesheet" type="text/css">
    



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>
    
    <!-- Data Tables -->
    <script src="../js/jquery.dataTables.js"></script>   
    <script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
    $('#list_users').DataTable({
    "scrollX": true,
    "order": []
    });
} );


    </script>
    
    <script src="../js/jquery.colorbox.js"></script>
    <link rel="stylesheet" href="../css/colorbox.css" />    
		<script>
			$(document).ready(function(){
				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
			});
		</script>    

</head>

<body>

    <div id="wrapper">
<?php
    include_once '../layout_inc/navigation.php';
?>
        <div id="page-wrapper">

            <div class="container-fluid">
<?php
// Count table records

$sql = "SELECT count(*) as rec_count FROM users_cp";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
$rc=$row['rec_count'];
$result->close;
$row->close;
?>  
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-md-6 col-sm-6 col-xs-12" style="padding-left: 10px; padding-right: 10px; padding-top: 10px; padding-bottom: 10px;">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-2x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div><b><?php echo $rc ?></b> Users</div>
                                    </div>
                                </div>
                            </div>
                                <div class="panel-footer">
                                    <span class="pull-left"><b>List Records</b></span>
                                    <span class="pull-right">Add&nbsp;&nbsp;<a href="input.php"><i class="fa fa-plus-circle"></i></a></span>
                                    <div class="clearfix"></div>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                
                <!-- recordset -->
                <div class="row">
                    <div class="col-lg-12">
                        <table id="list_users" class="display" width="98%">
                            <thead>
                                <tr>
                                    <th>recordid</th>
                                    <th>firstname</th>
                                    <th>lastname</th>
                                    <th>user name</th>
                                    <th>user level</th>
                                    <th>status</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
<?php
// Query list records
$mysqli->query("SET NAMES 'utf8'");
$sql = "SELECT recordid, firstname, lastname, user_name, user_password, user_level, status FROM users_cp order by last_modified desc";
$result = $mysqli->query($sql);
$i=0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

?>                                
                                <tr>
                                    <td><?php echo $row["recordid"];?></td>                                    
                                    <td><?php echo $row["firstname"];?></td>
                                    <td><?php echo $row["lastname"];?></td>
                                    <td><?php echo $row["user_name"];?></td>
                                    <td><?php echo $row["user_level"];?></td>
                                    <td><?php echo $row["status"];?></td>
                                    <td><a href="details.php?rid=<?php echo $row["recordid"];?>"><i class="fa fa-fw fa-search-plus"></i></a></td>                                    
                                    <td><a href="edit.php?rid=<?php echo $row["recordid"];?>"><i class="fa fa-fw fa-edit"></i></a></td>
                                    <td><a href="delete.php?rid=<?php echo $row["recordid"];?>" onclick="return confirm('This record will be deleted. Proceed?')"><i class="fa fa-fw fa-close"></i></a></td>
                                </tr>
<?php
    }
}
$result->close;
$row->close;
include_once '../app_includes/db_close.php';
?>                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /recordset -->                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->



</body>

</html>

<?php
require_once('config.php');
require_once('helpers.php');
require_once('config-tables-columns.php');

session_start();
$user_id = $_SESSION['user_id'];



// Check existence of id parameter before processing further
$_GET["edu_id"] = trim($_GET["edu_id"]);
if(isset($_GET["edu_id"]) && !empty($_GET["edu_id"])){
    // Prepare a select statement
    $sql = "SELECT `education`.* 
            FROM `education` 
			LEFT JOIN `users` AS `user_idusers` ON `user_idusers`.`id` = `education`.`user_id`
            WHERE `education`.`edu_id` = ?
            GROUP BY `education`.`edu_id`;";

    if($stmt = mysqli_prepare($link, $sql)){
        // Set parameters
        $param_id = trim($_GET["edu_id"]);

        // Bind variables to the prepared statement as parameters
		if (is_int($param_id)) $__vartype = "i";
		elseif (is_string($param_id)) $__vartype = "s";
		elseif (is_numeric($param_id)) $__vartype = "d";
		else $__vartype = "b"; // blob
        mysqli_stmt_bind_param($stmt, $__vartype, $param_id);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }

        } else{
            echo translate('stmt_error') . "<br>".$stmt->error;
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php translate('View Record') ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<style>
        .custom-bg-color{
            background-color:#E6DFFC;
        }
        .custom-text-color{
            color:#815DF2;
        }
    </style>
</head>
<?php require_once('navbar.php'); ?>
<body>
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="page-header">
                        <h1><?php translate('View Record') ?></h1>
                    </div>

                    									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['education']["columns"]['user_id']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['education']["columns"]['user_id']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['education']["columns"]['user_id']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['user_id']) .'" target="_blank" class="uploaded_file" id="link_user_id">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>user_id</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?> <?php echo $user_id; ?> <?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['education']["columns"]['name']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['education']["columns"]['name']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['education']["columns"]['name']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['name']) .'" target="_blank" class="uploaded_file" id="link_name">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>Institute Name</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["name"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['education']["columns"]['degree']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['education']["columns"]['degree']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['education']["columns"]['degree']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['degree']) .'" target="_blank" class="uploaded_file" id="link_degree">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>Degree </h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["degree"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['education']["columns"]['city']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['education']["columns"]['city']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['education']["columns"]['city']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['city']) .'" target="_blank" class="uploaded_file" id="link_city">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>City</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["city"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['education']["columns"]['start_date']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['education']["columns"]['start_date']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['education']["columns"]['start_date']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['start_date']) .'" target="_blank" class="uploaded_file" id="link_start_date">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>Started</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo convert_date($row["start_date"]); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['education']["columns"]['end_date']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['education']["columns"]['end_date']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['education']["columns"]['end_date']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['end_date']) .'" target="_blank" class="uploaded_file" id="link_end_date">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>Ended</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo convert_date($row["end_date"]); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['education']["columns"]['description']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['education']["columns"]['description']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['education']["columns"]['description']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['description']) .'" target="_blank" class="uploaded_file" id="link_description">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>Description</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo nl2br(htmlspecialchars($row["description"] ?? "")); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>
                    <hr>
                    <p>
                        <a href="education-update.php?edu_id=<?php echo $_GET["edu_id"];?>" class="btn btn-warning"><?php translate('Update Record') ?></a>
                        <a href="education-delete.php?edu_id=<?php echo $_GET["edu_id"];?>" class="btn btn-danger"><?php translate('Delete Record') ?></a>
                        <a href="education-create.php" class="btn btn-success"><?php translate('Add New Record') ?></a>
                        <a href="education-index.php" class="btn btn-primary"><?php translate('Back to List') ?></a>
                    </p>
                    <?php
                    

                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </body>
</html>
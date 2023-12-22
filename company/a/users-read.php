<?php
require_once('config.php');
require_once('helpers.php');
require_once('config-tables-columns.php');

// Check existence of id parameter before processing further
$_GET["id"] = trim($_GET["id"]);
if(isset($_GET["id"]) && !empty($_GET["id"])){
    // Prepare a select statement
    $sql = "SELECT `users`.* 
            FROM `users` 
            WHERE `users`.`id` = ?
            GROUP BY `users`.`id`;";

    if($stmt = mysqli_prepare($link, $sql)){
        // Set parameters
        $param_id = trim($_GET["id"]);

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
									// print_r($tables_and_columns_names['users']["columns"]['name']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['users']["columns"]['name']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['users']["columns"]['name']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['name']) .'" target="_blank" class="uploaded_file" id="link_name">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>name*</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["name"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['users']["columns"]['user_name']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['users']["columns"]['user_name']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['users']["columns"]['user_name']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['user_name']) .'" target="_blank" class="uploaded_file" id="link_user_name">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>user_name</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["user_name"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['users']["columns"]['email']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['users']["columns"]['email']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['users']["columns"]['email']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['email']) .'" target="_blank" class="uploaded_file" id="link_email">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>email*</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["email"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['users']["columns"]['email_verified_at']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['users']["columns"]['email_verified_at']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['users']["columns"]['email_verified_at']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['email_verified_at']) .'" target="_blank" class="uploaded_file" id="link_email_verified_at">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>email_verified_at</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["email_verified_at"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['users']["columns"]['password']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['users']["columns"]['password']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['users']["columns"]['password']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['password']) .'" target="_blank" class="uploaded_file" id="link_password">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>password*</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["password"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['users']["columns"]['role']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['users']["columns"]['role']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['users']["columns"]['role']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['role']) .'" target="_blank" class="uploaded_file" id="link_role">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>role*</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["role"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['users']["columns"]['status']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['users']["columns"]['status']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['users']["columns"]['status']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['status']) .'" target="_blank" class="uploaded_file" id="link_status">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>status*</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["status"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['users']["columns"]['remember_token']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['users']["columns"]['remember_token']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['users']["columns"]['remember_token']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['remember_token']) .'" target="_blank" class="uploaded_file" id="link_remember_token">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>remember_token</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["remember_token"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['users']["columns"]['created_at']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['users']["columns"]['created_at']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['users']["columns"]['created_at']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['created_at']) .'" target="_blank" class="uploaded_file" id="link_created_at">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>created_at</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["created_at"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['users']["columns"]['updated_at']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['users']["columns"]['updated_at']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['users']["columns"]['updated_at']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['updated_at']) .'" target="_blank" class="uploaded_file" id="link_updated_at">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>updated_at</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["updated_at"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['users']["columns"]['DOB']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['users']["columns"]['DOB']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['users']["columns"]['DOB']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['DOB']) .'" target="_blank" class="uploaded_file" id="link_DOB">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>DOB*</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo convert_datetime($row["DOB"]); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['users']["columns"]['LastLogin']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['users']["columns"]['LastLogin']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['users']["columns"]['LastLogin']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['LastLogin']) .'" target="_blank" class="uploaded_file" id="link_LastLogin">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>LastLogin</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo convert_datetime($row["LastLogin"]); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['users']["columns"]['address']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['users']["columns"]['address']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['users']["columns"]['address']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['address']) .'" target="_blank" class="uploaded_file" id="link_address">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>address*</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["address"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['users']["columns"]['profile_picture']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['users']["columns"]['profile_picture']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['users']["columns"]['profile_picture']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['profile_picture']) .'" target="_blank" class="uploaded_file" id="link_profile_picture">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>profile_picture*</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["profile_picture"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['users']["columns"]['designation']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['users']["columns"]['designation']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['users']["columns"]['designation']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['designation']) .'" target="_blank" class="uploaded_file" id="link_designation">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>designation</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo nl2br(htmlspecialchars($row["designation"] ?? "")); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['users']["columns"]['about']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['users']["columns"]['about']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['users']["columns"]['about']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['about']) .'" target="_blank" class="uploaded_file" id="link_about">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>about*</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["about"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['users']["columns"]['phone']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['users']["columns"]['phone']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['users']["columns"]['phone']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['phone']) .'" target="_blank" class="uploaded_file" id="link_phone">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>phone*</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["phone"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['users']["columns"]['tagline']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['users']["columns"]['tagline']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['users']["columns"]['tagline']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['tagline']) .'" target="_blank" class="uploaded_file" id="link_tagline">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>tagline</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["tagline"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['users']["columns"]['cv']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['users']["columns"]['cv']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['users']["columns"]['cv']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['cv']) .'" target="_blank" class="uploaded_file" id="link_cv">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>cv</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["cv"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['users']["columns"]['Nationality']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['users']["columns"]['Nationality']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['users']["columns"]['Nationality']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['Nationality']) .'" target="_blank" class="uploaded_file" id="link_Nationality">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>Nationality*</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["Nationality"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['users']["columns"]['Freelance']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['users']["columns"]['Freelance']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['users']["columns"]['Freelance']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['Freelance']) .'" target="_blank" class="uploaded_file" id="link_Freelance">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>Freelance</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["Freelance"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['users']["columns"]['map_location']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['users']["columns"]['map_location']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['users']["columns"]['map_location']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['map_location']) .'" target="_blank" class="uploaded_file" id="link_map_location">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>map_location*</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["map_location"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['users']["columns"]['Facebook']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['users']["columns"]['Facebook']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['users']["columns"]['Facebook']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['Facebook']) .'" target="_blank" class="uploaded_file" id="link_Facebook">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>Facebook*</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["Facebook"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['users']["columns"]['Github']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['users']["columns"]['Github']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['users']["columns"]['Github']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['Github']) .'" target="_blank" class="uploaded_file" id="link_Github">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>Github*</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["Github"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['users']["columns"]['Linkedin']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['users']["columns"]['Linkedin']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['users']["columns"]['Linkedin']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['Linkedin']) .'" target="_blank" class="uploaded_file" id="link_Linkedin">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>Linkedin*</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["Linkedin"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['users']["columns"]['Whatsapp']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['users']["columns"]['Whatsapp']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['users']["columns"]['Whatsapp']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['Whatsapp']) .'" target="_blank" class="uploaded_file" id="link_Whatsapp">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>Whatsapp*</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["Whatsapp"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>									<?php
									// Check if the column is file upload
									// echo '<pre>';
									// print_r($tables_and_columns_names['users']["columns"]['experience_working']);
									// echo '</pre>';
									$has_link_file = isset($tables_and_columns_names['users']["columns"]['experience_working']['is_file']) ? true : false;
									if ($has_link_file){
									    $is_file = $tables_and_columns_names['users']["columns"]['experience_working']['is_file'];
									    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['experience_working']) .'" target="_blank" class="uploaded_file" id="link_experience_working">' : '';
									    $end_link_file = $is_file ? "</a>" : "";
									}
									?>
									<div class="form-group">
									    <h4>experience_working</h4>
									    <?php if ($has_link_file): ?>
									        <p class="form-control-static"><?php echo $link_file ?><?php echo htmlspecialchars($row["experience_working"] ?? ""); ?><?php echo $end_link_file ?></p>
									    <?php endif ?>
									</div>
                    <hr>
                    <p>
                        <a href="users-update.php?id=<?php echo $_GET["id"];?>" class="btn btn-warning"><?php translate('Update Record') ?></a>
                        <a href="users-delete.php?id=<?php echo $_GET["id"];?>" class="btn btn-danger"><?php translate('Delete Record') ?></a>
                        <a href="users-create.php" class="btn btn-success"><?php translate('Add New Record') ?></a>
                        <a href="users-index.php" class="btn btn-primary"><?php translate('Back to List') ?></a>
                    </p>
                    <?php
                    $html = "";
                    $id = is_numeric($row["id"]) ? $row["id"] : "'".$row["id"]."'";
                    $sql = "SELECT COUNT(*) AS count FROM `blogs` WHERE `user_id` = ". $id . ";";
                    $number_of_refs = mysqli_fetch_assoc(mysqli_query($link, $sql))["count"];
                    if ($number_of_refs > 0)
                    {
                        $html .= '<p><a href="blogs-index.php?user_id='. $row["id"].'" class="btn btn-info">' . translate("references_view_btn", false, $number_of_refs, "blogs", "user_id", $row["id"]) .'</a></p></p>';
                    }
                    $id = is_numeric($row["id"]) ? $row["id"] : "'".$row["id"]."'";
                    $sql = "SELECT COUNT(*) AS count FROM `certifications` WHERE `id` = ". $id . ";";
                    $number_of_refs = mysqli_fetch_assoc(mysqli_query($link, $sql))["count"];
                    if ($number_of_refs > 0)
                    {
                        $html .= '<p><a href="certifications-index.php?id='. $row["id"].'" class="btn btn-info">' . translate("references_view_btn", false, $number_of_refs, "certifications", "id", $row["id"]) .'</a></p></p>';
                    }
                    $id = is_numeric($row["id"]) ? $row["id"] : "'".$row["id"]."'";
                    $sql = "SELECT COUNT(*) AS count FROM `company` WHERE `id` = ". $id . ";";
                    $number_of_refs = mysqli_fetch_assoc(mysqli_query($link, $sql))["count"];
                    if ($number_of_refs > 0)
                    {
                        $html .= '<p><a href="company-index.php?id='. $row["id"].'" class="btn btn-info">' . translate("references_view_btn", false, $number_of_refs, "company", "id", $row["id"]) .'</a></p></p>';
                    }
                    $id = is_numeric($row["id"]) ? $row["id"] : "'".$row["id"]."'";
                    $sql = "SELECT COUNT(*) AS count FROM `education` WHERE `user_id` = ". $id . ";";
                    $number_of_refs = mysqli_fetch_assoc(mysqli_query($link, $sql))["count"];
                    if ($number_of_refs > 0)
                    {
                        $html .= '<p><a href="education-index.php?user_id='. $row["id"].'" class="btn btn-info">' . translate("references_view_btn", false, $number_of_refs, "education", "user_id", $row["id"]) .'</a></p></p>';
                    }
                    $id = is_numeric($row["id"]) ? $row["id"] : "'".$row["id"]."'";
                    $sql = "SELECT COUNT(*) AS count FROM `experience` WHERE `id` = ". $id . ";";
                    $number_of_refs = mysqli_fetch_assoc(mysqli_query($link, $sql))["count"];
                    if ($number_of_refs > 0)
                    {
                        $html .= '<p><a href="experience-index.php?id='. $row["id"].'" class="btn btn-info">' . translate("references_view_btn", false, $number_of_refs, "experience", "id", $row["id"]) .'</a></p></p>';
                    }
                    $id = is_numeric($row["id"]) ? $row["id"] : "'".$row["id"]."'";
                    $sql = "SELECT COUNT(*) AS count FROM `language_skills` WHERE `id` = ". $id . ";";
                    $number_of_refs = mysqli_fetch_assoc(mysqli_query($link, $sql))["count"];
                    if ($number_of_refs > 0)
                    {
                        $html .= '<p><a href="language_skills-index.php?id='. $row["id"].'" class="btn btn-info">' . translate("references_view_btn", false, $number_of_refs, "language_skills", "id", $row["id"]) .'</a></p></p>';
                    }
                    $id = is_numeric($row["id"]) ? $row["id"] : "'".$row["id"]."'";
                    $sql = "SELECT COUNT(*) AS count FROM `port_contact` WHERE `user_id` = ". $id . ";";
                    $number_of_refs = mysqli_fetch_assoc(mysqli_query($link, $sql))["count"];
                    if ($number_of_refs > 0)
                    {
                        $html .= '<p><a href="port_contact-index.php?user_id='. $row["id"].'" class="btn btn-info">' . translate("references_view_btn", false, $number_of_refs, "port_contact", "user_id", $row["id"]) .'</a></p></p>';
                    }
                    $id = is_numeric($row["id"]) ? $row["id"] : "'".$row["id"]."'";
                    $sql = "SELECT COUNT(*) AS count FROM `projects` WHERE `id` = ". $id . ";";
                    $number_of_refs = mysqli_fetch_assoc(mysqli_query($link, $sql))["count"];
                    if ($number_of_refs > 0)
                    {
                        $html .= '<p><a href="projects-index.php?id='. $row["id"].'" class="btn btn-info">' . translate("references_view_btn", false, $number_of_refs, "projects", "id", $row["id"]) .'</a></p></p>';
                    }
                    $id = is_numeric($row["id"]) ? $row["id"] : "'".$row["id"]."'";
                    $sql = "SELECT COUNT(*) AS count FROM `services` WHERE `user_id` = ". $id . ";";
                    $number_of_refs = mysqli_fetch_assoc(mysqli_query($link, $sql))["count"];
                    if ($number_of_refs > 0)
                    {
                        $html .= '<p><a href="services-index.php?user_id='. $row["id"].'" class="btn btn-info">' . translate("references_view_btn", false, $number_of_refs, "services", "user_id", $row["id"]) .'</a></p></p>';
                    }
                    $id = is_numeric($row["id"]) ? $row["id"] : "'".$row["id"]."'";
                    $sql = "SELECT COUNT(*) AS count FROM `skills` WHERE `user_id` = ". $id . ";";
                    $number_of_refs = mysqli_fetch_assoc(mysqli_query($link, $sql))["count"];
                    if ($number_of_refs > 0)
                    {
                        $html .= '<p><a href="skills-index.php?user_id='. $row["id"].'" class="btn btn-info">' . translate("references_view_btn", false, $number_of_refs, "skills", "user_id", $row["id"]) .'</a></p></p>';
                    }if ($html != "") {echo "<h3>" . translate("references_tables", false, "users") . "</h3>" . $html;}

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
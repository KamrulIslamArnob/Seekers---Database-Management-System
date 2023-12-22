<?php
require_once('config.php');
require_once('helpers.php');
require_once('config-tables-columns.php');

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    // Checking for upload fields
    $upload_results = array();
    $upload_errors = array();

    // Use the backup fields to look for submitted files, if any
    foreach ($_POST as $key => $value) {

        // Check for $_POST cruddiy_backup_xxx to determine $_FILES xxx
        // We don't loop through $_FILES directly to handle value backup more easily
        if (substr($key, 0, 15) === 'cruddiy_backup_') {
            $originalKey = substr($key, 15);
            // Check if a file was uploaded for this field
            if (isset($_FILES[$originalKey]) && $_FILES[$originalKey]['error'] == UPLOAD_ERR_OK) {
                // Handle the file upload
                $this_upload = handleFileUpload($_FILES[$originalKey]);
                $upload_results[] = $this_upload;

                // If the upload was successful, update $_POST
                if (!in_array(true, array_column($this_upload, 'error')) && !array_key_exists('error', $this_upload)) {
                    $_POST[$originalKey] = $this_upload['success'];

                    // And we can safely delete the previous file
                    unlink($upload_target_dir . $_POST['cruddiy_backup_' . $originalKey]);
                }
            } else {
                // No file uploaded, use the backup
                $_POST[$originalKey] = $value;
            }
        }


        // Check for cruddiy_delete_xxx and set corresponding $_POST['xxx'] to blank
        if (substr($key, 0, 15) === 'cruddiy_delete_') {
            $deleteKey = substr($key, 15);

            if (isset($_POST['cruddiy_delete_' . $deleteKey]) && $_POST['cruddiy_delete_' . $deleteKey]) {
                // Set the corresponding field to blank
                $_POST[$deleteKey] = '';

                // And we can safely delete the file
                @unlink($upload_target_dir . $_POST['cruddiy_backup_' . $deleteKey]);
            }
        }
    }

    $upload_errors = array();
    foreach ($upload_results as $result) {
        if (isset($result['error'])) {
            $upload_errors[] = $result['error'];
        }
    }

    // Check for regular fields
    if (!in_array(true, array_column($upload_results, 'error'))) {

        $name = trim($_POST["name"]);
		$user_name = $_POST["user_name"] == "" ? null : trim($_POST["user_name"]);
		$email = trim($_POST["email"]);
		$email_verified_at = $_POST["email_verified_at"] == "" ? null : trim($_POST["email_verified_at"]);
		$password = trim($_POST["password"]);
		$role = trim($_POST["role"]);
		$status = trim($_POST["status"]);
		$remember_token = $_POST["remember_token"] == "" ? null : trim($_POST["remember_token"]);
		$created_at = $_POST["created_at"] == "" ? null : trim($_POST["created_at"]);
		$updated_at = $_POST["updated_at"] == "" ? null : trim($_POST["updated_at"]);
		$DOB = trim($_POST["DOB"]);
		$LastLogin = $_POST["LastLogin"] == "" ? null : trim($_POST["LastLogin"]);
		$address = trim($_POST["address"]);
		$profile_picture = trim($_POST["profile_picture"]);
		$designation = $_POST["designation"] == "" ? null : trim($_POST["designation"]);
		$about = trim($_POST["about"]);
		$phone = trim($_POST["phone"]);
		$tagline = $_POST["tagline"] == "" ? null : trim($_POST["tagline"]);
		$cv = $_POST["cv"] == "" ? null : trim($_POST["cv"]);
		$Nationality = trim($_POST["Nationality"]);
		$Freelance = $_POST["Freelance"] == "" ? null : trim($_POST["Freelance"]);
		$map_location = trim($_POST["map_location"]);
		$Facebook = trim($_POST["Facebook"]);
		$Github = trim($_POST["Github"]);
		$Linkedin = trim($_POST["Linkedin"]);
		$Whatsapp = trim($_POST["Whatsapp"]);
		$experience_working = $_POST["experience_working"] == "" ? null : trim($_POST["experience_working"]);
		

        // Prepare an update statement

        $stmt = $link->prepare("UPDATE `users` SET `name`=?,`user_name`=?,`email`=?,`email_verified_at`=?,`password`=?,`role`=?,`status`=?,`remember_token`=?,`created_at`=?,`updated_at`=?,`DOB`=?,`LastLogin`=?,`address`=?,`profile_picture`=?,`designation`=?,`about`=?,`phone`=?,`tagline`=?,`cv`=?,`Nationality`=?,`Freelance`=?,`map_location`=?,`Facebook`=?,`Github`=?,`Linkedin`=?,`Whatsapp`=?,`experience_working`=? WHERE `id`=?");

        try {
            $stmt->execute([ $name, $user_name, $email, $email_verified_at, $password, $role, $status, $remember_token, $created_at, $updated_at, $DOB, $LastLogin, $address, $profile_picture, $designation, $about, $phone, $tagline, $cv, $Nationality, $Freelance, $map_location, $Facebook, $Github, $Linkedin, $Whatsapp, $experience_working, $id  ]);
        } catch (Exception $e) {
            error_log($e->getMessage());
            $error = $e->getMessage();
        }

        if (!isset($error)){
            header("location: users-read.php?id=$id");
        } else {
            $uploaded_files = array();
            foreach ($upload_results as $result) {
                if (isset($result['success'])) {
                    // Delete the uploaded files if there were any error while saving postdata in DB
                    unlink($upload_target_dir . $result['success']);
                }
            }
        }

    }
}
// Check existence of id parameter before processing further
$_GET["id"] = trim($_GET["id"]);
if(isset($_GET["id"]) && !empty($_GET["id"])){
    // Get URL parameter
    $id =  trim($_GET["id"]);

    // Prepare a select statement
    $sql = "SELECT * FROM `users` WHERE `id` = ?";
    if($stmt = mysqli_prepare($link, $sql)){
        // Set parameters
        $param_id = $id;

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

                // Retrieve individual field value

                $name = htmlspecialchars($row["name"] ?? "");
					$user_name = htmlspecialchars($row["user_name"] ?? "");
					$email = htmlspecialchars($row["email"] ?? "");
					$email_verified_at = htmlspecialchars($row["email_verified_at"] ?? "");
					$password = htmlspecialchars($row["password"] ?? "");
					$role = htmlspecialchars($row["role"] ?? "");
					$status = htmlspecialchars($row["status"] ?? "");
					$remember_token = htmlspecialchars($row["remember_token"] ?? "");
					$created_at = htmlspecialchars($row["created_at"] ?? "");
					$updated_at = htmlspecialchars($row["updated_at"] ?? "");
					$DOB = htmlspecialchars($row["DOB"] ?? "");
					$LastLogin = htmlspecialchars($row["LastLogin"] ?? "");
					$address = htmlspecialchars($row["address"] ?? "");
					$profile_picture = htmlspecialchars($row["profile_picture"] ?? "");
					$designation = htmlspecialchars($row["designation"] ?? "");
					$about = htmlspecialchars($row["about"] ?? "");
					$phone = htmlspecialchars($row["phone"] ?? "");
					$tagline = htmlspecialchars($row["tagline"] ?? "");
					$cv = htmlspecialchars($row["cv"] ?? "");
					$Nationality = htmlspecialchars($row["Nationality"] ?? "");
					$Freelance = htmlspecialchars($row["Freelance"] ?? "");
					$map_location = htmlspecialchars($row["map_location"] ?? "");
					$Facebook = htmlspecialchars($row["Facebook"] ?? "");
					$Github = htmlspecialchars($row["Github"] ?? "");
					$Linkedin = htmlspecialchars($row["Linkedin"] ?? "");
					$Whatsapp = htmlspecialchars($row["Whatsapp"] ?? "");
					$experience_working = htmlspecialchars($row["experience_working"] ?? "");
					

            } else{
                // URL doesn't contain valid id. Redirect to error page
                header("location: error.php");
                exit();
            }

        } else{
            translate('stmt_error') . "<br>".$stmt->error;
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

}  else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php translate('Update Record') ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<?php require_once('navbar.php'); ?>
<body>
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="page-header">
                        <h2><?php translate('Update Record') ?></h2>
                    </div>
                    <?php print_error_if_exists(@$upload_errors); ?>
                    <?php print_error_if_exists(@$error); ?>
                    <p><?php translate('update_record_instructions') ?></p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                                            <label for="name">name*</label>
                                            <input type="text" name="name" id="name" maxlength="255" class="form-control" value="<?php echo @$name; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="user_name">user_name</label>
                                            <input type="text" name="user_name" id="user_name" maxlength="255" class="form-control" value="<?php echo @$user_name; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="email">email*</label>
                                            <input type="text" name="email" id="email" maxlength="255" class="form-control" value="<?php echo @$email; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="email_verified_at">email_verified_at</label>
                                            <input type="text" name="email_verified_at" id="email_verified_at" class="form-control" value="<?php echo @$email_verified_at; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="password">password*</label>
                                            <input type="text" name="password" id="password" maxlength="255" class="form-control" value="<?php echo @$password; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="role">role*</label>
                                            <select name="role" class="form-control" id="role"><?php 
							 $enum_role = array('admin','company','user');
                                                foreach ($enum_role as  $val){
                                                    if ($val == $role){
                                                        echo '<option value="' . $val . '" selected="selected">' . $val . '</option>';
                                                    } else
                                                    echo '<option value="' . $val . '">' . $val . '</option>';
                                                }
                                                ?></select>
                                        </div>
						<div class="form-group">
                                            <label for="status">status*</label>
                                            <select name="status" class="form-control" id="status"><?php 
							 $enum_status = array('active','inactive');
                                                foreach ($enum_status as  $val){
                                                    if ($val == $status){
                                                        echo '<option value="' . $val . '" selected="selected">' . $val . '</option>';
                                                    } else
                                                    echo '<option value="' . $val . '">' . $val . '</option>';
                                                }
                                                ?></select>
                                        </div>
						<div class="form-group">
                                            <label for="remember_token">remember_token</label>
                                            <input type="text" name="remember_token" id="remember_token" maxlength="100" class="form-control" value="<?php echo @$remember_token; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="created_at">created_at</label>
                                            <input type="text" name="created_at" id="created_at" class="form-control" value="<?php echo @$created_at; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="updated_at">updated_at</label>
                                            <input type="text" name="updated_at" id="updated_at" class="form-control" value="<?php echo @$updated_at; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="DOB">DOB*</label>
                                            <input type="datetime-local" name="DOB" id="DOB" class="form-control" value="<?php echo empty($DOB) ? "" : date("Y-m-d\TH:i:s", strtotime(@$DOB)); ?>">
                                        </div>
						<div class="form-group">
                                            <label for="LastLogin">LastLogin</label>
                                            <input type="datetime-local" name="LastLogin" id="LastLogin" class="form-control" value="<?php echo empty($LastLogin) ? "" : date("Y-m-d\TH:i:s", strtotime(@$LastLogin)); ?>">
                                        </div>
						<div class="form-group">
                                            <label for="address">address*</label>
                                            <input type="text" name="address" id="address" maxlength="255" class="form-control" value="<?php echo @$address; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="profile_picture">profile_picture*</label>
                                            
<input type="file" name="profile_picture" id="profile_picture" class="form-control">
<input type="hidden" name="cruddiy_backup_profile_picture" id="cruddiy_backup_profile_picture" value="<?php echo @$profile_picture; ?>">
<?php if (isset($profile_picture) && !empty($profile_picture)) : ?>
<div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="cruddiy_delete_profile_picture" name="cruddiy_delete_profile_picture" value="1">
    <label class="custom-control-label" for="cruddiy_delete_profile_picture">
<?php translate("Delete:") ?>: <a href="uploads/<?php echo $profile_picture ?>" target="_blank"><?php echo $profile_picture ?></a>    </label>
</div>
<?php endif ?>

                                        </div>
						<div class="form-group">
                                            <label for="designation">designation</label>
                                            <textarea name="designation" id="designation" class="form-control"><?php echo @$designation; ?></textarea>
                                        </div>
						<div class="form-group">
                                            <label for="about">about*</label>
                                            <input type="text" name="about" id="about" maxlength="250" class="form-control" value="<?php echo @$about; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="phone">phone*</label>
                                            <input type="number" name="phone" id="phone" class="form-control" value="<?php echo @$phone; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="tagline">tagline</label>
                                            <input type="text" name="tagline" id="tagline" maxlength="255" class="form-control" value="<?php echo @$tagline; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="cv">cv</label>
                                            <input type="text" name="cv" id="cv" maxlength="255" class="form-control" value="<?php echo @$cv; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="Nationality">Nationality*</label>
                                            <input type="text" name="Nationality" id="Nationality" maxlength="255" class="form-control" value="<?php echo @$Nationality; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="Freelance">Freelance</label>
                                            <input type="text" name="Freelance" id="Freelance" maxlength="255" class="form-control" value="<?php echo @$Freelance; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="map_location">map_location*</label>
                                            <input type="text" name="map_location" id="map_location" maxlength="500" class="form-control" value="<?php echo @$map_location; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="Facebook">Facebook*</label>
                                            <input type="text" name="Facebook" id="Facebook" maxlength="250" class="form-control" value="<?php echo @$Facebook; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="Github">Github*</label>
                                            <input type="text" name="Github" id="Github" maxlength="250" class="form-control" value="<?php echo @$Github; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="Linkedin">Linkedin*</label>
                                            <input type="text" name="Linkedin" id="Linkedin" maxlength="250" class="form-control" value="<?php echo @$Linkedin; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="Whatsapp">Whatsapp*</label>
                                            <input type="text" name="Whatsapp" id="Whatsapp" maxlength="100" class="form-control" value="<?php echo @$Whatsapp; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="experience_working">experience_working</label>
                                            <input type="text" name="experience_working" id="experience_working" maxlength="255" class="form-control" value="<?php echo @$experience_working; ?>">
                                        </div>

                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <p>
                            <input type="submit" class="btn btn-primary" value="<?php translate('Edit') ?>">
                            <a href="javascript:history.back()" class="btn btn-secondary"><?php translate('Cancel') ?></a>
                        </p>
                        <hr>
                        <p>
                            <a href="users-read.php?id=<?php echo $_GET["id"];?>" class="btn btn-info"><?php translate('View Record') ?></a>
                            <a href="users-delete.php?id=<?php echo $_GET["id"];?>" class="btn btn-danger"><?php translate('Delete Record') ?></a>
                            <a href="users-index.php" class="btn btn-primary"><?php translate('Back to List') ?></a>
                        </p>
                        <p><?php translate('required_fiels_instructions') ?></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
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
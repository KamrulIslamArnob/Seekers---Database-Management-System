<?php
require_once('config.php');
require_once('helpers.php');

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Checking for upload fields
    $upload_results = array();
    if (!empty($_FILES)) {
        foreach ($_FILES as $key => $value) {
            // Check if the file was actually uploaded
            if ($value['error'] != UPLOAD_ERR_NO_FILE) {
                // echo "Field " . $key . " is a file upload.\n";
                $this_upload = handleFileUpload($_FILES[$key]);
                $upload_results[] = $this_upload;
                // Put the filename in the POST data to save it in DB
                if (!in_array(true, array_column($this_upload, 'error')) && !array_key_exists('error', $this_upload)) {
                    $_POST[$key] = $this_upload['success'];
                }
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
		


        $stmt = $link->prepare("INSERT INTO `users` (`name`, `user_name`, `email`, `email_verified_at`, `password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`, `DOB`, `LastLogin`, `address`, `profile_picture`, `designation`, `about`, `phone`, `tagline`, `cv`, `Nationality`, `Freelance`, `map_location`, `Facebook`, `Github`, `Linkedin`, `Whatsapp`, `experience_working`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        try {
            $stmt->execute([ $name, $user_name, $email, $email_verified_at, $password, $role, $status, $remember_token, $created_at, $updated_at, $DOB, $LastLogin, $address, $profile_picture, $designation, $about, $phone, $tagline, $cv, $Nationality, $Freelance, $map_location, $Facebook, $Github, $Linkedin, $Whatsapp, $experience_working ]);
        } catch (Exception $e) {
            error_log($e->getMessage());
            $error = $e->getMessage();
        }

        if (!isset($error)){
            $new_id = mysqli_insert_id($link);
            header("location: users-read.php?id=$new_id");
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php translate('Add New Record') ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<?php require_once('navbar.php'); ?>
<body>
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="page-header">
                        <h2><?php translate('Add New Record') ?></h2>
                    </div>
                    <?php print_error_if_exists(@$upload_errors); ?>
                    <?php print_error_if_exists(@$error); ?>
                    <p><?php translate('add_new_record_instructions') ?></p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

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

                        <input type="submit" class="btn btn-primary" value="<?php translate('Create') ?>">
                        <a href="users-index.php" class="btn btn-secondary"><?php translate('Cancel') ?></a>
                    </form>
                    <p><small><?php translate('required_fiels_instructions') ?></small></p>
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
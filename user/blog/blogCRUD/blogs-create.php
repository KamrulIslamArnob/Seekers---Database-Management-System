<?php
require_once('config.php');
require_once('helpers.php');

session_start();
$userid = $_SESSION['user_id'];

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

        
		$blog_title = trim($_POST["blog_title"]);
		$blog_tagline = $_POST["blog_tagline"] == "" ? null : trim($_POST["blog_tagline"]);
		$blog_text = trim($_POST["blog_text"]);
		$blog_genre = trim($_POST["blog_genre"]);
		$blog_cover = $_POST["blog_cover"] == "" ? null : trim($_POST["blog_cover"]);
		$user_id = $userid;
		$created_at = date("Y-m-d H:i:s");

		//$updated_at = date("Y-m-d H:i:s");
		


        $stmt = $link->prepare("INSERT INTO `blogs` ( `blog_title`, `blog_tagline`, `blog_text`, `blog_genre`, `blog_cover`, `user_id`, `created_at`) VALUES ( ?, ?, ?, ?, ?, ?, ?)");

        try {
            $stmt->execute([  $blog_title, $blog_tagline, $blog_text, $blog_genre, $blog_cover, $user_id, $created_at ]);
        } catch (Exception $e) {
            error_log($e->getMessage());
            $error = $e->getMessage();
        }

        if (!isset($error)){
            $new_id = mysqli_insert_id($link);
            header("location: blogs-read.php?blog_id=$new_id");
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
                <div class="col-md-6 mx-auto">
                    <div class="page-header">
                        <h2><?php translate('Add New Record') ?></h2>
                    </div>
                    <?php print_error_if_exists(@$upload_errors); ?>
                    <?php print_error_if_exists(@$error); ?>
                    <p><?php translate('add_new_record_instructions') ?></p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

                        
						<div class="form-group">
                                            <label for="blog_title">Ttile*</label>
                                            <input type="text" name="blog_title" id="blog_title" maxlength="255" class="form-control" value="<?php echo @$blog_title; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="blog_tagline">About</label>
                                            <input type="text" name="blog_tagline" id="blog_tagline" maxlength="255" class="form-control" value="<?php echo @$blog_tagline; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="blog_text">Section*</label>
                                            <textarea name="blog_text" id="blog_text" class="form-control"><?php echo @$blog_text; ?></textarea>
                                        </div>
						<div class="form-group">
                                            <label for="blog_genre">Genre*</label>
                                            <input type="text" name="blog_genre" id="blog_genre" maxlength="255" class="form-control" value="<?php echo @$blog_genre; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="blog_cover">Cover Img</label>
                                            
<input type="file" name="blog_cover" id="blog_cover" class="form-control">
<input type="hidden" name="cruddiy_backup_blog_cover" id="cruddiy_backup_blog_cover" value="<?php echo @$blog_cover; ?>">
<?php if (isset($blog_cover) && !empty($blog_cover)) : ?>
<div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="cruddiy_delete_blog_cover" name="cruddiy_delete_blog_cover" value="1">
    <label class="custom-control-label" for="cruddiy_delete_blog_cover">
<?php translate("Delete:") ?>: <a href="uploads/<?php echo $blog_cover ?>" target="_blank"><?php echo $blog_cover ?></a>    </label>
</div>
<?php endif ?>

                                        </div>
						<div class="form-group">
                                            <label for="user_id">user_id*</label>
                                            <input type="text" name="user_id" id="user_id" maxlength="255" class="form-control" value="<?php echo @$userid; ?>" readonly>
                                        </div>
						
						
                        <input type="submit" class="btn btn-primary" value="<?php translate('Create') ?>">
                        <a href="blogs-index.php" class="btn btn-secondary"><?php translate('Cancel') ?></a>
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
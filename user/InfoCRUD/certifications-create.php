<?php
require_once('config.php');
require_once('helpers.php');

session_start();
$user_id = $_SESSION['user_id'];



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

        //$certification_id = trim($_POST["certification_id"]);
		$certification_name = trim($_POST["certification_name"]);
		$issuing_authority = trim($_POST["issuing_authority"]);
		$issue_date = trim($_POST["issue_date"]);
		$expiration_date = $_POST["expiration_date"] == "" ? null : trim($_POST["expiration_date"]);
		$id = $user_id;
		


        $stmt = $link->prepare("INSERT INTO `certifications` (`certification_id`, `certification_name`, `issuing_authority`, `issue_date`, `expiration_date`, `id`) VALUES (?, ?, ?, ?, ?, ?)");

        try {
            $stmt->execute([ $certification_id, $certification_name, $issuing_authority, $issue_date, $expiration_date, $id ]);
        } catch (Exception $e) {
            error_log($e->getMessage());
            $error = $e->getMessage();
        }

        if (!isset($error)){
            $new_id = mysqli_insert_id($link);
            header("location: certifications-read.php?certification_id=$new_id");
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

                        <!-- <div class="form-group">
                                            <label for="certification_id">Certificate ID*</label>
                                            <input type="number" name="certification_id" id="certification_id" class="form-control" value="<?php echo @$certification_id; ?>">
                                        </div> -->
						<div class="form-group">
                                            <label for="certification_name">Name*</label>
                                            <input type="text" name="certification_name" id="certification_name" maxlength="255" class="form-control" value="<?php echo @$certification_name; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="issuing_authority">Issuing Authority*</label>
                                            
<input type="file" name="issuing_authority" id="issuing_authority" class="form-control">
<input type="hidden" name="cruddiy_backup_issuing_authority" id="cruddiy_backup_issuing_authority" value="<?php echo @$issuing_authority; ?>">
<?php if (isset($issuing_authority) && !empty($issuing_authority)) : ?>
<div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="cruddiy_delete_issuing_authority" name="cruddiy_delete_issuing_authority" value="1">
    <label class="custom-control-label" for="cruddiy_delete_issuing_authority">
<?php translate("Delete:") ?>: <a href="uploads/<?php echo $issuing_authority ?>" target="_blank"><?php echo $issuing_authority ?></a>    </label>
</div>
<?php endif ?>

                                        </div>
						<div class="form-group">
                                            <label for="issue_date">Issue Date*</label>
                                            <input type="date" name="issue_date" id="issue_date" class="form-control" value="<?php echo @$issue_date; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="expiration_date">Expiration Date</label>
                                            <input type="date" name="expiration_date" id="expiration_date" class="form-control" value="<?php echo @$expiration_date; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="id">User ID*</label>
                                            <input type="text" name="expiration_date" id="expiration_date" class="form-control" value="<?php echo $user_id; ?> " readonly >
                                        </div>

                        <input type="submit" class="btn btn-primary" value="<?php translate('Create') ?>">
                        <a href="certifications-index.php" class="btn btn-secondary"><?php translate('Cancel') ?></a>
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
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

        $user_id = $_POST["user_id"] == "" ? null : trim($_POST["user_id"]);
		$job_id = $_POST["job_id"] == "" ? null : trim($_POST["job_id"]);
		$company_id = $_POST["company_id"] == "" ? null : trim($_POST["company_id"]);
		$status = $_POST["status"] == "" ? null : trim($_POST["status"]);
		$score = $_POST["score"] == "" ? null : trim($_POST["score"]);
		


        $stmt = $link->prepare("INSERT INTO `applications` (`user_id`, `job_id`, `company_id`, `status`, `score`) VALUES (?, ?, ?, ?, ?)");

        try {
            $stmt->execute([ $user_id, $job_id, $company_id, $status, $score ]);
        } catch (Exception $e) {
            error_log($e->getMessage());
            $error = $e->getMessage();
        }

        if (!isset($error)){
            $new_id = mysqli_insert_id($link);
            header("location: applications-read.php?id=$new_id");
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
                                            <label for="user_id">user_id</label>
                                            <input type="number" name="user_id" id="user_id" class="form-control" value="<?php echo @$user_id; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="job_id">job_id</label>
                                            <input type="number" name="job_id" id="job_id" class="form-control" value="<?php echo @$job_id; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="company_id">company_id</label>
                                            <input type="number" name="company_id" id="company_id" class="form-control" value="<?php echo @$company_id; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="status">status</label>
                                            <input type="text" name="status" id="status" maxlength="255" class="form-control" value="<?php echo @$status; ?>">
                                        </div>
						<div class="form-group">
                                            <label for="score">score</label>
                                            <input type="number" name="score" id="score" class="form-control" value="<?php echo @$score; ?>">
                                        </div>

                        <input type="submit" class="btn btn-primary" value="<?php translate('Create') ?>">
                        <a href="applications-index.php" class="btn btn-secondary"><?php translate('Cancel') ?></a>
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
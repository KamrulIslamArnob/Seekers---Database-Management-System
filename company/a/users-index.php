<?php

require_once('config.php');
require_once('config-tables-columns.php');
require_once('helpers.php');

// Check if it's an export request
$isCsvExport = isset($_GET['export']) && $_GET['export'] == 'csv';


//Get current URL and parameters for correct pagination
$script   = $_SERVER['SCRIPT_NAME'];
$parameters   = $_GET ? $_SERVER['QUERY_STRING'] : "" ;
$currenturl = $domain. $script . '?' . $parameters;

//Pagination
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}

//$no_of_records_per_page is set on the index page. Default is 10.
$offset = ($pageno-1) * $no_of_records_per_page;

$total_pages_sql = "SELECT COUNT(*) FROM `users`";
$result = mysqli_query($link,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

//Column sorting on column name
$columns = array('id', 'name', 'user_name', 'email', 'email_verified_at', 'password', 'role', 'status', 'remember_token', 'created_at', 'updated_at', 'DOB', 'LastLogin', 'address', 'profile_picture', 'designation', 'about', 'phone', 'tagline', 'cv', 'Nationality', 'Freelance', 'map_location', 'Facebook', 'Github', 'Linkedin', 'Whatsapp', 'experience_working');
// Order by primary key on default
$order = 'id';
if (isset($_GET['order']) && in_array($_GET['order'], $columns)) {
    $order = $_GET['order'];
}

//Column sort order
$sortBy = array('asc', 'desc'); $sort = 'asc';
if (isset($_GET['sort']) && in_array($_GET['sort'], $sortBy)) {
        if($_GET['sort']=='asc') {
        $sort='asc';
        }
else {
    $sort='desc';
    }
}

//Generate WHERE statements for param
$where_columns = array_intersect_key($_GET, array_flip($columns));
$get_param = "";
$where_statement = " WHERE 1=1 ";
foreach ( $where_columns as $key => $val ) {
    $where_statement .= " AND `$key` = '" . mysqli_real_escape_string($link, $val) . "' ";
    $get_param .= "&$key=$val";
}

if (!empty($_GET['search'])) {
    $search = mysqli_real_escape_string($link, $_GET['search']);
    if (strpos('`users`.`id`, `users`.`name`, `users`.`user_name`, `users`.`email`, `users`.`email_verified_at`, `users`.`password`, `users`.`role`, `users`.`status`, `users`.`remember_token`, `users`.`created_at`, `users`.`updated_at`, `users`.`DOB`, `users`.`LastLogin`, `users`.`address`, `users`.`profile_picture`, `users`.`designation`, `users`.`about`, `users`.`phone`, `users`.`tagline`, `users`.`cv`, `users`.`Nationality`, `users`.`Freelance`, `users`.`map_location`, `users`.`Facebook`, `users`.`Github`, `users`.`Linkedin`, `users`.`Whatsapp`, `users`.`experience_working`', ',')) {
        $where_statement .= " AND CONCAT_WS (`users`.`id`, `users`.`name`, `users`.`user_name`, `users`.`email`, `users`.`email_verified_at`, `users`.`password`, `users`.`role`, `users`.`status`, `users`.`remember_token`, `users`.`created_at`, `users`.`updated_at`, `users`.`DOB`, `users`.`LastLogin`, `users`.`address`, `users`.`profile_picture`, `users`.`designation`, `users`.`about`, `users`.`phone`, `users`.`tagline`, `users`.`cv`, `users`.`Nationality`, `users`.`Freelance`, `users`.`map_location`, `users`.`Facebook`, `users`.`Github`, `users`.`Linkedin`, `users`.`Whatsapp`, `users`.`experience_working`) LIKE '%$search%'";
    } else {
        $where_statement .= " AND `users`.`id`, `users`.`name`, `users`.`user_name`, `users`.`email`, `users`.`email_verified_at`, `users`.`password`, `users`.`role`, `users`.`status`, `users`.`remember_token`, `users`.`created_at`, `users`.`updated_at`, `users`.`DOB`, `users`.`LastLogin`, `users`.`address`, `users`.`profile_picture`, `users`.`designation`, `users`.`about`, `users`.`phone`, `users`.`tagline`, `users`.`cv`, `users`.`Nationality`, `users`.`Freelance`, `users`.`map_location`, `users`.`Facebook`, `users`.`Github`, `users`.`Linkedin`, `users`.`Whatsapp`, `users`.`experience_working` LIKE '%$search%'";
    }

} else {
    $search = "";
}

$order_clause = !empty($order) ? "ORDER BY `$order` $sort" : '';
$group_clause = !empty($order) && $order == 'id' ? "GROUP BY `users`.`$order`" : '';

// Prepare SQL queries
$sql = "SELECT `users`.* 
        FROM `users` 
        $where_statement
        $group_clause
        $order_clause";

// Add pagination only if it's not a CSV export
if (!$isCsvExport) {
    $sql .= " LIMIT $offset, $no_of_records_per_page";
}

// Execute the main query
$result = mysqli_query($link, $sql);

// Stop further rendering for CSV export
if ($isCsvExport) {
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    exportAsCSV($data, $db_name, $tables_and_columns_names, 'users', $link, false);
    exit;
}

$count_pages = "SELECT COUNT(*) AS count
                FROM `users` 
                $where_statement";

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>aasdwed</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6b773fe9e4.js" crossorigin="anonymous"></script>
    <style type="text/css">
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 5px;
        }
        body {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <?php require_once('navbar.php'); ?>
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <?php
                        // Prevent crash if $str contains single quotes
                        $str = <<<'EOD'
                        reff4rf
                        EOD;
                        ?>
                        <h2 class="float-left"><?php translate('%s Details', true, $str) ?></h2>
                        <a href="users-create.php" class="btn btn-success float-right"><?php translate('Add New Record') ?></a>
                        <a href="users-index.php" class="btn btn-info float-right mr-2"><?php translate('Reset View') ?></a>
                        <a href="users-index.php?export=csv" class="btn btn-primary float-right mr-2"><?php translate('Export as CSV') ?></a>
                        <a href="javascript:history.back()" class="btn btn-secondary float-right mr-2"><?php translate('Back') ?></a>
                    </div>

                    <div class="form-row">
                        <form action="users-index.php" method="get">
                            <div class="col"> <input type="text" class="form-control" placeholder="<?php translate('Search this table') ?>" name="search"></div>
                        </form>
                        <br>


                        <?php
                        if($result) :
                            if(mysqli_num_rows($result) > 0) :
                                $number_of_results = mysqli_fetch_assoc(mysqli_query($link, $count_pages))['count'];
                                $total_pages = ceil($number_of_results / $no_of_records_per_page);
                                translate('total_results', true, $number_of_results, $pageno, $total_pages);
                                ?>

                                <table class='table table-bordered table-striped'>
                                    <thead class='thead-light'>
                                        <tr>
                                            <?php 									$columnname = "id";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=id&sort=".$sort_link.">id</a></th>";
									$columnname = "name";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=name&sort=".$sort_link.">name</a></th>";
									$columnname = "user_name";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=user_name&sort=".$sort_link.">user_name</a></th>";
									$columnname = "email";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=email&sort=".$sort_link.">email</a></th>";
									$columnname = "email_verified_at";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=email_verified_at&sort=".$sort_link.">email_verified_at</a></th>";
									$columnname = "password";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=password&sort=".$sort_link.">password</a></th>";
									$columnname = "role";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=role&sort=".$sort_link.">role</a></th>";
									$columnname = "status";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=status&sort=".$sort_link.">status</a></th>";
									$columnname = "remember_token";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=remember_token&sort=".$sort_link.">remember_token</a></th>";
									$columnname = "created_at";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=created_at&sort=".$sort_link.">created_at</a></th>";
									$columnname = "updated_at";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=updated_at&sort=".$sort_link.">updated_at</a></th>";
									$columnname = "DOB";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=DOB&sort=".$sort_link.">DOB</a></th>";
									$columnname = "LastLogin";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=LastLogin&sort=".$sort_link.">LastLogin</a></th>";
									$columnname = "address";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=address&sort=".$sort_link.">address</a></th>";
									$columnname = "profile_picture";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=profile_picture&sort=".$sort_link.">profile_picture</a></th>";
									$columnname = "designation";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=designation&sort=".$sort_link.">designation</a></th>";
									$columnname = "about";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=about&sort=".$sort_link.">about</a></th>";
									$columnname = "phone";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=phone&sort=".$sort_link.">phone</a></th>";
									$columnname = "tagline";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=tagline&sort=".$sort_link.">tagline</a></th>";
									$columnname = "cv";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=cv&sort=".$sort_link.">cv</a></th>";
									$columnname = "Nationality";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=Nationality&sort=".$sort_link.">Nationality</a></th>";
									$columnname = "Freelance";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=Freelance&sort=".$sort_link.">Freelance</a></th>";
									$columnname = "map_location";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=map_location&sort=".$sort_link.">map_location</a></th>";
									$columnname = "Facebook";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=Facebook&sort=".$sort_link.">Facebook</a></th>";
									$columnname = "Github";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=Github&sort=".$sort_link.">Github</a></th>";
									$columnname = "Linkedin";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=Linkedin&sort=".$sort_link.">Linkedin</a></th>";
									$columnname = "Whatsapp";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=Whatsapp&sort=".$sort_link.">Whatsapp</a></th>";
									$columnname = "experience_working";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "asc" ? "desc" : "asc";
									$sort_link = isset($_GET["order"]) && $_GET["order"] == $columnname && $_GET["sort"] == "desc" ? "asc" : $sort_link;
									echo "<th><a href=?search=$search&order=experience_working&sort=".$sort_link.">experience_working</a></th>";
 ?>
                                            <th><?php translate('Actions'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_array($result)): ?>
                                            <tr>
                                                <?php echo "<td>" . htmlspecialchars($row['id'] ?? "") . "</td>";
																					echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['users']["columns"]['name']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['users']["columns"]['name']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['users']["columns"]['name']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['name']) .'" target="_blank" class="uploaded_file" id="link_name">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['name'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['users']["columns"]['user_name']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['users']["columns"]['user_name']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['users']["columns"]['user_name']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['user_name']) .'" target="_blank" class="uploaded_file" id="link_user_name">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['user_name'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['users']["columns"]['email']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['users']["columns"]['email']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['users']["columns"]['email']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['email']) .'" target="_blank" class="uploaded_file" id="link_email">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['email'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";echo "<td>" . htmlspecialchars($row['email_verified_at'] ?? "") . "</td>";
																					echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['users']["columns"]['password']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['users']["columns"]['password']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['users']["columns"]['password']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['password']) .'" target="_blank" class="uploaded_file" id="link_password">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['password'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";echo "<td>" . htmlspecialchars($row['role'] ?? "") . "</td>";
										echo "<td>" . htmlspecialchars($row['status'] ?? "") . "</td>";
																					echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['users']["columns"]['remember_token']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['users']["columns"]['remember_token']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['users']["columns"]['remember_token']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['remember_token']) .'" target="_blank" class="uploaded_file" id="link_remember_token">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['remember_token'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";echo "<td>" . htmlspecialchars($row['created_at'] ?? "") . "</td>";
										echo "<td>" . htmlspecialchars($row['updated_at'] ?? "") . "</td>";
										echo "<td>" . convert_datetime($row['DOB']) . "</td>";
										echo "<td>" . convert_datetime($row['LastLogin']) . "</td>";
																					echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['users']["columns"]['address']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['users']["columns"]['address']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['users']["columns"]['address']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['address']) .'" target="_blank" class="uploaded_file" id="link_address">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['address'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['users']["columns"]['profile_picture']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['users']["columns"]['profile_picture']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['users']["columns"]['profile_picture']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['profile_picture']) .'" target="_blank" class="uploaded_file" id="link_profile_picture">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['profile_picture'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['users']["columns"]['designation']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['users']["columns"]['designation']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['users']["columns"]['designation']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['designation']) .'" target="_blank" class="uploaded_file" id="link_designation">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['designation'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['users']["columns"]['about']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['users']["columns"]['about']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['users']["columns"]['about']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['about']) .'" target="_blank" class="uploaded_file" id="link_about">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['about'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";echo "<td>" . htmlspecialchars($row['phone'] ?? "") . "</td>";
																					echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['users']["columns"]['tagline']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['users']["columns"]['tagline']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['users']["columns"]['tagline']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['tagline']) .'" target="_blank" class="uploaded_file" id="link_tagline">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['tagline'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['users']["columns"]['cv']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['users']["columns"]['cv']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['users']["columns"]['cv']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['cv']) .'" target="_blank" class="uploaded_file" id="link_cv">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['cv'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['users']["columns"]['Nationality']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['users']["columns"]['Nationality']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['users']["columns"]['Nationality']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['Nationality']) .'" target="_blank" class="uploaded_file" id="link_Nationality">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['Nationality'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['users']["columns"]['Freelance']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['users']["columns"]['Freelance']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['users']["columns"]['Freelance']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['Freelance']) .'" target="_blank" class="uploaded_file" id="link_Freelance">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['Freelance'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['users']["columns"]['map_location']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['users']["columns"]['map_location']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['users']["columns"]['map_location']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['map_location']) .'" target="_blank" class="uploaded_file" id="link_map_location">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['map_location'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['users']["columns"]['Facebook']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['users']["columns"]['Facebook']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['users']["columns"]['Facebook']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['Facebook']) .'" target="_blank" class="uploaded_file" id="link_Facebook">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['Facebook'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['users']["columns"]['Github']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['users']["columns"]['Github']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['users']["columns"]['Github']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['Github']) .'" target="_blank" class="uploaded_file" id="link_Github">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['Github'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['users']["columns"]['Linkedin']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['users']["columns"]['Linkedin']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['users']["columns"]['Linkedin']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['Linkedin']) .'" target="_blank" class="uploaded_file" id="link_Linkedin">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['Linkedin'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['users']["columns"]['Whatsapp']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['users']["columns"]['Whatsapp']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['users']["columns"]['Whatsapp']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['Whatsapp']) .'" target="_blank" class="uploaded_file" id="link_Whatsapp">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['Whatsapp'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t";											echo "<td>";
											// Check if the column is file upload
											// echo '<pre>';
											// print_r($tables_and_columns_names['users']["columns"]['experience_working']);
											// echo '</pre>';
											$has_link_file = isset($tables_and_columns_names['users']["columns"]['experience_working']['is_file']) ? true : false;
											if ($has_link_file){
											    $is_file = $tables_and_columns_names['users']["columns"]['experience_working']['is_file'];
											    $link_file = $is_file ? '<a href="uploads/'. htmlspecialchars($row['experience_working']) .'" target="_blank" class="uploaded_file" id="link_experience_working">' : '';
											    echo $link_file;
											}
											echo nl2br(htmlspecialchars($row['experience_working'] ?? ""));
											if ($has_link_file){
											    echo $is_file ? "</a>" : "";
											}
											echo "</td>"."\n\t\t\t\t\t\t\t\t\t\t\t\t"; ?>
                                                <td>
                                                    <?php
                                                    $column_id = 'id';
                                                    if (!empty($column_id)): ?>
                                                        <a id='read-<?php echo $row['id']; ?>' href='users-read.php?id=<?php echo $row['id']; ?>' title='<?php echo addslashes(translate('View Record', false)); ?>' data-toggle='tooltip' class='btn btn-sm btn-info'><i class='far fa-eye'></i></a>
                                                        <a id='update-<?php echo $row['id']; ?>' href='users-update.php?id=<?php echo $row['id']; ?>' title='<?php echo addslashes(translate('Update Record', false)); ?>' data-toggle='tooltip' class='btn btn-sm btn-warning'><i class='far fa-edit'></i></a>
                                                        <a id='delete-<?php echo $row['id']; ?>' href='users-delete.php?id=<?php echo $row['id']; ?>' title='<?php echo addslashes(translate('Delete Record', false)); ?>' data-toggle='tooltip' class='btn btn-sm btn-danger'><i class='far fa-trash-alt'></i></a>
                                                    <?php else: ?>
                                                        <?php echo addslashes(translate('unsupported_no_pk')); ?>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>


                                <ul class="pagination" align-right>
                                <?php
                                    $new_url = preg_replace('/&?pageno=[^&]*/', '', $currenturl);
                                    ?>
                                    <li class="page-item"><a class="page-link" href="<?php echo $new_url .'&pageno=1' ?>"><?php translate('First') ?></a></li>
                                    <li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
                                        <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo $new_url ."&pageno=".($pageno - 1); } ?>"><?php translate('Prev') ?></a>
                                    </li>
                                    <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                                        <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo $new_url . "&pageno=".($pageno + 1); } ?>"><?php translate('Next') ?></a>
                                    </li>
                                    <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                                        <a class="page-item"><a class="page-link" href="<?php echo $new_url .'&pageno=' . $total_pages; ?>"><?php translate('Last') ?></a>
                                    </li>
                                </ul>

                                <?php mysqli_free_result($result); ?>
                            <?php else: ?>
                            <p class='lead'><em><?php translate('No records were found.') ?></em></p>
                        <?php endif ?>

                    <?php else: ?>
                        <div class="alert alert-danger" role="alert">
                            ERROR: Could not able to execute <?php echo $sql. " " . mysqli_error($link); ?>
                        </div>
                    <?php endif ?>

                    <?php mysqli_close($link) ?>
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

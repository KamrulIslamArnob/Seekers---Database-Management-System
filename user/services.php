<?php
    
    session_start();
    $conn = mysqli_connect("localhost","root","1","seekers_database") or die("connection failed");
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />

    <link rel="stylesheet" href="../assets/libs/choices.js/public/assets/styles/choices.min.css">
    <!-- Nouislider Css -->
    <link rel="stylesheet" href="../assets/libs/nouislider/nouislider.min.css">

    <link rel="stylesheet" href="../assets/css/icons.css" />
    <link rel="stylesheet" href="../assets/css/tailwind.css" />
</head>
<body class="flex flex-col h-screen">

    <?php 
        include('nav1.php');
    ?>

    <section class="mt-20 flex-grow flex items-center justify-center">

        <div class="container flex-grow flex items-center justify-center">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Service Logo</th>
                        <th class="py-2 px-4 border-b">Job ID</th>
                        <th class="py-2 px-4 border-b">User Id</th>
                        <th class="py-2 px-4 border-b">Job Title</th>
                        <th class="py-2 px-4 border-b">Description</th>
                        <th class="py-2 px-4 border-b">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM services WHERE user_id = {$_SESSION['user_id']}";
                        $result = mysqli_query($conn,$sql) or die("query failed");
                        if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_assoc($result))
                            {
                       

                    ?>
                    <tr>
                        <td class='py-2 px-4 border-b'><?php echo $row['service_logo']?></td>
                        <td class='py-2 px-4 border-b'><?php echo $row['job_id']?></td>
                        <td class='py-2 px-4 border-b'><?php echo $row['user_id']?></td>
                        <td class='py-2 px-4 border-b'><?php echo $row['job_title']?></td>
                        <td class='py-2 px-4 border-b'><?php echo $row['description']?></td>
                        <td class='py-2 px-4 border-b'>
                        <a href='edit-service.php?service_id=<?php echo $row['service_id']; ?>' class='text-blue-500 hover:underline mr-2'>Edit</a>
                            <a href='delete-service.php?service_id=<?php echo $row['service_id']; ?>' class='text-red-500 hover:underline' onclick="return confirm('Are you sure you want to delete this service?');">Delete</a>
                        </td>
                    </tr>
                    <?php
                         }
                        }else{
                            echo "No data found";
                         }
                    ?>
                </tbody>
            </table>
           
        </div>
        
    </section>
    <button  class=" mt-5 mb-5 bg-purple-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
               <a href="add-services.php">Add Services</a>
            </button>
    <?php
        include('footer.php')
    ?>

    <script src="https://unicons.iconscout.com/release/v4.0.0/script/monochrome/bundle.js"></script>
    <script src="../assets/libs/@popperjs/core/umd/popper.min.js"></script>
    <script src="../assets/libs/simplebar/simplebar.min.js"></script>

    <script src="../assets/js/pages/switcher.js"></script>

    <!-- Choice Js -->
    <script src="../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

    <script src="../assets/js/pages/candidate.init.js"></script>

    <script src="../assets/js/pages/dropdown&modal.init.js"></script>

    <script src="../assets/js/pages/nav&tabs.js"></script>

    <script src="../assets/js/app.js"></script>
</body>
</html>

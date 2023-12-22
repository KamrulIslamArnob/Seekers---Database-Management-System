<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Edit Profile</title>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded shadow-md w-96">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Edit Profile</h2>

        <form action="process-edit-profile.php" method="post">
            <div class="mb-4">
                <label for="fullName" class="block text-sm font-medium text-gray-600">Full Name</label>
                <input type="text" id="fullName" name="fullName" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" id="email" name="email" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-600">Phone</label>
                <input type="tel" id="phone" name="phone" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-600">Location</label>
                <input type="text" id="location" name="location" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="flex items-center">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save Changes</button>
                <a href="admin-profile.php" class="text-gray-500 ml-2 hover:underline">Cancel</a>
            </div>
        </form>
    </div>

</body>
</html>
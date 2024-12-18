<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

    <div class="sidebar">
        <h2 class="text-center">Admin Panel</h2>
        <ul>
            <li><a href="{{ route('admin.categories.index') }}">Manage Categories</a></li>
            <li><a href="{{ route('admin.users.index') }}">Manage Users</a></li>
        </ul>
    </div>

    <div class="content">
        <div class="container mt-4">
            <h1 class="mb-4">Admin Dashboard</h1>
            <p>Welcome to the admin dashboard. Use the links in the sidebar to manage categories and users.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>

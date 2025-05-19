<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            display: flex;
            height: 100vh;
            background-color: #f4f4f4;
        }

        /* Sidebar styles */
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            padding: 20px;
            height: 100%;
            position: fixed;
        }

        .sidebar h2 {
            margin-bottom: 30px;
            font-size: 24px;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: white;
            font-size: 18px;
            transition: 0.2s;
        }

        .sidebar ul li a:hover {
            color: #17a2b8;
        }

        /* Main content styles */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        a {
            text-decoration: none;
            color: #007BFF;
        }

        a:hover {
            text-decoration: underline;
        }

        .actions {
            display: flex;
            justify-content: space-between;
        }

        .actions a {
            margin-right: 10px;
        }

        .add-user {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .add-user:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h2>Menu</h2>
    <ul>
        <li><a href="index.php">Dashboard</a></li>
        <li><a href="add_user.php">Add User</a></li>
        <li><a href="view_users.php">View Users</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>

<!-- Main content -->
<div class="main-content">
    <h2>User List</h2>

    <?php
    include_once('config.php');

    // Prepare the SQL query and execute it
    $sql = "SELECT * FROM users";
    $getUser = $conn->prepare($sql);
    $getUser->execute();

    // Fetch all users from the database
    $users = $getUser->fetchAll();
    ?>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?=$user['id'] ?></td>
                    <td><?=$user['name'] ?></td>
                    <td><?=$user['surname'] ?></td>
                    <td><?=$user['email'] ?></td>
                    <td class="actions">
                        <a href="delete.php?id=<?=$user['id'] ?>">Delete</a>
                        <a href="edit.php?id=<?=$user['id'] ?>">Update</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <a href="index.php" class="add-user">Add User</a>
</div>

</body>
</html>

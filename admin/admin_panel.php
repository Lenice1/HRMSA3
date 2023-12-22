<?php
session_start();
require_once '../config.php';


if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}


if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];

    if ($action === 'view') {

        $view_query = "SELECT * FROM subscribers WHERE id = $id";
        $result = $conn->query($view_query);
        $subscriber = $result->fetch_assoc();
    } elseif ($action === 'edit') {
    

        $edit_query = "SELECT * FROM subscribers WHERE id = $id";
        $result = $conn->query($edit_query);
        $subscriber = $result->fetch_assoc();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $gender = mysqli_real_escape_string($conn, $_POST['gender']);
            $address = mysqli_real_escape_string($conn, $_POST['address']);

            $update_query = "UPDATE subscribers SET name='$name', email='$email', gender='$gender', address='$address' WHERE id=$id";

            if ($conn->query($update_query) === TRUE) {
                header('Location: admin_panel.php');
                exit();
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    } elseif ($action === 'delete') {


        $delete_query = "DELETE FROM subscribers WHERE id = $id";

        if ($conn->query($delete_query) === TRUE) {
            header('Location: admin_panel.php');
            exit();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        header('Location: admin_panel.php');
        exit();
    }
} else {


    $list_query = "SELECT * FROM subscribers";
    $result = $conn->query($list_query);
    $subscribers = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<?php include '../includes/header.php'; ?>

<h2>Admin Panel</h2>

<?php if (isset($subscriber)): ?>

    
    <h3><?php echo $subscriber['name']; ?>'s Details</h3>
    <p>Name: <?php echo $subscriber['name']; ?></p>
    <p>Gender: <?php echo $subscriber['gender']; ?></p>
    <p>Address: <?php echo $subscriber['address']; ?></p>
   
    
    <?php if (isset($_GET['action']) && $_GET['action'] === 'view'): ?>
        <a href="admin_panel.php">Back to Admin Panel</a>
    <?php elseif (isset($_GET['action']) && $_GET['action'] === 'edit'): ?>
        <h4>Edit Subscriber</h4>
        <form action="admin_panel.php?action=edit&id=<?php echo $id; ?>" method="post">
           <input type="text" name="name" value= "<?php echo $subscriber['name']; ?>">
           <input type="text" name="gender" value= "<?php echo $subscriber['gender']; ?>">
           <input type="text" name="address" value= "<?php echo $subscriber['address']; ?>">
            <input type="submit" value="Update">
        </form>
    <?php endif; ?>

<?php else: ?>
 
    <h3>All Subscribers</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($subscribers as $subscriber): ?>
            <tr>
                <td><?php echo $subscriber['id']; ?></td>
                <td><?php echo $subscriber['name']; ?></td>
                <td><?php echo $subscriber['email']; ?></td>
                <td><?php echo $subscriber['gender']; ?></td>
                <td><?php echo $subscriber['address']; ?></td>
                <td>
                    <a href="admin_panel.php?action=view&id=<?php echo $subscriber['id']; ?>">View</a> |
                    <a href="admin_panel.php?action=edit&id=<?php echo $subscriber['id']; ?>">Edit</a> |
                    <a href="admin_panel.php?action=delete&id=<?php echo $subscriber['id']; ?>" onclick="return confirm('Are you sure you want to delete this subscriber?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<?php include '../includes/footer.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    justify-content: center;
    align-items: center;
    display: flex;
    background-color: #f4f4f4;
}

.main-container {
    display: flex;
    gap: 20px;
    align-items: flex-start;
    max-width: 100%;
    width: 100%;
}
.form-container {
    background-color: #fff;
    padding: 30px;
    border: 2px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 1);
    width: 350px;
    max-width: 100%;
}

.form-container label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #555;

}

.form-container h2{
    text-align: center;
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

.form-container 
input[type="text"],
.form-container
input[type="number"] {
    margin-bottom: 15px;
    width: calc(100% - 16px);
    padding: 10px;
    border: 1px #ccc;
    border-radius: 5px;
    font-size: 16px;
    outline: none;

}
.form-container button{
    margin-right: 10px;
    margin-bottom: 10px;
    cursor: pointer;
    font-size: 16px;
    color: white;
    border-radius: 5px;
    border: none;
    background-color: #5cb85c;
    padding: 10px;
    width: calc(50% - 10px);
}

.form-container button: last-child{
    margin-right: 0;
}

.form-container button:hover {
    background-color: #4cae4c;
}  

.form-container .btn-group{
    display: flex;
    justify-content: space-between;
}

.table-container {
    background-color: #fff;
    padding: 20px;
    border: 2px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 1);
    width: 100%;
    max-width: 600px;
}

.table-container h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
}


th , table , td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: left;

}
th{
    background-color: #f2f2f2;
}

</style>
</head>
<body>
<div class="main-container" >  
    <div class="form-container">    
        <h2>Employee Management System</h2>
        <form method="post" action="">
            <label for="id">Employee ID for(update/delete):</label>
            <input type="number" id="id" name="id"><br>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name"><br>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age"><br>

            <label for="gender">Gender:</label>
            <input type="text" id="gender" name="gender"><br>

            <label for="department">Department:</label>
            <input type="text" id="department" name="department"><br>

            <label for="contact">Contact:</label>
            <input type="number" id="contact" name="contact"><br>

            <div class="btn-group">

                <button type="submit" name="action" value="create">Create</button>
                <button type="submit" name="action" value="read">Read</button>
                <button type="submit" name="action" value="update">Update</button>
                <button type="submit" name="action" value="delete">Delete</button>
            </div>
        </form>
    </div>
    <div class="table-container">
        <h2>Employee List</h2>  
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Department</th>
                    <th>Contact</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>100</td>
                    <td>steller</td>
                    <td>20</td>
                    <td>f</td>
                    <td>ist</td>
                    <td>0767225383</td>
                </tr>
            </tbody>

        </table>
    </div>      
</div>

<?php
include 'db.php';
if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $action = $_POST['action'];
    switch ($action) {
        case 'create':
            createEmployee();
            break;
            case 'read':

            readEmployee();
            break;
            case 'update':

            updateEmployee();
            break;
            case 'delete':

            deleteEmployee();
            break;


    }
}

function createEmployee(){
    global $conn;
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $department = $_POST['department'];
    $contact = $_POST['contact'];

    $sql = "INSERT INTO employee (id, name, age, gender, department, contact) VALUES ('$id', '$name', '$age', '$gender', '$department', '$contact')";
    if($conn->query($sql) === TRUE){
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
if (isset($_POST['read'])) {
    readEmployee($conn);
}
function readEmployee($conn){
    $result = mysqli_query($conn, "SELECT * FROM employee");
        if (mysqli_num_rows($result) > 0){
            echo "<table>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Name</th>";
            echo "<th>Age</th>";
            echo "<th>Gender</th>";
            echo "<th>Department</th>";
            echo "<th>Contact</th>";
            echo "</tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['department'] . "</td>";
                echo "<td>" . $row['contact'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No employees found</p>";
    } 
}


function updateEmployee(){
    global $conn;
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $department = $_POST['department'];
    $contact = $_POST['contact'];


    if (empty($id)) {
        echo "ID is requided for updating an employee record";
        return;
    } 


    $id = $conn->real_escape_string($id);
    $name = $conn->real_escape_string($name);
    $age = $conn->real_escape_string($age);
    $gender = $conn->real_escape_string($gender);
    $department = $conn->real_escape_string($department);
    $contact = $conn->real_escape_string($contact);


    $sql = "UPDATE employee SET name='$name', age='$age', gender='$gender', department='$department', contact='$contact' WHERE id=$id";
    if($conn->query($sql) === TRUE){
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


function deleteEmployee() {
    global $conn;
    $id = $_POST['id'];

    if (empty($id)) {
        echo "ID is requided for deleting an employee record";
        return;
    } 


    $id = $conn->real_escape_string($id);

    $sql = "DELETE FROM employee WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>   
</body>
</html>
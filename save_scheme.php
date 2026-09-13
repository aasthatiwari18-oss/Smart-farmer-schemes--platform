<?php
$conn = mysqli_connect("localhost", "root", "", "scheme_project_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Land aur Crop ko yahan se hata dein kyunki database mein column nahi hai
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $age = (int)$_POST['age'];
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $area = mysqli_real_escape_string($conn, $_POST['area']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $disability = mysqli_real_escape_string($conn, $_POST['disability']);
    $student = mysqli_real_escape_string($conn, $_POST['student']);
    $income = (float)$_POST['income'];
    $members = (int)$_POST['members'];
    $bpl = mysqli_real_escape_string($conn, $_POST['bpl']);

    // Query mein sirf wahi column rakhein jo aapke Table Structure mein hain
    $sql = "INSERT INTO user_searches (gender, age, state, area, category, disability, student, income, members, bpl)
            VALUES ('$gender', '$age', '$state', '$area', '$category', '$disability', '$student', '$income', '$members', '$bpl')";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => mysqli_error($conn)]);
    }
}
mysqli_close($conn);
?>
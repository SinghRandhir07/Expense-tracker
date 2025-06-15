<?php
include 'dp.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);
    $amount = $_POST['amount'];
    $category = $_POST['category'];

    if ($title !== "" && $amount > 0 && $category !== "") {
        $stmt = $conn->prepare("INSERT INTO expenses (title, amount, category) VALUES (?, ?, ?)");

        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("sds", $title, $amount, $category);
        $stmt->execute();
        $stmt->close();

        // Return the newly added expense as JSON
        echo json_encode([
            'title' => $title,
            'amount' => $amount,
            'category' => $category
        ]);
    } else {
        echo json_encode(['error' => 'Invalid input']);
    }
    exit();
}
?>

<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

require_once('includes/config.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $componentName = $_POST['componentName'];
    // $state = $_POST['state'];
    $dispenseAmount = $_POST['dispense_amount'];

    $sql = "UPDATE components_control SET dispense_amount=? WHERE component_name = ?";
    $stmt = $conn->prepare($sql);
    $data = array($dispenseAmount, $componentName);
    $stmt->execute($data);

    // echo "Data saved successfully";
    echo json_encode(['status' => 'success', 'message' => 'Data saved successfully']);
} else {
    // echo "Invalid request method";
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
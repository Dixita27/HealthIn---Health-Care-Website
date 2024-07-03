<?php
require_once 'vendor/autoload.php'; // Include TCPDF library

// Retrieve booking details from URL parameters
$name = $_GET['name'];
$email = $_GET['email'];
$mobile_no = $_GET['mobile_no'];
$doctor = $_GET['doctor'];
$appointmentDate = $_GET['appointmentDate'];
$reason = $_GET['reason'];

// Function to generate PDF with appointment details
function generatePDF($name, $email, $mobile_no, $doctor, $appointmentDate, $reason) {
    // Create new PDF instance
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator('HealthIn.com');
    $pdf->SetAuthor('HealthIn.com');
    $pdf->SetTitle('Appointment Details');
    $pdf->SetSubject('Appointment Details');
    $pdf->SetKeywords('Appointment, Details, HealthIn');

    // Set default header data
    $pdf->SetHeaderData('healthin', 20, 'Appointment Details', 'HealthIn.com');

    // Set margins
    $pdf->SetMargins(15, 15, 15); // Left, Top, Right
    $pdf->SetHeaderMargin(10);
    $pdf->SetFooterMargin(10);

    // Set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, 10);

    // Set font
    $pdf->SetFont('helvetica', '', 11);

    // Add a page
    $pdf->AddPage();

    // Add content to the PDF
    $content = "
        <h1>Appointment Details</h1>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone Number:</strong> $mobile_no</p>
        <p><strong>Doctor:</strong> $doctor</p>
        <p><strong>Appointment Date:</strong> $appointmentDate</p>
        <p><strong>Reason for Appointment:</strong> $reason</p>
    ";
    $pdf->writeHTML($content, true, false, true, false, '');

    // Output PDF
    $pdf->Output('Appointment_Details.pdf', 'D');
}

// Generate PDF with appointment details
generatePDF($name, $email, $mobile_no, $doctor, $appointmentDate, $reason);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        h2 {
            text-align: center;
        }
        .details {
            margin-bottom: 20px;
        }
        .details label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Confirmation Page</h2>
        <div class="details">
            <label for="name">Name:</label>
            <span><?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?></span>
        </div>
        <div class="details">
            <label for="email">Email:</label>
            <span><?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?></span>
        </div>
        <div class="details">
            <label for="message">Message:</label>
            <span><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></span>
        </div>
        <!-- Add more fields as needed -->
    </div>
</body>
</html>

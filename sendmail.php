<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require('fpdf/fpdf.php'); // Include the FPDF library

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $company_name = htmlspecialchars($_POST['company_name']);
    $website_address = htmlspecialchars($_POST['website_address']);
    $social_link = htmlspecialchars($_POST['social_link']);
    $message = htmlspecialchars($_POST['message']);
    $selectedType = htmlspecialchars($_POST['selectedType']);
    $supportType = htmlspecialchars($_POST['supportType']);
    $selectedPackage = htmlspecialchars($_POST['selectedPackage']);

    // Create instance of FPDF
    $pdf = new FPDF();
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('Arial', 'B', 16);

    // Title
    $pdf->Cell(0, 10, 'Order Summary', 0, 1, 'C');

    // Line break
    $pdf->Ln(10);

    // Customer Details
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(50, 10, 'Name:');
    $pdf->Cell(100, 10, $name, 0, 1);
    
    $pdf->Cell(50, 10, 'Email:');
    $pdf->Cell(100, 10, $email, 0, 1);
    
    $pdf->Cell(50, 10, 'Phone:');
    $pdf->Cell(100, 10, $phone, 0, 1);
    
    $pdf->Cell(50, 10, 'Company Name:');
    $pdf->Cell(100, 10, $company_name, 0, 1);
    
    $pdf->Cell(50, 10, 'Website Address:');
    $pdf->Cell(100, 10, $website_address, 0, 1);
    
    $pdf->Cell(50, 10, 'Social Link:');
    $pdf->Cell(100, 10, $social_link, 0, 1);
    
    $pdf->Cell(50, 10, 'Selected Type:');
    $pdf->Cell(100, 10, $selectedType, 0, 1);
    
    $pdf->Cell(50, 10, 'Support Type:');
    $pdf->Cell(100, 10, $supportType, 0, 1);
    
    $pdf->Cell(50, 10, 'Selected Package:');
    $pdf->Cell(100, 10, $selectedPackage, 0, 1);
    
    // Output the PDF
    $pdf->Output('F', 'order_summary.pdf'); // Save the file to the server as 'order_summary.pdf'

    // Send the email with PDF attachment
    $to = 'shahidur.com@hotmail.com';
    $subject = 'New Order Submission with Invoice';
    $message = 'Please find the attached order summary Invoice.';
    
    $headers = "From: $email";
    $attachment = chunk_split(base64_encode(file_get_contents('order_summary.pdf')));
    
    $boundary = md5(time());
    $headers .= "\r\nMIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";
    
    // Email message body
    $body = "--$boundary\r\n";
    $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
    $body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $body .= "$message\r\n";
    
    // PDF attachment
    $body .= "--$boundary\r\n";
    $body .= "Content-Type: application/pdf; name=\"order_summary.pdf\"\r\n";
    $body .= "Content-Disposition: attachment; filename=\"order_summary.pdf\"\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
    $body .= "$attachment\r\n";
    $body .= "--$boundary--";

    // Send email with attachment
    if (mail($to, $subject, $body, $headers)) {
        header("Location: index.php?status=success");
    } else {
        header("Location: index.php?status=error");
    }
}
?>
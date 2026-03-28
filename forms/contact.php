<?php
require __DIR__ . '/vendor/autoload.php'; // Include Composer autoload (for Twilio SDK)
use Twilio\Rest\Client;

// Twilio credentials
$account_sid = 'YOUR_TWILIO_ACCOUNT_SID';
$auth_token = 'YOUR_TWILIO_AUTH_TOKEN';
$twilio_whatsapp_number = 'whatsapp:+14155238886'; // Twilio Sandbox WhatsApp Number
$recipient_whatsapp_number = 'whatsapp:+917904308703'; // Your WhatsApp Number

// Retrieve form data
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message_content = $_POST['message'] ?? '';

// Construct WhatsApp message
$message = "New Contact Form Submission:\nName: $name\nEmail: $email\nMessage: $message_content";

// Send WhatsApp message
try {
    $twilio = new Client($account_sid, $auth_token);
    $twilio->messages->create(
        $recipient_whatsapp_number,
        [
            'from' => $twilio_whatsapp_number,
            'body' => $message
        ]
    );
    echo 'WhatsApp message sent successfully';
} catch (Exception $e) {
    echo 'Failed to send WhatsApp message: ' . $e->getMessage();
}
?>
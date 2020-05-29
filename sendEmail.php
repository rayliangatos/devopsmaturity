<?php
require __DIR__ . '/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use Knp\Snappy\Pdf;

$cookie_name = 'devopsassessment';
$pdfKey = rand();
$pdfFileName = 'devops-maturity-results-'.$pdfKey.'.pdf';
$fullPdfFile = 'pdfs/'.$pdfFileName;
$hostURL = $_SERVER['HTTP_HOST'];
//Use below line if on local server
//$fullURL = $hostURL.'/viewResults.php';
//use below line if on aws server
$fullURL = $hostURL.'/devopsmaturity/viewResults.php';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $fullURL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = [
    'X-Apple-Tz: 0',
    'X-Apple-Store-Front: 143444,12',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
    'Accept-Encoding: gzip, deflate',
    'Accept-Language: en-US,en;q=0.5',
    'Cache-Control: no-cache',
    'Content-Type: application/x-www-form-urlencoded; charset=utf-8',
    'Cookie: devopsassessment='.$_COOKIE[$cookie_name],
    'Host: '.$hostURL,
    'Referer: '.$fullURL, //Your referrer address
    'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:28.0) Gecko/20100101 Firefox/28.0',
    'X-MicrosoftAjax: Delta=true'
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$server_output = curl_exec ($ch);

curl_close ($ch);

//print $server_output;
//Use below line if on local server
//$snappy = new Pdf('wkhtmltopdf.exe');
//use below line if on aws server
$snappy = new Pdf('/usr/local/bin/wkhtmltopdf');

$snappy->generateFromHtml($server_output, $fullPdfFile);

$name =  isset($_POST['name'])? $_POST['name']:'';
$organisation = isset($_POST['organisation'])? $_POST['organisation']:'';
$contactEmail = isset($_POST['contactEmail'])? $_POST['contactEmail']:'';
$telephoneNumber = isset($_POST['telephoneNumber'])? $_POST['telephoneNumber']:'';
$furtherContact = isset($_POST['furtherContact'])? $_POST['furtherContact']:'';

$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'flairbpss@gmail.com';                     // SMTP username
    $mail->Password   = 'Bpss2020!';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('flairbpss@gmail.com', 'Atos DevOps Maturity Assessment');
    //$mail->addAddress('ray.liang@atos.net');
    //$mail->addCC('hiwild@hotmail.com');
    $mail->addCC('ray.liang@atos.net');
    $mail->addCC('dorian.seabrook@atos.net');
    $mail->addCC('justin.healey@atos.net');
    //$mail->addBCC('hiwild@hotmail.com');
    //$mail->addBCC('dl-bps-flair-coe@atos.net');

    // Attachments
    $mail->addAttachment($fullPdfFile);         // Add attachments

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $name.' has submitted a devops maturity assessment';
    $mail->Body    = '<p>The user below has submitted a devops maturity assessment</p>'
        .'<p>Name:'.$name.'</p>'
        .'<p>Organisation:'.$organisation.'</p>'
        .'<p>Email:'.$contactEmail.'</p>'
        .'<p>Telephone Number:'.$telephoneNumber.'</p>';
        $mail->AltBody = $name.' has submitted a devops maturity assessment';
        //echo "furtherContact is: " . $furtherContact;
        if($furtherContact == 'yes'){
            sleep(10);
            $mail->send();
        }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>

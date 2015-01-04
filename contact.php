<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

  $name = trim($_POST["name"]);
  $email = trim($_POST["email"]);
  $message = trim($_POST["message"]);


  if($name == "" OR $email == "" OR $message == "") {

    echo "You must specify a value for name, email address, and message.";
    exit;

  }

  foreach($_POST as $value) {

    if(stripos($value, 'Content-Type:') != FALSE) {
      echo "There was a problem with the information you entered.";
      exit;
    }

  }

  if($_POST ["address"] != "") {
    echo "Your form has an error";
    exit;
  }

  require_once('inc/phpmailer/class.phpmailer.php');

  $mail = new PHPMailer();

  if (!$mail -> ValidateAddress($email)) {
    echo "You must specify a valid email address.";
    exit;
  }

  $email_body = "";
  $email_body = $email_body . "Name: " . $name . "<br> ";
  $email_body = $email_body . "Email: " . $email . "<br>";
  $email_body = $email_body . "Message: " . $message . "<br>";

  $body             = file_get_contents('contents.html');
  $body             = eregi_replace("[\]",'',$body);

  $mail->SetFrom($email, $name);

  $address = "wgallop99@gmail.com";
  $mail->AddAddress($address, "John Doe");

  $mail->Subject    = "Shirts 4 Mike Contact Form Submission | " . $name;

  $mail->MsgHTML($body);

  if(!$mail->Send()) {
    echo "There was a problem sending the email: " . $mail->ErrorInfo;
  }

  header("Location: contact-thanks.php?$status=thanks");
  exit;
}

?>

<?php

$pageTitle = "Contact Mike";
$section = "contact";

include('inc/header.php'); ?>

    <div class="section page">

      <div class="wrapper">


        <h1>Contact</h1>

        <?php if(isset($_GET["STATUS"]) AND $_GET["STATUS"] == "thanks"){

          echo "<p>Thanks for the email! I'll be in touch shortly.</p>";

        } else {

          echo "WE HATE PEOPLE";

        };

        ?>

        <p>
          I'd love to hear from you! Complete the form to send me an email.
        </p>

        <form id="form_id" method="post" action="contact.php">

          <table>

            <tr>
              <th>
                <label for="name">Name</label>

              </th>

              <td>
                <input type="text" name="name" id="name">
              </td>
            </tr>

            <tr>

              <th>
                <label for="email">Email</label>
              </th>

              <td>
                <input type="text" name="email" id="email">
              </td>

            </tr>

            <tr>

              <th>
                <label for="message">Message</label>
              </th>

              <td>
                <textarea name="message" id="message"></textarea>
              </td>
            </tr>
            <tr style="display: none;">
              <th>
                <label for="address">Address</label>
              </th>
              <td>
                <input type="text" name="address" id="address">
                <p>
                  Humans: please leave this field blank.
                </p>
              </td>
            </tr>
          </table>

          <input type="submit" value="Send">

        </form>

      </div>

    </div>

<?php include("inc/footer.php"); ?>

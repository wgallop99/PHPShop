<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  $email_body = "";
  $email_body = $email_body . "Name: " . $name . "<br> ";
  $email_body = $email_body . "Email: " . $email . "<br>";
  $email_body = $email_body . "Message: " . $message . "<br>";

  // TODO: send email

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
          </table>

          <input type="submit" value="Send">

        </form>

      </div>

    </div>

<?php include("inc/footer.php"); ?>

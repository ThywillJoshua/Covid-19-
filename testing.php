<?php 
include_once "header.php";

require_once "./include/dbh.inc.php";

// get input
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $fullName = $_POST ['fullName'];
  $dateOfBirth = $_POST ['dateOfBirth'];
  $idNumber = $_POST ['idNumber'];
  $email = $_POST ['email'];
  $physicallyImpaired = $_POST ['physicallyImpaired'];
  $homeAddress = $_POST ['homeAddress'];
  $zipcode = $_POST ['zipcode'];

  require_once "./include/functions.inc.php";

  // error handlers
  if (emptyInput($fullName, $dateOfBirth,  $idNumber, $email) != false) {
    header("location: ./testing.php?error=emptyinput");
    exit();
  }

  // add to data base table
  addTesting($conn, $fullName, $dateOfBirth,  $idNumber, $email, $physicallyImpaired, $homeAddress, $zipcode);

}

?>

<!-- empty input alerts -->

<?php

 $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

 if (strpos($fullUrl, "error=emptyinput") == true) {

  echo '<div class="alert alert-danger alert-message"> <h3>Please fill in all fields!</h3> </div>';

 }


?>

<main>
    <section class="landingview-item covid-test">
          <h2>Get Tested For Covid-19</h2>
          
          <form action="testing.php" method="post">

            <div class="forminput">

              <div class="single-input">
                <label for="name">Full Name</label><br />
                <input class="inputs" type="text" name="fullName" /><br />
              </div>

              <div class="single-input">
                <label for="name">Date Of Birth</label><br />
                <input class="inputs" type="date" name="dateOfBirth" /><br />
              </div>

              <div class="single-input">
                <label for="name">Identification Number</label><br />
                <input class="inputs" type="text" name="idNumber" /><br />
              </div>

              <div class="single-input">
                <label for="name">Email</label><br />
                <input class="inputs" type="text" name="email" /><br />
              </div>

              <div class="single-input">
                <label for="physicallyImpaired">Are you physically impaired?</label><br />
                <input type="hidden" name="physicallyImpaired" value="0" autocomplete="off"/>
                <input type="checkbox" name="physicallyImpaired" id="physicallyImpaired" value="1" autocomplete="off"/><br />
              </div>

              <div class="address-input fadeIn hide">
              <div class="single-input">
                <label for="homeAddress">Home Address</label><br />
                <input class="inputs" type="text" name="homeAddress" /><br />
              </div>

              <div class="single-input">
                <label for="name">Zipcode</label><br />
                <input class="inputs" type="text" name="zipcode" /><br />
              </div>
              </div>

          </div>

                <button type="submit" class="btn" >Confirm</button>
          </form>
    </section>
</main>

<?php 
include_once "./footer.php";
?>
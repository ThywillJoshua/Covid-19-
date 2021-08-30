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

  // error handler
  if (emptyInput($fullName, $dateOfBirth,  $idNumber, $email) != false) {
    header("location: ./index.php?error=emptyinput");
    exit();
  }

  // add to data base
  addVaccine($conn, $fullName, $dateOfBirth,  $idNumber, $email, $physicallyImpaired, $homeAddress, $zipcode);
  
  
}

?>

<!-- empty input alerts -->

<?php

 $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

 if (strpos($fullUrl, "error=emptyinput") == true) {

  echo '<div class="alert alert-danger alert-message"> <h3>Please fill in all fields!</h3> </div>';

 }


?>

      <!-- Landing View (Vaccination and Tests Main Landing)  -->
  <section class="id="landingview""> 
      <div  class="container-fluid">
      <div  class="row">
        <section class="landingview-item col-lg-6">
          

          <h1>Register for the Vaccine</h1>

          <form action="index.php" method="post">

            <div class="forminput">

              <div class="single-input">
                <label for="name">Full Name</label><br />
                <input class="inputs" type="text" name="fullName" placeholder="type your first and last name...."/><br />
              </div>

              <div class="single-input">
                <label for="name">Date Of Birth</label><br />
                <input class="inputs" type="date" name="dateOfBirth" /><br />
              </div>

              <div class="single-input">
                <label for="name">Identification Number</label><br />
                <input class="inputs" type="text" name="idNumber" placeholder="type i.d number...."/><br />
              </div>

              <div class="single-input">
                <label for="name">Email</label><br />
                <input class="inputs" type="email" name="email" placeholder="type current email address...."/><br />
              </div>

              <div class="single-input">
                <label for="physicallyImpaired">Are you physically impaired?</label><br />
                <input type="hidden" name="physicallyImpaired" value="0" autocomplete="off"/>
                <input type="checkbox" name="physicallyImpaired" id="physicallyImpaired" value="1" autocomplete="off"/><br />
              </div>

              <div class="address-input fadeIn hide">
              <div class="single-input">
                <label for="homeAddress">Home Address</label><br />
                <input class="inputs" type="text" name="homeAddress" placeholder="type full address...."/><br />
              </div>

              <div class="single-input">
                <label for="name">Zipcode</label><br />
                <input class="inputs" type="text" name="zipcode" placeholder="type your zipcode...."/><br />
              </div>
              </div>

          </div>

                <button type="submit" class="btn" >Confirm</button>
          </form>

        </section>

        <section class="landingview-item col-lg-6">

          <div class="landingview-item2">

          <h2>Get Tested For Covid-19</h2>
          <p class="landing-paragraph">
          COVID-19 vaccines are safe, effective, and free! After you’ve been fully vaccinated, 
          you can participate in many of the activities that you did prior to the pandemic. To get tested instead click the button below.
          </p>
          <div class="landingview-button">
          <a href="./testing.php" class="btn"> Click Here</a>
          </div>

          </div>

        </section>
      </div>
    </div>
  </section>
    

    <!-- Divider (Vaccine facts and Symptoms) -->
  <section id="divider" class="container-fluid">
    <div class="row">
      <section class="divider-item col-lg-6">
      <a href="./vaccine-facts.php"><h2>Vaccine Facts <i class="icon2 fas fa-arrow-right"></i></h2>
        
        <ul class="divider-ul">
          <li>Side Effects</li>
          <li>Myths</li>
        </ul>
      </a>
      </section>

      <section class="divider-item col-lg-6">
      <a href="./symptoms.php"><h2>Symptoms <i class="icon2 fas fa-arrow-right"></i></h2>
        
        <ul class="divider-ul">
          <li>Symptoms of Covid-19</li>
          <li>Get Tested</li>
        </ul>
        </a>
      </section>
    </div>
  </section>

    <!-- Second View  -->
  <section class="container-fluid">
    <div id="secondview" class="row ">
      <section class="secondview-item col-lg-6">
      <a href="./cases-data.php"> <h2>Cases & Data <i class="icon2 fas fa-arrow-right"></i></h2> 
        <p>
          A view of the overall cases a deaths related to Covid-19 pandemic. <br>
          Data is updated every 20 minutes.
        </p>
        </a>
      </section>
      <section class="secondview-item col-lg-6">
      <a href="./travel.php"><h2>Travel<i class="icon2 fas fa-arrow-right"></i></h2>
        <p>
          Learn the latest social distancing rules and restrictions. <br>
          Learn the latest quarantine and isolation rules.
        </p>
      </a>
      </section>
      <section class="secondview-item col-lg-6">
      <a href="./latest-news.php"><h2>Latest News <i class="icon2 fas fa-arrow-right"></i></h2>
        <p>
          Find the latest news on Covid-19 pandemic. <br>
          News sources are cited and verified.
        </p>
      </a>
      </section>
      <section class="secondview-item col-lg-6">
      <a href="./emergency-contacts.php"><h2>Emergency Contacts <i class="icon2 fas fa-arrow-right"></i></h2>
        <p>
          Incase of Emergencies, use the number and adresses here.
        </p>
      </a>
      </section>
    </div>
  </section>

  <?php 
include_once "footer.php";
?>



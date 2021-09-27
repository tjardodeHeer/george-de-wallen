<?php
 if (!(isset($_GET["content"]) && isset($_GET["em"]) && isset($_GET["pwh"]))){
  header("Location: ./index.php?content=message&alert=hacker-alert");
 }
?>

<div class="container mt-5">
  <div class="row">
    <div class="col-12 col-sm-6">
      <form action="./index.php?content=activate_script" method="post">
        <div class="form-group">
          <label for="inputPassword">Kies een nieuw wachtwoord:</label>
          <input name="password" type="password" class="form-control" id="inputPassword" aria-describedby="passwordHelp" autofocus>
          <small id="passwordHelp" class="form-text text-muted">Kies een veilig wachtwoord..</small>
        </div>
        <div class="form-group">
          <label for="inputPasswordCheck">Type het wachtwoord opnieuw:</label>
          <input name="passwordCheck" type="password" class="form-control" id="inputPasswordCheck" aria-describedby="passwordHelpCheck">
          <small id="passwordHelpCheck" class="form-text text-muted">Ter controle voert u nogmaals uw wachtwoord in...</small>
        </div>
        <div class = "row">
          <div class="col-4">
            <div class="form-group">
              <label for="inputFirstName">Voornaam:</label>
              <input name="FirstName" type="text" class="form-control" id="inputFirstName" aria-describedby="firstNameHelp">
            </div>
          </div>
            <div class="col-4">
              <div class="form-group">
                <label for="inputInfix">Tussenvoegsel:</label>
                <input name="Infix" type="text" class="form-control" id="inputInfix" aria-describedby="InfixHelp">
              </div>
            </div>
          <div class="col-4">
            <div class="form-group">
              <label for="inputLastName">Achternaam:</label>
              <input name="LastName" type="text" class="form-control" id="inputLastName" aria-describedby="lastNameHelp">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="inputPhoneNumber">telefoon nummer:</label>
          <input name="PhoneNumber" type="tel" class="form-control" id="inputPhoneNumber" aria-describedby="phoneNumberHelp">
        </div>
        <input type="hidden" name="em" value="<?php echo $_GET["em"]; ?>">
        <input type="hidden" name="pwh" value="<?php echo $_GET["pwh"]; ?>">
        <button type="submit" class="btn btn-success btn-lg btn-block">Activeer</button>
      </form>
    </div>
    <div class="col-12 col-sm-6">
      <img src="./img/perzik.jpg" alt="perzik" class="w-75 mx-auto d-block">
    </div>
  </div>
</div>
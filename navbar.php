<?php
  $active = (isset($_GET["content"]))? $_GET["content"]: "";
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="./index.php?content=home">Vegetable Juice</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item <?php echo (in_array($active, ["home", ""]))? "active": "" ?>">
        <a class="nav-link" href="./index.php?content=home">home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item <?php echo ($active == "juices")? "active": "" ?>">
        <a class="nav-link" href="./index.php?content=juices">juices</a>
      </li>
      <li class="nav-item <?php echo ($active == "smoothies")? "active": "" ?>">
        <a class="nav-link" href="./index.php?content=smoothies">smoothies</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle <?php echo (in_array($active, ["sleep", "nutrition", "exercise"]))? "active": "" ?>" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          health education
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item <?php echo ($active == "sleep")? "active": "" ?>" href="./index.php?content=sleep">sleep</a>
          <a class="dropdown-item <?php echo ($active == "nutrition")? "active": "" ?>" href="./index.php?content=nutrition">nutrition</a>
          <a class="dropdown-item <?php echo ($active == "exercise")? "active": "" ?>" href="./index.php?content=exercise">exercise</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
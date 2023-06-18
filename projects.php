
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="projects.css" />
    <link rel="stylesheet" href="header.css" />
    <link rel="stylesheet" href="footer.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Inconsolata:wght@700&family=Indie+Flower&family=Merriweather:ital,wght@1,300&family=Montserrat:wght@900&family=Sacramento&family=Space+Mono&family=Ubuntu&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <title>Document</title>
  </head>
  <body>
    <?php 
    session_start();
    include "header.php";
    include "utils.php";
    $sql = "select * from project_data";
    
    // if(isset($_GET["city"])) {
    //   $city = $_GET["city"];
    //   $sql = "select * from project_data where city = '$city'";
    // }
    if(isset($_GET["type"])) {
      $type = $_GET["type"];
      $sql = "select * from project_data where type = '$type'";
    }
    if(isset($_GET["status"])) {
      $status = $_GET["status"];
      $sql = "select * from project_data where status = '$status'";
    }
    if(isset($_GET["type"]) && isset($_GET["city"])) {
      $type = $_GET["type"];
      $city = $_GET["city"];
      if($type == "" && $city == ""){
        $sql = "select * from project_data";

      }
      else if($city == "") {
        $sql = "select * from project_data where type = '$type'";
      }
      else {
      $sql = "select * from project_data where type = '$type' and city = '$city'";
      }
    }
    $building_list = getQuery(dbConnection(), $sql);
    ?>
    
      
      <form class="form"method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <div class="box">
        <div class="box-content">
          <select
              name="type"
              id="type" 
              onchange="populate(this.id,'type2')"
          >
            <option value="">--SELECT TYPE--</option>
            <option value="residential">Residential</option>
            <option value="commercial">Commercial</option>
            <option value="condominium">Condominium</option>
          </select>
          </div>
          <div class="box-content">
            <select name="city" id="type2">
                <option value="">--SELECT CITY--</option>
              </select>
          </div>
          <div class="box-content">
            <button class="btn" type="submit">SEARCH</button>
          </div>
          </div>
        </form>
      
    
        
    <section >
      <section
        class="selection"
        id="paginated-list"
        data-current-page="1"
        aria-live="polite"
      >

        <?php
          foreach ($building_list as $item) {
          ?>
        <section id="#">
          <div class="container-box">
            <div class="container">
              <img src="<?php echo $item["img_link"]; ?>" alt="" />
              <p>
                <strong>Project Cost: <?php echo $item["cost"]; ?></strong> <br />
                <br />
                <strong> <?php echo $item["description"]; ?></strong>
                <br />
                <br />
                <strong>Location: <?php echo $item["location"]; ?>, <?php echo $item["city"]; ?></strong>
                <br>
                <br>
                <strong>Status: "<?php echo $item["status"]; ?>"</strong>
                <br>
                <br>
                <strong>Published: 
                <?php $postUploadDate = $item["upload_date"]; // Example date

              // Convert the upload date to a Unix timestamp
              $uploadTimestamp = strtotime($postUploadDate);
          // Calculate the number of days since the post was uploaded
              $currentTimestamp = time();
              $secondsPerDay = 24 * 60 * 60;
              $daysAgo = floor(($currentTimestamp - $uploadTimestamp) / $secondsPerDay);

              echo "{$daysAgo} days ago.";?>
            </strong>
                <button class="btn" onclick="detail_viewer('details_<?php echo $item['id']; ?>')">View Details</button>
              </p>
            </div>
            <div class="container-img" id="details_<?php echo $item["id"]; ?>" style="display: none">
              <img src="<?php echo $item["inside_design_img"]; ?>" alt="" />
              <h3>Plot Description</h3>
              <table>
                <tr>
                  <td>
                  <strong>Details: </strong><?php echo $item["details"]; ?></td>
                </tr>
                <tr>
                  <td><strong>Category: </strong><?php echo $item["category"]; ?></td>
                </tr>
                <tr>
                  <td><strong>Type: </strong><?php echo $item["category_type"]; ?></td>
                </tr>
                <tr>
                  
                  <td><strong>Price: </strong><?php echo $item["price"]; ?></td>
                </tr>
              </table>
<iframe src="<?php echo $item["map_link"]; ?>" width="1000" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
        </section>
        <?php } ?>
      </section>
      
    </section>
    <?php
      include "footer.php";
    ?>
  </body>
  <!-- <script src="projects.js"></script> -->
  <script src="script.js"></script>

  <script>
    function detail_viewer(id) {
      console.log(`${id}`)
      var c_view = document.getElementById(`${id}`);
      console.log(c_view.style.display)
      console.log(c_view.style.display);
      if(c_view.style.display == "block") {
        c_view.style.display = "none";
      }
      else {
      c_view.style.display = "block";
      }
      
    }
  </script>     
</html>

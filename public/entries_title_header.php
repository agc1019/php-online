<?php
include ("./connection.php");

$title_id = $_SESSION['title_id'];
$sql = "select * from collection_titles where title_id='$title_id'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $title_name = $row['title_name'];
    $author = $row['author'];
    $type = $row['type'];
    $genre = $row['genre'];
    $last_updated = $row['last_updated'];
}

?>


<!-- TITLE HEADER -->
<div class="title-header">
  <div class="card mt-5">
      <div class="row g-0">
          <div class="col-md-5">
              <div class="card-body">
                <h1 class="card-title"><?php echo $title_name; ?></h1>

                <div class="card-text">
                  <p><?php echo $author; ?></p>
                  <p class="date"><?php echo $last_updated; ?></p>
                </div>

                <div class="type_and_genre">
                  <p><?php echo $type; ?></p> <p><?php echo $genre ; ?></p>
                  </div>
                
                
                  <div class="add-and-otherbtn">

                      <div class="add-entry-dropdown">
                          <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#multiTabModal">
                          Add Entry
                          </button>
                      </div>

                      <div class="buttons">
                          <button class="heart"><i class="fas fa-heart"></i></button>
                          <button class="delete"><i class="fas fa-trash-alt" data-bs-toggle="modal" data-bs-target="#delete-title-popup"></i></button>
                          <button class="more-options"><i class="fas fa-ellipsis-v"></i></button>
                      </div>
                  </div>

                  
              </div>
          </div>
        <div class="col-md-7">
          <!-- <img src="./img/gradient.jpg" class="img-fluid rounded-start" alt="..."> -->
          <div class="default overflow-hidden bg-primary"style="width: 42rem ; height: 17rem; border: none;">
            <img src="https://th.bing.com/th/id/R.36a41659b82c009fe7d9be66c288c71b?rik=Ilzr9naYYeOs6Q&riu=http%3a%2f%2forig01.deviantart.net%2fce57%2ff%2f2013%2f038%2f0%2f5%2fdoodle__cat_by_pian_no-d5u4498.png&ehk=Elg27KtcepH%2b%2f1Iel4S8o%2bZn2vBjF%2frspyFyeZKhm%2b8%3d&risl=&pid=ImgRaw&r=0" class="card-img rounded-4 opacity-25" alt="chae" style="width: 30%; height: auto;">
          </div>
          
        </div>
      </div>
    </div>
  </div>

<?php

include ("./connection.php");
$title_id = $_SESSION['title_id'];
$sql = "select count(title_id) as entries_number from title_entries where title_id='$title_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $entries_number = $row['entries_number'];
}

?>
<div class="hstack gap-3 mt-5">
    <p style="font-weight: 700; font-size: 25px;">entries in this title (<?php echo $entries_number; ?>)</p>

    <div class="ms-auto">
        <div class="categorize_dropdown">
            <button class="categorize_btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                All <i class="fa-solid fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">All</a></li>
                <li><a class="dropdown-item" href="#">Favorites</a></li>
                <li><a class="dropdown-item" href="#">Recent</a></li>
            </ul>
        </div>
    </div>
    <div class="p-2">
        <div class="search-container">
            <i class="fas fa-search"></i>
            <input type="search" placeholder="Search your titles" style="border: none; outline: none;">
        </div>
    </div>
</div>


<!-- ENTRIES LIST -->

<div class="entries">
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
        <?php

        $sql = "SELECT a.title_id, a.entry_id, a.entry_name, a.page,b.text_scanned,b.text_generated,b.feature_chosen,b.text_id
                    FROM title_entries a
                    INNER JOIN  entry_texts b ON b.text_id = a.text_id 
                    where title_id='$title_id'
                    ORDER BY b.text_id DESC";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                ?>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-img-container">
                            <div class="default overflow-hidden" style="background: rgb(205,255,216);
                            background: linear-gradient(72deg, rgba(205,255,216,1) 0%, rgba(148,185,255,1) 100%);
                            border-radius: 15px 15px 0 0;
                            width: auto; 
                            height: 12rem;">
                            <img src="https://th.bing.com/th/id/R.36a41659b82c009fe7d9be66c288c71b?rik=Ilzr9naYYeOs6Q&riu=http%3a%2f%2forig01.deviantart.net%2fce57%2ff%2f2013%2f038%2f0%2f5%2fdoodle__cat_by_pian_no-d5u4498.png&ehk=Elg27KtcepH%2b%2f1Iel4S8o%2bZn2vBjF%2frspyFyeZKhm%2b8%3d&risl=&pid=ImgRaw&r=0" class="card-img rounded-4 opacity-25" alt="chae" style="width: 35%; height: auto;">
                            </div>

                            <i class="fas fa-bookmark bookmark-overlay"></i>
                            
                        </div>

                        <div class="card-body">
                            <div class="title-and-pg d-flex justify-content-between">
                                <h5 class="card-title"><b><?php echo $row['entry_name']; ?></b></h5>
                            </div>

                            <p class="card-text text-truncate"><?php echo $row['text_scanned']; ?> </p>

                            <div class="badges-and-view">
                                <div class="badges">
                                    <p><?php echo $row['feature_chosen'] ?></p>
                                    <p>pg <?php echo $row['page'] ?></p>
                                </div>
                                <button class="btn btn-primary" type="button" onclick="" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"
                                    data-entry-id="<?php echo $row['entry_id']; ?>"
                                    data-text-scanned="<?php echo htmlspecialchars($row['text_scanned']); ?>"
                                    data-text-generated="<?php echo htmlspecialchars($row['text_generated']); ?>"
                                    data-entry-name="<?php echo htmlspecialchars($row['entry_name']); ?>"
                                    data-feature-chosen="<?php echo $row['feature_chosen']; ?>"
                                    data-page="<?php echo $row['page']; ?>" data-text-id="<?php echo $row['text_id']; ?>">View<i
                                        class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>

<!-- OFFCANVAS -->
<div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1" id="offcanvasScrolling"
    aria-labelledby="offcanvasScrollingLabel" data-bs-autohide="true">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasScrollingLabel"><b>Name ng entry</b></h5>
        <p id="delete_text_id" hidden></p>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="img-container">
            <div class="default overflow-hidden" style="background: rgb(205,255,216);
            background: linear-gradient(72deg, rgba(205,255,216,1) 0%, rgba(148,185,255,1) 100%); border-radius: 15px; width: auto; height: 12rem;">
                <img src="https://th.bing.com/th/id/R.36a41659b82c009fe7d9be66c288c71b?rik=Ilzr9naYYeOs6Q&riu=http%3a%2f%2forig01.deviantart.net%2fce57%2ff%2f2013%2f038%2f0%2f5%2fdoodle__cat_by_pian_no-d5u4498.png&ehk=Elg27KtcepH%2b%2f1Iel4S8o%2bZn2vBjF%2frspyFyeZKhm%2b8%3d&risl=&pid=ImgRaw&r=0" class="card-img rounded-4 opacity-25" alt="chae" style="width: 30%; height: auto;">
            </div>


            <button class="btn btn-fullscreen" onclick="openFullscreen()">
                <i class="fas fa-expand"></i>
            </button>
        </div>

        <div class="buttons-and-badges">
            <div class="badges mt-3 mb-3">
                <span class="badge text-bg-primary rounded-pill">Simplify</span>
                <span class="badge text-bg-primary rounded-pill">pg 17-18</span>
            </div>

            <div class="buttons">
                <button class="bookmark"><i class="fas fa-bookmark"></i></button>
                <button class="copy"><i class="fas fa-copy"></i></button>
                <button class="print"><i class="fas fa-print"></i></button>
                <button class="delete"><i class="fas fa-trash-alt" data-bs-toggle="modal"
                        onclick="DeleteEntry();"></i></button>
                <button class="more-options"><i class="fas fa-ellipsis-v"></i></button>
            </div>
        </div>


        <hr>

        <div class="orig-text-container">
            <p class="text-header">original text</p>
            <p></p>
        </div>

        <div class="simplified-text-container">
            <p class="text-header">simplified text</p>
            <p class="simplified-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa quos, nihil
                perferendis velit temporibus et. Nostrum quia numquam mollitia quam, hic laboriosam cupiditate nesciunt
                tenetur praesentium omnis nam repellat voluptatibus.</p>
        </div>

    </div>
</div>

<script>
    const offcanvasBody = document.getElementById('offcanvasScrolling').querySelector('.offcanvas-body');
    const offcanvasHeader = document.getElementById('offcanvasScrolling').querySelector('.offcanvas-header');
    const offcanvasbadge = document.getElementById('offcanvasScrolling').querySelector('.buttons-and-badges');
    const buttons = document.querySelectorAll('.entries .btn-primary'); // Select all buttons

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            const entryId = this.dataset.entryId;
            const textScanned = this.dataset.textScanned;
            const textGenerated = this.dataset.textGenerated;
            const entryName = this.dataset.entryName;
            const featureChosen = this.dataset.featureChosen;
            const page = this.dataset.page;
            const textId = this.dataset.textId;

            // Update Offcanvas Content (example)
            offcanvasBody.querySelector('.orig-text-container p:nth-child(2)').textContent = textScanned;
            offcanvasBody.querySelector('.simplified-text-container p.simplified-text').textContent = textGenerated;
            offcanvasHeader.querySelector('.offcanvas-title').textContent = entryName;
            offcanvasHeader.querySelector('#delete_text_id').textContent = textId;
            offcanvasbadge.querySelector('.badges .badge:nth-child(1)').textContent = featureChosen;
            offcanvasbadge.querySelector('.badges .badge:nth-child(2)').textContent = "pg " + page;

        });
    });
</script>
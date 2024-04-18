<?php 
    include 'header.php'; 
    
    // Instantiate ProfileInfoContr class
    include  'classes/dbh.classes.php';
    include  'classes/profileinfo.classes.php';
    include  'classes/profileinfo-contr.classes.php';
    include  'classes/profileinfo-view.classes.php';

    $profile_info = new ProfileInfoView();
?>

    <!-- Profile Section -->
    <div class="col-md-12">
      <section class="profile-section text-center">
        <button  id="profile-button" name="profile-button" class="btn btn-info"><a href="profilesettings.php">PROFILE SETTINGS</a></button>
        </section>
    </div>

  <div class="col-12">
      <article class="floating-section">
        <h2 class="header-profile"><span class="badge badge-pill badge-dark" id="profile-title"> <?= $profile_info->fetchTitle($_SESSION["user_id"]);?> </span></h2>
        <aside>
            <p id="intro-text">
                <?= $profile_info->fetchText($_SESSION["user_id"])?>
            </p>
        </aside>
      </article>
    </div>
    <div class="profile-container mt-5">
        <section class="profile">
            <!-- Profile image and intro section -->
            <div class="row">
                <div class="col-12">
                    <div class="profile-bg">
                        <div class="wrapper">
                        <article class="profile-info">
                            <div class="profile-info-img">
                                <!-- Profile Image Here -->
                                <img id="profile-image" src="image__profiles/Emperor_RotJ.png" alt="Dark lord">
                                <h2 class="header-profile"><?= $_SESSION["users_uid"]?></h2>
                            </div>
                            <div class="profile-info-about">
                                <h3>About</h3>
                                <p><?= $profile_info->fetchAbout($_SESSION["user_id"])?></p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>

        <!-- Posts Section -->
    <section class="row d-flex ">
    <div class="col-md-6">
               <!-- Profile Image -->
        </div>
        <div class="col-md-6">
            <h2 class="header-profile">Posts</h2>
            <div>
                <article class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">IT IS A BUSY DAY IN TOWN</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
                </article>
                <article class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">RE-USING ELECTRONICS IS A GOOD IDEA</h5>
                    <p class="card-text">Another set of example text here...</p>
                    <p class="card-text"><small class="text-muted">Last updated 5 mins ago</small></p>
                </div>
                </article>
            </div>
        <!-- More posts... -->
      </div>
    </section>
    <!-- Personal Info Navigation Bar -->
    <section class="personal-info mt-5">
        <h2 class="header-profile">Personal Info</h2>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">User Info</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Address</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link disabled" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled" type="button" role="tab" aria-controls="disabled" aria-selected="false" disabled>Disabled</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
                <div class="col-md-6 ">
                    <p>User Id</p>
                </div>
                <div class="col-md-6">
                    <p id="profile_users_uid"><?= $_SESSION["users_uid"] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 ">
                    <p>First Name</p>
                </div>
                <div class="col-md-6">
                    <p id="profile_first_name"><?= $_SESSION["user_first_name"]?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 ">
                    <p>Last Name</p>
                </div>
                <div class="col-md-6">
                    <p id="profile_last_name"><?= $_SESSION["user_last_name"]?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 ">
                    <p>Email</p>
                </div>
                <div class="col-md-6">
                    <p id="profile_users_email"><?= $_SESSION["users_email"]?></p>
                </div>
            </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="row ">
                <div class="col-md-6">
                    <p>Street Address</p>
                </div>
                <div class="col-md-6">
                    <p id="profile_user_address"><?= $_SESSION["user_address"]?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p>City Name</p>
                </div>
                <div class="col-md-6">
                    <p id="profile_city_id"><?= $_SESSION["city_name"]?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p>Province</p>
                </div>
                <div class="col-md-6">
                    <p id="profile_province_name"><?= $_SESSION["province_name"]?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p>Postal Code</p>
                </div>
                <div class="col-md-6">
                    <p id="profile_postal_code"> <?= $_SESSION["postal_code"]?></p>
                </div>
            </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Contact content...</div>
            <div class="tab-pane fade" id="disabled" role="tabpanel" aria-labelledby="disabled-tab">Disabled content...</div>
        </div>
    </section>
</div>
<script>
    // Bootstrap tab functionality
    var triggerTabList = [].slice.call(document.querySelectorAll('#myTab button'))
    triggerTabList.forEach(function (triggerEl) {
        var tabTrigger = new bootstrap.Tab(triggerEl)
        
        triggerEl.addEventListener('click', function (event) {
            event.preventDefault()
            tabTrigger.show()
        })
    })
</script>

<?php include 'footer.php'; ?>
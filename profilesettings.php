<?php 
    include 'header.php'; 
    
    // Instantiate ProfileInfoContr class
    include  'classes/dbh.classes.php';
    include  'classes/profileinfo.classes.php';
    include  'classes/profileinfo-contr.classes.php';
    include  'classes/profileinfo-view.classes.php';
    
    $profile_info = new ProfileInfoView();
?>

    <div class="container my-5">
        <form action="include/profileinfo.inc.php" method="post"> 
            <section class="mb-4">
                <header class="mb-4">
                    <h2 class="text-white bg-dark p-3">PROFILE SETTINGS</h2>
                </header>
                <article class="mb-3">
                    <legend class="mb-1">Change your about section here!</legend>
                    <div class="bg-white p-3 mb-3">
                        <textarea name="profile-settings-about" class="form-control" name="about" placeholder="Profile about section..." rows="4"><?= $profile_info->fetchAbout($_SESSION["user_id"]); ?></textarea>
                    </div>
                </article>

                <article class="mb-3">
                    <legend class="mb-1">Change your profile page Intro here!</legend>
                    <div class="bg-white p-3 mb-2">
                        <input type="text" name="profile-settings-title" class="form-control mb-3" name="title" placeholder="Profile title..." value="<?= $profile_info->fetchTitle($_SESSION["user_id"]); ?>">
                        <textarea class="form-control" name="profile-settings-intro" placeholder="Profile introduction..." rows="3"><?= $profile_info->fetchText($_SESSION["user_id"]); ?></textarea>
                    </div>
                </article>
                <button type="submit" name="profile-settings-button" class="btn btn-primary">SAVE</button>
            </section>
        </form>
    </div>


<?php include 'footer.php'; ?>
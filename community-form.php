
<?php 
    include 'header.php';
    include 'classes/dbh.classes.php';
    include 'classes/blogsSelect.classes.php';
    include 'classes/blogs-view.classes.php';

    $fetched_data = new BlogsView();

    $fetched_data->setPageLimit(10);

    if (isset($_GET["page"])) 
    {  
        $current_page_number = $_GET["page"];  
    }  
    else 
    {  
        $current_page_number = 1;  
    }

    $fetched_data->fetchBlogData('Fantasy Worlds Discussion');
?>
    <div class="container">

        <?php  $fetched_data->displayFetchedData($current_page_number) ?>

        <input id="page-number" type="number" min="1" max="<?php echo $_SESSION['total_pages']?>" placeholder="<?php echo $current_page_number ."/". $_SESSION['total_pages']; ?>"> 
        <button type="button" onclick="go2Page(event)">Go</button> 

    </div>

    <script> 
        function go2Page(event) 
        { 
            event.preventDefault();

            var pageNumber = document.getElementById("page-number").value; 
            pageNumber = ((pageNumber > <?php echo $_SESSION['total_pages']; ?>) ? <?php echo $_SESSION['total_pages']; ?> :((pageNumber < 1) ? 1 : pageNumber)); 
            window.location.href = 'community-form.php?page=' + pageNumber; 
        } 
    </script> 
    
<?php include 'footer.php' ?>
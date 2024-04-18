<?php include 'header.php'; ?>
   <!-- Navigation bar -->

   <div id="index-container" class="container mt-4">
    <!-- Featured Games Section -->
    <section class="row" aria-labelledby="featured-games-header">
        <h2 class="col-md-12" id="featured-games-header" >Featured Board Games</h2>
        <div class="col-md-12">
            <div class="row justify-content-between">
                <article class="col-md-5">
                    <div class="card mb-2 shadow-sm">
                        <img class="card-img-top" src="images/game1.jpg" alt="The Conquest of Everest Board Game">
                        <div class="card-body">
                            <h3 class="card-title">The Conquest of Everest</h3>
                            <p class="card-text">Lead your expedition to the top of the world in this strategic game of high-risk decisions and teamwork.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Buy</button>
                                </div>
                                <small class="text-muted">90 mins</small>
                            </div>
                        </div>
                    </div>
                </article>
                <!-- Repeat for more games -->

                <article class="col-md-5">
                    <div class="card mb-2 shadow-sm">
                        <img class="card-img-top" src="images/PiratesBountyImage.png" alt="Pirate's Bounty Board Game">
                        <div class="card-body">
                            <h3 class="card-title">Pirate's Bounty</h3>
                            <p class="card-text">Embark on a treacherous quest for treasure across the high seas in this adventure-packed board game.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Buy</button>
                                </div>
                                <small class="text-muted">60 mins</small>
                            </div>
                        </div>
                    </div>
                </article>
                </div>
            <!-- Repeat for more featured games as needed -->
        </div>
    </section>
    <!-- Upcoming Events Section -->
    <section class="row" aria-labelledby="upcoming-events-header ">
        <h2 id="upcoming-events-header" class="col-md-8">
            Upcoming Community Events
        </h2>
            <article class="col-md-8">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title">Midnight Board Game Marathon</h3>
                        <p class="card-text">Join us for an all-night gaming session. Snacks and coffee provided!</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </article>
            <!-- Repeat for more events -->
    </section>

    <!-- Latest News Section -->
    <section id="latest-news" class="row" aria-labelledby="latest-news-header">
        <h2 id="latest-news-header" class="col-md-8">Latest News</h2>
            <article class="col-md-8">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title">New Expansion Pack Announcement</h3>
                        <p class="card-text">We're excited to announce the upcoming expansion pack for "Galactic Empires" - get ready to explore new frontiers!</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </article>
    </section>
    </div>
</div>

<?php include 'footer.php'; ?>

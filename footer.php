</main>

    </div>
    <footer id="page-footer">
        <nav>
            <ul>
                <li><a href="#">HOME</a></li>
                <li><a href="#">PRODUCTS</a></li>
                <li><a href="#">FEATURED SALES</a></li>
                <li><a href="#">COMMUNITY EVENTS</a></li>
                <li><a href="#">MEMEBER+</a></li>
            </ul>
        </nav>
        <p>
            Copyright @ 2023 <a href="#">WAR GAMING R-US</a>
        </p>
        <p>
            123 Sleepy Street, Winnipeg, Manitoba R3R 3H3 <a href="#">Map</a>
        </p>
    </footer>
    <div class="modal fade" id="loginModal"  role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="true" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered"  id="document" role="document">
        <div class="modal-content">
        <div class="modal-header border-bottom-0">
            <button  type="button" id="close-button-modal" data-dismiss="modal"  class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-title text-center">
            <h4>Login</h4>
            </div>
            <div class="d-flex flex-column text-center">
            <form id="login-modal-window" method="post" action="include/login.inc.php">
                <div class="form-group">
                <input type="text" class="form-control" name="user_login_name" id="user_login_name" placeholder="Enter username or email address...">
                </div>
                <div class="form-group">
                <input type="password" class="form-control" name="login_password" id="login_password" placeholder="Your password...">
                </div>
                <button type="submit"  id="login_button" name="login_button" class="btn btn-info btn-block btn-round">Login</button>
            </form>
            <div class="text-center text-muted delimiter">or use a social network</div>
            <div class="d-flex justify-content-center social-buttons">
                <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Twitter">
                <a href="https://twitter.com/home"><i class="fab fa-twitter"></i></a>
                </button>
                <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Facebook">
                <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
                </button>
                <button type="button" id="signup-button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Linkedin">
                <a href="https://www.linkedin.com/feed/"><i class="fab fa-linkedin"></i></a>
                </button>
            </di>
            </div>
        </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
            <div class="signup-section">Not a member yet? <a href="signup.php" class="text-info"> Sign Up</a>.</div>
        </div>
    </div>
</div>
</body>
</html>
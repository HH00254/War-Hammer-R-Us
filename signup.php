<?php include 'header.php'; ?>

<h1 class="text-center"><span class="badge rounded-pill bg-primary">Account Creation</span></h1>

<form class="row g-3" method="post" action="include/signup.inc.php">
    <fieldset class="row g-3">
        <legend><h3><span class="badge rounded-pill bg-info text-dark">User Details</span></h3></legend>
        <div class="col-md-12">
            <label for="user_name" class="form-label">Username</label>
            <i class="fa fa-user-circle" aria-hidden="true"></i><input type="text" name="user_name" class="form-control" aria-label="Username" id="user_name" placeholder="HH00254..." required>

        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" autocomplete="off" placeholder="Buzzlight@gmail.com..." required>
        </div>
        <div class="col-md-6">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" autocomplete="off" placeholder="I'm not telling you..." required>
        </div>
        <div class="col-md-6">
            <label for="email_repeat" class="form-label">Repeat Email</label>
            <input type="email" name="email_repeat" class="form-control" id="email_repeat" autocomplete="off" placeholder="Buzzlight@gmail.com..." required>
        </div>

        <div class="col-md-6">
            <label for="password_repeat" class="form-label">Repeat Password</label>
            <input type="password" name="password_repeat" class="form-control" id="password_repeat" autocomplete="off" placeholder="My password is a secret..." required>
        </div>
    </fieldset>
    <fieldset class="row g-3" >
        <legend><h3><span class="badge rounded-pill bg-info text-dark">Personal Details</span></h3></legend>
        <div class="col-md-6">
          <label for="first_name" class="form-label">First Name</label>
          <input type="text"
            class="form-control" name="first_name" id="first_name" autocomplete="given-name" aria-describedby="helpId" placeholder="Al..." required>
        </div>
        <div class="col-md-6">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text"
                class="form-control" name="last_name" id="last_name" autocomplete="family-name" aria-describedby="helpId" placeholder="Nunya..." required>
        </div>
        <div class="col-md-2">
            <label for="gender" class="form-label">Gender</label>
            <select id="gender" name="gender" class="form-select form-select-sm" aria-label=".form-select-sm" required>
                <option selected value="">Select</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
                <option value="3">Transgender</option>
                <option value="4">Cisgender</option>
                <option value="5">Non-Binary</option>
                <option value="6">Genderqueer</option>
                <option value="7">Gender-fluid</option>
                <option value="8">Gender-neutral</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="pronouns" class="form-label">Pronouns</label>
            <select id="pronouns" name="pronouns" class="form-select form-select-sm" aria-label=".form-select-sm" required>
                <option selected>Select</option>
                <option value="1">he/him</option>
                <option value="2">her/she</option>
                <option value="3">they/them</option>
            </select>
        </div>
    </fieldset>
    <fieldset class="row g-3">
        <legend><h3><span class="badge rounded-pill bg-info text-dark">Shipping Information & Personal Address</span></h3></legend>
        <div class="col-12">
            <label for="address" class="form-label">Street Address</label>
            <input type="text" name="address" class="form-control" id="address" autocomplete="street-address" placeholder="1234 Main St..." required>
        </div>
        <div class="col-md-6">
            <label for="city" class="form-label">City</label>
            <input type="text" name="city" class="form-control" id="city" placeholder="Winnipeg..." required>
        </div>
        <div class="col-md-4">
            <label for="province" class="form-label">Province</label>
            <select id="province" name="province" class="form-select" required>
                <option selected>Select</option>
                <option value="AB">Alberta</option>
                <option value="BC">British Columbia</option>
                <option value="MB">Manitoba</option>
                <option value="NB">New Brunswick</option>
                <option value="NL">Newfoundland and Labrador</option>
                <option value="NS">Nova Scotia</option>
                <option value="ON">Ontario</option>
                <option value="PE">Prince Edward Island</option>
                <option value="QC">Quebec</option>
                <option value="SK">Saskatchewan</option>
                <option value="NT">Northwest Territories</option>
                <option value="NU">Nunavut</option>
                <option value="YT">Yukon</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="postal_code" class="form-label">Postal Code</label>
            <input type="text" name="postal_code" class="form-control" id="postal_code" autocomplete="postal-code" placeholder="R2M 4H4..." required>
        </div>
    </fieldset>
    <fieldset class="row g-3">
        <legend>
            <h3><span class="badge rounded-pill bg-info text-dark">Payment Information</span></h3>
        </legend class="row g-3">
        <div id="cardTypes" class="col-md-12">
            <ul>
                <li>
                    <input id="none" name="cardtype" value="0" type="radio" checked />
                    <label for="none">None</label>
                    <input id="visa" name="cardtype" value="1" type="radio" required/>
                    <label for="visa">VISA</label>
                    <input id="amex" name="cardtype" value="2" type="radio" required/>
                    <label for="amex">AmEx</label>
                    <input id="mastercard" name="cardtype" value="3" type="radio" required/>
                    <label for="mastercard">Mastercard</label>
                </li>
            </ul>
        </div>
        <div class="col-md-8">
              <label for="card_name" class="form-label">Name on Credit Card</label>
              <input type="text"
                class="form-control" name="card_name" id="card_name" aria-describedby="helpId" placeholder="Al Nunja...">
        </div> 
        <div class="col-md-6">
              <label for="card_number" class="form-label">Credit Card Number</label>
              <input
                class="form-control" name="card_number" id="card_number"  type="tel" aria-describedby="helpId" autocomplete="off" placeholder="4506 #### 6578 ####" required maxlength="16">
        </div> 
        <div class="col-md-2">
              <label for="cvv" class="form-label">CVV Number</label>
              <input type="tel" maxlength="3"
                class="form-control" name="cvv" id="cvv" aria-describedby="helpId" autocomplete="off" placeholder="###">
        </div> 

        <div class="col-md-3">
            <div class="form-outline datepicker" data-mdb-format="dd, mmm, yyyy">
                <label for="datepicker" class="form-label">
                    <span class="input-group-text bg-white">
                        <i class="fa fa-calendar"> Expiry Date</i>
                    </span>
                    <input type="text" name="datepicker" class="form-control" id="datepicker" placeholder="dd, mmm, yyyy">
                </label>
            </div>

            <script type="text/javascript">
                $(function() {
                    $('#datepicker').datepicker();
                });
            </script>
        </div> 
  </fieldset>
  <fieldset class="row g-3">
    <legend>
        <h3><span class="badge rounded-pill bg-info text-dark">Terms and Mailing</span></h3>
    </legend>
    <div id="form-terms" class="col-md-12">
            <div class="checkbox">
                <input type="checkbox" name="checkbox"> <span>I accept the <a href="#">Privacy Policy for War Gaming R-Us.</a></span>
            </div>
        </div>
        <div id="form-mailing" class="col-md-12">
            <div class="checkbox">
                <input type="checkbox" name="checkbox"> <span>I want to recelve personallzed offers by your site</span>
            </div>
        </div>
        </fieldset>
    <div class="col-12 ">
        <button class="btn btn-primary float-end" id="create_account_button" name="create_account_button" type="submit" class="btn btn-primary">Register Account</button>
    </div>
</form>

<?php include 'footer.php'; ?>
<form class="form-signup" name="signup_form" action="components/registration.php" method="post" autocomplete="off">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>First Name</label>
                        <input type="text" placeholder="First Name" class="form-control" name="firstname"> </div>
                    <div class="col-md-6">
                        <label>Last Name</label>
                        <input type="text" placeholder="Last Name" class="form-control" name="lastname"> </div>
                </div>
                <label for="usr">Username</label>
                <input type="text" class="form-control" id="usr" placeholder="pick a username" name="username">
                <label for="usr">Email</label>
                <input type="text" class="form-control" id="usr" placeholder="Your email address" name="email">
                <label for="usr">Password</label>
                <input type="password" class="form-control" id="usr" placeholder="Create a password" name="password"> </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="signup_bttn">Sign Up</button>
        </form>
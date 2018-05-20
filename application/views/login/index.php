<div class="masthead">
    <div class="masthead-bg">

    </div>
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-12 my-auto">
                <div class="masthead-content text-white py-5 py-md-0">

                    <h1 class="mb-3">Log In</h1>

                    <p class="mb-5">Please enter your username and password below.</p>

                    <?= form_open('user/login',array('id' => 'logInForm')) ?>

                        <!-- Referrer -->
                        <?php $referrer = isset($_GET['referrer']) ? $_GET['referrer'] : ''; ?>
                        <input type="hidden" id="referrer" name="referrer" value="<?php echo $referrer; ?>">

                        <!-- Username -->
                        <div class="form-group input-group-newsletter">
                            <input type="text" id="username" name="username" class="form-control" placeholder="Username" aria-label="Enter your username">
                        </div>

                        <!-- Password -->
                        <div class="form-group input-group-newsletter">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" aria-label="Enter your password">
                        </div>

                        <!-- Error -->
                        <p tabindex="-1" id="log-in-error" class="text-warning">Unable to log in, please try again.</p>

                        <button type="submit" class="btn btn-lg btn-default">Log In</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
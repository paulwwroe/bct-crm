<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading" style="background-color:#fff;text-align:center;">
                    <h1><i class="fa fa-lock"></i> Log In</h1>
                </div>
                <div class="panel-body">
                    
                    <?= form_open('user/login',array('id' => 'logInForm')) ?>
                        
                        <fieldset>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email" class="sr-only">Username</label>
                                <input type="text" id="emailText" class="form-control" name="email" placeholder="Username" />
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label for="password"  class="sr-only">Your Password</label>
                                <input type="password" id="passwordText" class="form-control" name="password" placeholder="Password" />
                            </div>

                            <button type="submit" class="btn btn-lg btn-success btn-block">Log In</button>

                        </fieldset>
                    </form>
                </div>

                <!-- Error -->
                <div id="errorBox" class="errorBox panel-footer">
                    <p><i class="fa fa-warning"></i> <span id="errorText"></span></p>
                </div>
                
            </div>
        </div>
    </div>
</div>
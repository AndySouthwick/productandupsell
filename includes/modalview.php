<!-- sign in Modal -->
<div class="modal fade" id="signInModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Sign in to add to cart</h4>
      </div>
      <div class="modal-body">
        <form class="form-signin" method="post" action="functions/signin.php">
  <h2 class="form-signin-heading"> Sign In</h2>
      <input type="text" id="username" name="username" class="form-control" placeholder="Email"/>
	  <input type="password" id="password" name="password" class="form-control" placeholder="Password" />
    </fieldset>
     <button class="btn btn-lg btn-primary btn-block" type="submit" value="submit" name="submit">Submit</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"aria-expanded="false"data-toggle="modal" data-target="#signupModal">Sign Up!</button>
      </div>
    </div>
  </div>
</div>

<!-- sign up Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create Your Account</h4>
      </div>
      <div class="modal-body">
       <form method="post" action="functions/signup.php">
         
   
              Email:<input type="text" id="username" name="email" class="form-control" placeholder="Email" required/>         
             
              Pasword:<input type="password" id="password1" name="password1" class="form-control" placeholder="Password" required/>
    
              Confirm Password:<input type="password" id="password2" name="password2" class="form-control" placeholder="Confirm Password" required/>

            <input type="submit" value="Sign Up" name="submit" class="btn btn-lg btn-primary btn-block" />
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"aria-expanded="false"data-toggle="modal" data-target="#signupModal">Sign Up!</button>
      </div>
    </div>
  </div>
</div>

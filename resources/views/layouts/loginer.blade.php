<div class="ui inverted modal login-dialog"  >
  <i class="close icon"></i>
  <div class="top-header">
    <div class="logo"><img src="/images/logo-black.png" alt=""></div>
    <h3>Book your diving trips all in one place</h3>
  </div>
  <div class=" loginby-facebook">
    <button class="ui blue button fluid"><i class="ui facebook icon"></i>Sign In With Facebook</button>
  </div>
  <div class="ui horizontal divider mt-4">or</div>
  <div class="forms">
      <div class="ui fluid icon input">
        <input type="text" id="signin-email-input" placeholder="type your email address...">
        <i class="mail icon"></i>
      </div>
      <div class="ui fluid icon input">
        <input type="text" id="signin-password-input" placeholder="type your password ...">
        <i class="lock icon"></i>
      </div>
      <div class="tr mt-2 mb-4">Forgot?</div>
      <button class="ui button teal fluid signin-button"> SIGN IN</button>
  </div>
  <div class="ui divider"></div>
  <div class="new-user-tip clearfix">
      <span class="left floated mt-1">New to super diving trip?</span>
      <div class="right floated">
        <button class="ui button inverted red" onclick="signUpAlert()">sign up</button>
      </div>
  </div>
</div>
<div class="ui inverted modal signup-dialog"  >
  <i class="close icon"></i>
  <div class="top-header">
    <div class="logo"><img src="/images/logo-black.png" alt=""></div>
    <h3>Book your diving trips all in one place</h3>
  </div>
  <div class=" loginby-facebook">
    <button class="ui blue button fluid"><i class="ui facebook icon"></i>Sign In With Facebook</button>
  </div>
  <div class="ui horizontal divider mt-4">or</div>
  <div class="forms">
      <div class="ui fluid icon input">
        <input type="text" id="signup-email-input" placeholder="type your email address...">
        <i class="mail icon"></i>
      </div>
      <div class="ui fluid icon input">
        <input type="text" id="signup-password-input" placeholder="type your password between 6 and 12 characters ...">
        <i class="lock icon"></i>
      </div>
      <div class="ui fluid icon input">
        <input type="text" id="signup-confirm-password-input" placeholder="type your password again ...">
        <i class="lock icon"></i>
      </div>
      <div class="ui fluid icon input">
        <input type="text" id="signup-name-input" placeholder="type your nickname ...">
        <i class="user icon"></i>
      </div>
      <a href=""></a><div class="tr mt-2 mb-4">Forgot?</div>
      <button class="ui button teal fluid signup-button"> SIGN UP</button>
  </div>
  <div class="ui divider"></div>
  <div class="new-user-tip clearfix">
      <span class="left floated mt-1">Already have an account?</span>
      <div class="right floated">
        <button class="ui button inverted red" onclick="signInAlert()">sign in</button>
      </div>
  </div>
</div>
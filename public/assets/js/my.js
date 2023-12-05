$(document).ready(function(){
    var type = $('.type').html();
    // $('.sign_up').html('Sign In'); // sign up button text change
    // $('.sign_up').attr("name", "login");
    // $('.sign_in').html('Sign Up'); // sign in button text change
    $('.swift_right').show(); // second logo show
    $('.b-forgot').show(); // forgot option show
    // $('.form_title').html('Sign in');
    $('.form_title').css('padding-top','130px');
    // form title text change
    $('.b-subtext').html('or use your email account'); // form sub title text change
    $('.user_title').html('Hello, Friend'); // user title text change
    $('.user_subTitle').html('Enter your personal details </br> and start journey with us.'); // user sub title text change
    $('.b-title').css('margin-top','100px'); // user section add margin top in css
    $('.swift_left').hide(); // default logo hide
    $('.username').hide(); // form user field hide
    $('.b-wrapper').addClass('swift_element');
    if(type === 1){
        $('.sign_up').html('Sign In'); // sign up button text change
        $('.sign_up').attr("name", "login");
        $('.sign_in').html('Sign Up'); // sign in button text change
        $('.swift_right').show(); // second logo show
        $('.b-forgot').show(); // forgot option show
        $('.form_title').html('Sign in'); // form title text change
        $('.b-subtext').html('or use your email account'); // form sub title text change
        $('.form_title').css('padding-top','130px');
        $('.user_title').html('Hello, Friend'); // user title text change
        $('.user_subTitle').html('Enter your personal details </br> and start journey with us.'); // user sub title text change
        $('.b-title').css('margin-top','100px'); // user section add margin top in css
        $('.swift_left').hide(); // default logo hide
        $('.username').hide(); // form user field hide
        $('.b-wrapper').addClass('swift_element'); // add reverse
    }
  
})


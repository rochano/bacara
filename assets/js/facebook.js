// initialize and setup facebook js sdk 181024 23.00 ล่าสุด
window.fbAsyncInit = function() {
    FB.init({
          appId      : '2367930286662088',
          xfbml      : false,
          version    : 'v2.5'
        });
    };
    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk')
);

// login with facebook with extra permissions
function fb_login() {
    FB.login(function(response) {
        console.log(response);
        if (response.status === 'connected') {
            console.log("FB are connected.");
            fb_getInfo();
          } else if (response.status === 'not_authorized') {
            console.log("FB are not logged in.");
          } else {
            console.log("FB are not logged in to Facebook.");
          }
    }, {scope: 'email'});
}

// getting basic user info
function fb_getInfo() {
    FB.api('/me', 'GET', {fields: 'id,first_name,last_name'}, function(response) {
        console.log(response);
        if(response.id){

            facebookID = response.id;

			console.log(facebookID);
			console.log(response.first_name);
			console.log(response.last_name);
			console.log("https://fb.com/"+facebookID);
			var credit;
			$.post("/portal.php?loginFB",
            {
                facebookID: response.id,
                firstName: response.first_name,
                lastName: response.last_name,
            },
            function(data){
                console.log(data);
                if(data==1){
                    //location.reload();
                    window.location = "/";
                } else {
                    window.location = "register.php";
                }
            });
        }else{ console.log('fb : Error Get Data'); }
    });
}

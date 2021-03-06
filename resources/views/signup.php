<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <style type="text/css">
        body{
            background-color: #007bff;
            /*background-image: url("http://localhost/laravel/images/money.jpg");*/
        }
        form{
            background-color: #9fcdff;
            padding:10px;
            margin-top: 10px;
            width: 70%;
            margin-left: 180px;
            border-radius: 3px;
            box-shadow: 3px 3px white;


        }


    </style>
    <script>
    var person={};

function validateform(){

    var firstName=$('#firstName').val();
    var lastName=$('#lastName').val();
    var password1=$('#password1').val();
    var password2=$('#password2').val();
    var dob=$('#dob').val();
    var occupation=$('#occupation').val();
    var phone=$('#phone').val();
    var address=$('#address').val();
    var email=$('#email').val();
    var adhar=$('#adhar').val();
    var pancard=$('#pancard').val();


    person.member_name=firstName;
    person.password=password1;
    person.dob=dob;
    person.phone_num=phone;
    person.occupation=occupation;
    person.address=address;
    person.email_id=email;
    person.adhar_number=adhar;
    person.pan_number=pancard;

    console.log(person);
/*if(password1 != password2){
alert("password mismatch ... plz enter again");
$('#password1').val()="";
$('#password2').val()="";
$('#password1').focus();
return false;
}
if(person.phone.toString().length < 10){
alert("Enter  your 10 digit mobile number");
return false;
} 
if(person.adhar.toString().length <12 ){
alert("Enter your 12 adhar number");
return false;
}
return( true ); */


}


$(document).ready(function() {

    $("#signup").click(function () {
        validateform();
/*f(validateform()){
alert("done with validateform");
}
else
{
alert("something is wrong in validate");
}*/

$.ajax({
    url:'/api/members',
    type: 'POST',
    data: person,
    success: function (response, textStatus, xhr) {
        console.log(response);
        if(response.data.length ===1 ) {
            alert("Login successfull :" + response.data[0].member_id);
            document.location.href="http://127.0.0.1:8000/viewdetails";
        } else {
            alert("plz login again... something is wrong");
        }
    },
    error: function (response, textStatus, errorThrown) {
        if (response && response.responseJSON && response.responseJSON.message) {
            alert(response.responseJSON.message);
        } else {
            alert("something wrong happened");
        }
    }
});

});
});



</script>
</head>
<body>

    <div class="container">
        <div id="first_div">
            <h1>Chit Funds</h1>
        </div>
        <div>
            <nav class="navbar navbar-expand-sm bg-secondary">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="http://127.0.0.1:8000/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://127.0.0.1:8000/contact">Contact Us</a>
                    </li>

                </ul>
            </nav>
        </div>
    <div>
</div>


        <form name="myform" >
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="pwd">First name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First name"  aria-label="First name" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="pwd">Last name</label>
                        <input type="text" class="form-control" id="lastName"  name="lastName"  placeholder="Last name" aria-label="Last name" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="password1" placeholder="Enter password" name="password1" required>
                    </div>

                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="pwd">Re-type Password:</label>
                        <input type="password" class="form-control" id="password2" placeholder="Enter password" name="password2" required>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="pwd">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" placeholder="Enter DOB" name="dob" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="name">Occupation</label>
                        <input type="text" class="form-control" id="occupation" placeholder="Enter ur Occupation" name="Occupation" required>

                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="pwd">Phone</label>
                        <input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone" minlength="10" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="pwd">Email-id</label>
                        <input type="text" class="form-control" id="email" placeholder="Enter Email-id" name="email" required>
                    </div>
                </div>
            </div>

            <div class="row">


                <div class="col">

                    <div class="form-group">
                        <label for="name">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Enter ur Address" name="Address" required>

                    </div>

                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="name">Adhar Number</label>
                        <input type="text" class="form-control" id="adhar" placeholder="Enter urAdhar Number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" minlength="12" maxlength="12" name="Adhar" required>

                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="name">Pancard</label>
                        <input type="text" class="form-control" id="pancard" placeholder="Enter ur Pancard" name="Pancard" required>

                    </div>
                </div>
            </div>
            <div class="form-group form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember"> Remember me
                </label>
            </div>

            <input type="submit" class="btn btn-primary" id="signup" value="Register">
        </form>


    </div>

    <div>

    </div>


</body>
</html>

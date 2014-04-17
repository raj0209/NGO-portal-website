function itemSelected( item ) {

	var el = document.getElementById('dLabel');
	el.firstChild.data = item;

	document.getElementById('selectedCatagory').value = item;
 
}

function submitSignin(email,password)
{
	if(document.getElementById(email).value==""|| document.getElementById(email).value=="Email")
	{
		alert("Please enter your email address");
		document.getElementById(email).focus();
		return false;
	}

	var x=document.getElementById(email).value;
	var a=x.indexOf("@");
	var d=x.lastIndexOf(".");
	if(a<1 || d<a+2 || d+2>=x.length)
	{

		alert("Invalid Email");
		document.getElementById(email).focus();
		return false;
	}
	if(document.getElementById(password).value=="" || document.getElementById(password).value=="Password")
	{
		alert("Please enter your password");
		document.getElementById(password).focus();
		return false;
	}

	var p=document.getElementById(password).value;
	if(p.length<6)
	{
		alert("Password should have minimum 6 characters");
		document.getElementById(password).focus();
		return false;
	}
}

function editProfielForDonor()
{
if(document.getElementById("efn").value=="" || document.getElementById        ("efn").value=="First Name")
	{
		alert("Please enter your name");
		document.getElementById("efn").focus();
		return false;
	}

	if(document.getElementById("eem").value==""|| document.getElementById        ("eem").value=="Email")
	{
		alert("Please enter your email address");
		document.getElementById("eem").focus();
		return false;
	}

	var x=document.getElementById("eem").value;
	var a=x.indexOf("@");
	var d=x.lastIndexOf(".");
	if(a<1 || d<a+2 || d+2>=x.length)
	{

		alert("Invalid Email");
		document.getElementById("eem").focus();
		return false;
	}

	if(document.getElementById("emob").value=="" || document.getElementById        ("emob").value=="Mobile Number")
	{
		alert("Please enter your mobile number");
		document.getElementById("emob").focus();
		return false;
	}

	var n="0123456789";
	var num,dig;

	num=document.getElementById("emob").value;
	if(num.length==10)
	{
	for(i=0;i<num.length;i++)
	{
		dig=num.charAt(i);
		if(n.indexOf(dig)==-1)
		{
			alert("Enter digits only");
			document.getElementById("emob").focus();
			return false;
		}
	}
	}
	else
	{
		alert("Enter 10 digit mobile number");
		document.getElementById("emob").focus();
		return false;
	}

	if(document.getElementById("epass").value=="" || document.getElementById        ("epass").value=="Password")
	{
		alert("Please enter your password");
		document.getElementById("epass").focus();
		return false;
	}

	var p=document.getElementById("epass").value;
	if(p.length<6)
	{
		alert("Password should have minimum 6 characters");
			document.getElementById("epass").focus();
		return false;
	}
}

function submitSignUpForDonor()
{
	var output = true;
	var message = "Following error occured: \n";
	
	if(!isNameValid("fn") || isEmpty("fn"))
	{
		document.getElementById("fn").style.borderColor = '#FF0000';
		message = message.concat("Name not filled correctly\n");
		output = false;
	}else{
		document.getElementById("fn").style.borderColor = 'grey';
	}

	if(! isEmailValid("em"))
	{
		document.getElementById("em").style.borderColor = '#FF0000';
		message = message.concat("Email not valid\n");
		output = false;
	}else{
		document.getElementById("em").style.borderColor = 'grey';
	}
	
	if(! isMobValid("mob"))
	{
		document.getElementById("mob").style.borderColor = '#FF0000';
		message = message.concat("Mobile number not valid\n");
		output = false;
	}else{
		document.getElementById("mob").style.borderColor = 'grey';
	}
	
	if(! isPassValid("pass"))
	{
		document.getElementById("pass").style.borderColor = '#FF0000';
		message = message.concat("Password not valid\n");
		output = false;
	}else{
		document.getElementById("pass").style.borderColor = 'grey';
	}
	
	if(!output)
	{
		alert(message);
		return false;
	}else{
		return true;
	}
}


function esubmit3()
{
	if(document.getElementById("enn").value=="" || document.getElementById        ("enn").value=="Name of NGO")
	{
		alert("Please enter name of NGO");
		document.getElementById("enn").focus();
		return false;
	}
	if(document.getElementById("eregno").value=="" || document.getElementById        ("eregno").value=="Registration Number")
	{
		alert("Please enter the registration number");
		document.getElementById("eregno").focus();
		return false;
	}

	if(document.getElementById("ecn").value=="" || document.getElementById        ("ecn").value=="Name of Contact Person")
	{
		alert("Please enter name of contact person");
		document.getElementById("ecn").focus();
		return false;
	}

	if(document.getElementById("eeml").value==""|| document.getElementById        ("eeml").value=="Email")
	{
		alert("Please enter your email address");
		document.getElementById("eeml").focus();
		return false;
	}

	var x=document.getElementById("eeml").value;
	var a=x.indexOf("@");
	var d=x.lastIndexOf(".");
	if(a<1 || d<a+2 || d+2>=x.length)
	{

		alert("Invalid Email");
		document.getElementById("eeml").focus();
		return false;
	}

	if(document.getElementById("econt").value=="" || document.getElementById        ("econt").value=="Contact Number")
	{
		alert("Please enter your contact number");
		document.getElementById("econt").focus();
		return false;
	}

	var n="0123456789";
	var num,dig;

	num=document.getElementById("econt").value;
	if(num.length==10)
	{
	for(i=0;i<num.length;i++)
	{
		dig=num.charAt(i);
		if(n.indexOf(dig)==-1)
		{
			alert("Enter digits only");
			document.getElementById("econt").focus();
			return false;
		}
	}
	}
	else
	{
		alert("Enter 10 digit contact number");
		document.getElementById("econt").focus();
		return false;
	}

	if(document.getElementById("epwd").value=="" || document.getElementById        ("epwd").value=="Password")
	{
		alert("Please enter your password");
		document.getElementById("epwd").focus();
		return false;
	}

	var p=document.getElementById("epwd").value;
	if(p.length<6)
	{
		alert("Password should have minimum 6 characters");
		document.getElementById("epwd").focus();
		return false;
	}



	if(document.getElementById("edc").value=="" || document.getElementById        ("edc").value=="Description")
	{
		alert("Please enter the description");
		document.getElementById("edc").focus();
		return false;
	}

	if(document.getElementById("evi").value=="" || document.getElementById        ("evi").value=="Vision")
	{
		alert("Please enter the vision");
		document.getElementById("evi").focus();
		return false;
	}

	if(document.getElementById("eweb").value=="" || document.getElementById        ("eweb").value=="Website")
	{
		alert("Please enter the website");
		document.getElementById("eweb").focus();
		return false;
	}

}

function submitSignUpForRegNGO()
{
	var output = true;
	var message = "Following errors occured: \n";

	if(isEmpty("nn") || ! isNameValid("nn") )
	{
		document.getElementById("nn").style.borderColor = '#FF0000';
		message = message.concat("Name not filled correctly\n");
		output = false;
	}else
	{
		document.getElementById("nn").style.borderColor = 'grey';	
	}
	
	if(isEmpty("regno"))
	{
		document.getElementById("regno").style.borderColor = '#FF0000';
		message = message.concat("Registration number not filled\n");
		output = false;
	}else
	{
		document.getElementById("regno").style.borderColor = 'grey';	
	}
	
	if(isEmpty("cn") || !isNameValid("cn"))
	{
		document.getElementById("cn").style.borderColor = '#FF0000';
		message = message.concat("Name of Contact Person is not filled correctly\n");
		output = false;
	}else
	{
		document.getElementById("cn").style.borderColor = 'grey';	
	}
	
	if(!isEmailValid("eml"))
	{
		document.getElementById("eml").style.borderColor = '#FF0000';
		message = message.concat("Email is not filled correctly\n");
		output = false;
	}else{
		document.getElementById("eml").style.borderColor = 'grey';
	}
	
	if(!isMobValid("cont"))
	{
		document.getElementById("cont").style.borderColor = '#FF0000';
		message = message.concat("Contact number is not filled correctly\n");
		output = false;
	}else{
		document.getElementById("cont").style.borderColor = 'grey';
	}
	
	if(!isPassValid("pwd"))
	{
		document.getElementById("pwd").style.borderColor = '#FF0000';
		message = message.concat("Password not filled correctly\n");
		output = false;
	}else
	{
		document.getElementById("pwd").style.borderColor = 'grey';
	}

	if(isEmpty("add"))
	{
		document.getElementById("add").style.borderColor = '#FF0000';
		message = message.concat("Address not filled\n");
		output = false;
	}else
	{
		document.getElementById("add").style.borderColor = 'grey';	
	}
	
	if(!isNameValid("cityreg") || isEmpty("cityreg"))
	{
		document.getElementById("cityreg").style.borderColor = '#FF0000';
		message = message.concat("City name not filled correctly\n");
		output = false;
	}else
	{
		document.getElementById("cityreg").style.borderColor = 'grey';	
	}
	
	if(!isNameValid("statereg") || isEmpty("statereg"))
	{
		document.getElementById("statereg").style.borderColor = '#FF0000';
		message = message.concat("State name not filled correctly\n");
		output = false;
	}else
	{
		document.getElementById("statereg").style.borderColor = 'grey';	
	}
	
	if(isEmpty("dc"))
	{
		document.getElementById("dc").style.borderColor = '#FF0000';
		message = message.concat("Discription is not filled\n");
		output = false;
	}else
	{
		document.getElementById("dc").style.borderColor = 'grey';	
	}
	
	if(isEmpty("vi"))
	{
		document.getElementById("vi").style.borderColor = '#FF0000';
		message = message.concat("Vision is not filled\n");
		output = false;
	}else
	{
		document.getElementById("vi").style.borderColor = 'grey';	
	}
	
	if(isEmpty("web"))
	{
		document.getElementById("web").style.borderColor = '#FF0000';
		message = message.concat("Website is compulsory\n");
		output= false;
	}else
	{
		document.getElementById("web").style.borderColor = 'grey';	
	}
	
	if(!document.getElementById("Health").checked && !document.getElementById("Food").checked && !document.getElementById("Education").checked && !document.getElementById("Old").checked && !document.getElementById("Child").checked && !document.getElementById("Others").checked && !document.getElementById("Environment").checked )
	{
		message = message.concat("Catagory not specified\n");
		output = false;
	}
	
	if(!output)
	{
		alert(message);
		return false;
	}

}

function submitSignUpForUnRegNGO()
{
	var output = true;
	var message = "Following errors occured: \n";

	if(isEmpty("unn") || !isNameValid("unn"))
	{
		document.getElementById("unn").style.borderColor = '#FF0000';
		message = message.concat("Name is not filled correctly\n");
		output = false;
	}else
	{
		document.getElementById("unn").style.borderColor = 'grey';	
	}
	

	if(isEmpty("ucn") || !isNameValid("ucn"))
	{
		document.getElementById("ucn").style.borderColor = '#FF0000';
		message = message.concat("Contact name is not filled correctly\n");	
		output = false;
	}else
	{
		document.getElementById("ucn").style.borderColor = 'grey';	
	}
	
	if(isEmpty("ueml") || !isEmailValid("ueml"))
	{
		document.getElementById("ueml").style.borderColor = '#FF0000';
		message = message.concat("Email not filled correctly\n");
		output = false;
	}else{	
		document.getElementById("ueml").style.borderColor = 'grey';	
	}
	
	if(!isMobValid("ucont"))
	{
		document.getElementById("ucont").style.borderColor = '#FF0000';
		message = message.concat("Contact number is not filled correctly\n");	
		output = false;
	}else{
		document.getElementById("ucont").style.borderColor = 'grey';
	}
	
	if(!isPassValid("upwd"))
	{
		document.getElementById("upwd").style.borderColor = '#FF0000';
		message = message.concat("Password not filled correctly\n");	
		output = false;
	}else{
		document.getElementById("upwd").style.borderColor = 'grey';
	}

	if(isEmpty("uadd"))
	{
		document.getElementById("uadd").style.borderColor = '#FF0000';
		message = message.concat("Address not filled correctly\n");
		output = false;
	}else
	{
		document.getElementById("uadd").style.borderColor = 'grey';	
	}
	
	if(!isNameValid("cityunreg"))
	{
		document.getElementById("cityunreg").style.borderColor = '#FF0000';
		message = message.concat("City is not filled correctly\n");
		output =false;
	}else
	{
		document.getElementById("cityunreg").style.borderColor = 'grey';	
	}
	
	if(!isNameValid("stateunreg"))
	{
		document.getElementById("stateunreg").style.borderColor = '#FF0000';
		message = message.concat("State not filled correctly\n");
		output = false;
	}else
	{
		document.getElementById("stateunreg").style.borderColor = 'grey';	
	}
	
	if(isEmpty("udc"))
	{
		document.getElementById("udc").style.borderColor = '#FF0000';
		message = message.concat("Discription is not filled\n");	
		output = false;
	}else
	{
		document.getElementById("udc").style.borderColor = 'grey';	
	}
	
	if(isEmpty("uvi"))
	{
		document.getElementById("uvi").style.borderColor = '#FF0000';
		message = message.concat("Vision is not filled\n");	
		output = false;
	}else
	{
		document.getElementById("uvi").style.borderColor = 'grey';	
	}
	
	if(!document.getElementById("uHealth").checked && !document.getElementById("uFood").checked && !document.getElementById("uEducation").checked && !document.getElementById("uOld").checked && !document.getElementById("uChild").checked && !document.getElementById("uOthers").checked && !document.getElementById("uEnvironment").checked )
	{
		message = message.concat("Category not specified\n");
		output = false;
	}
	
	if(!output)
	{
		alert(message);
		return false;
	}

}


function eventPostf()
{
	if(document.getElementById("eventName").value=="")
	{
		alert("Please enter the name of event");
		document.getElementById("eventName").focus();
		return false;
	}

	if(document.getElementById("eventDetails").value=="" )
	{
		alert("Please enter the details of event");
		document.getElementById("eventDetails").focus();
		return false;
	}

	if(document.getElementById("startDate").value=="" )
	{
		alert("Please enter the start date of event");
		document.getElementById("startDate").focus();
		return false;
	}

	if(document.getElementById("endDate").value=="" )
	{
		alert("Please enter the end date of event");
		document.getElementById("endDate").focus();
		return false;
	}

	if(document.getElementById("eventLocation").value=="" )
	{
		alert("Please enter the location of event");
		document.getElementById("eventLocation").focus();
		return false;
	}


}
function hideAll()
{
document.getElementById('signinModalContent').style.display = 'none';
document.getElementById('signinDonor').style.display = 'none';
document.getElementById('signinNgo').style.display = 'none';
document.getElementById('SignupDonor').style.display = 'none';
document.getElementById('signupModalContent').style.display = 'none'; 
document.getElementById('regSignupNgo').style.display = 'none';  
document.getElementById('unregSignupNgo').style.display = 'none'; 
//$('#signupModalContent').hide();
}


$(function(){
$('#signup').click(function(){ hideAll(); $('#signupModalContent').show();  $('#SignupDonor').show(); });
});

$(function(){
$('#signinHomeButton').click(function(){ hideAll(); $('#signinModalContent').show(); $('#signinDonor').show(); });
});


$(function(){
$('#closes').click(function(){  $('#signinModalContent').show('fast',function(){ window.location.reload(); }); });
});

$(function(){
$('#close').click(function(){  $('#signupModalContent').show('fast',function(){ window.location.reload(); }); });
});

$(function(){
$('#donorTab').click(function(){ hideAll(); $('#signinModalContent').show(); $('#signinDonor').show(); });
});

$(function(){
$('#ngoTab').click(function(){  hideAll(); $('#signinModalContent').show(); $('#signinNgo').show(); });
});

$(function(){
$('#signupButton').click(function(){ hideAll(); $('#signupModalContent').show(); $('#SignupDonor').show();});
});

$(function(){
$('#tabDonorSignUp').click(function(){  hideAll(); $('#signupModalContent').show();  $('#SignupDonor').show(); });
});

$(function(){
$('#tabRegNGOSignUp').click(function(){ hideAll(); $('#signupModalContent').show();  $('#regSignupNgo').show(); });
});

$(function(){
$('#tabUnRegNGOSignUp').click(function(){ hideAll(); $('#signupModalContent').show(); $('#unregSignupNgo').show(); });
});

// Functions for NGOHOME page
function changeName(){

	var $type = 'none';
	if($("#donorButton").text() == "Followers"){
		$type = 'donors';
	}else{
		$type = 'event';
	};

	if ($type == 'donors') {
		$("#donorButton").text("Events");
		$("#allPostContainer").hide();
		$("#MessageContainer").hide();
		$("#allDonorContainer").show();
	}else{
		$("#donorButton").text("Followers");
		$("#allPostContainer").show();
		$("#allDonorContainer").hide();
		$("#MessageContainer").hide();
		
	};

};

// Functions for DONOR page
function DisplayEvents(){
	$("#allFavNgoContainer").hide();
	$("#allEventsContainer").show();
};

function DisplayNgo(){
	$("#allEventsContainer").hide();
	$("#allFavNgoContainer").show();
};

function validatePassword(currentPassword,newPassword,confirmPassword) {
var output = true;
var message = "Following error occurred: \n";

if(! isPassValid(currentPassword)){
	document.getElementById(currentPassword).style.borderColor = '#FF0000';
	message = message.concat("Current Password is not provided correctly\n");
	output = false;
}else{
	document.getElementById(currentPassword).style.borderColor = 'grey';
}

if(! isPassValid(newPassword)){
	document.getElementById(newPassword).style.borderColor = '#FF0000';
	message = message.concat("New password is not provided correctly\n");
	output = false;
}else{
	document.getElementById(newPassword).style.borderColor = 'grey';
}

if(! isPassValid(confirmPassword)){
	document.getElementById(confirmPassword).style.borderColor = '#FF0000';
	message = message.concat("Password is not confirmed correctly\n");
	output = false;
}else{
	document.getElementById(confirmPassword).style.borderColor = 'grey';
}

if(document.getElementById(newPassword).value != document.getElementById(confirmPassword).value && output){
	document.getElementById(newPassword).style.borderColor = '#FF0000';
	document.getElementById(confirmPassword).style.borderColor = '#FF0000';
	message = message.concat("Passwords mismatches\n");
	output = false;
}

if(!output){
	alert(message);
}
 	
return output;

}

function ClearAll() {

    var objInput = document.getElementsByTagName("input");

    for (var iCount = 0; iCount < objInput.length; i++) {

        if (objInput[iCount].type == "text")

            objInput[iCount].value = "";
        //alert('clearing');
    }

}

function checkSize(max_img_size,item)
{
    var input = document.getElementById(item);
    // check for browser support (may need to be modified)
    if(input.files && input.files.length == 1)
    {           
        if (input.files[0].size > max_img_size) 
        {
            alert("The file must be less than " + (max_img_size/1024/1024) + "MB");
            return false;
        }
    }

    return true;
}

function DisplayAllDonors(){
    $("#allPostContainer").hide();
    $("#allDonorContainer").hide();
    $("#MessageContainer").show();
};



function isNameValid(item){
    var regex = /\d/g;
	return ! regex.test(document.getElementById(item).value);
}

function isEmpty(item){
	return document.getElementById(item).value=="";
}

function isEmailValid(item){
	var x=document.getElementById(item).value;
	var a=x.indexOf("@");
	var d=x.lastIndexOf(".");
	return (!(a<1 || d<a+2 || d+2>=x.length) && !isEmpty(item));
}

function isMobValid(item){
	var n="0123456789";
	var num,dig;

	num=document.getElementById(item).value;
	if(num.length==10)
	{
		for(i=0;i<num.length;i++)
		{
			dig=num.charAt(i);
			if(n.indexOf(dig)==-1)
			{
				return false;
			}
		}

		return true;
	}
	else
	{
		return false;
	}
}

function isPassValid(item){
	var p=document.getElementById(item).value;
	if(p.length<6)
	{
		return false;
	}
	return true;
}

function contactForm()
{
	if(document.getElementById("subject").value=="" )
	{
		alert("Please enter the subject of event");
		document.getElementById("subject").focus();
		return false;
	}

	if(document.getElementById("DonationDate").value=="" )
	{
		alert("Please enter the date of event");
		document.getElementById("DonationDate").focus();
		return false;
	}
	
	if(document.getElementById("message").value=="" )
	{
		alert("Please enter the message or description about the event");
		document.getElementById("message").focus();
		return false;
	}


}

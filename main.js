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
	var output;
	
	if(document.getElementById("fn").value=="" || document.getElementById        ("fn").value=="First Name")
	{
		document.getElementById("fn").style.borderColor = '#FF0000';
		output="false";
	}
	else
	{
		document.getElementById("fn").style.borderColor = 'Grey';		
	}
	if(document.getElementById("em").value==""|| document.getElementById        ("em").value=="Email")
	{
		document.getElementById("em").style.borderColor = '#FF0000';
		output="false";
	}
	else if(document.getElementById("em").value!="" && document.getElementById        ("em").value!="Email")
	{
		var x=document.getElementById("em").value;
		var a=x.indexOf("@");
		var d=x.lastIndexOf(".");
		if(a<1 || d<a+2 || d+2>=x.length)
		{

			alert("Invalid Email");
			document.getElementById("em").focus();
			document.getElementById("em").style.borderColor = '#FF0000';
			return false;
		}
		document.getElementById("em").style.borderColor = 'Grey';
	}
	
	if(document.getElementById("mob").value=="" || document.getElementById        ("mob").value=="Mobile Number")
	{
		document.getElementById("mob").style.borderColor = '#FF0000';
		output="false";
	}

	else if(document.getElementById("mob").value!="" || document.getElementById        ("mob").value!="Mobile Number")
	{
		var n="0123456789";
		var num,dig;

		num=document.getElementById("mob").value;
		if(num.length==10)
		{
		for(i=0;i<num.length;i++)
		{
			dig=num.charAt(i);
			if(n.indexOf(dig)==-1)
			{
				alert("Enter digits only");
				document.getElementById("mob").focus();
				document.getElementById("mob").style.borderColor = '#FF0000';
				return false;
			}
		}
		}
		
		else
		{
			alert("Enter 10 digit mobile number");
			document.getElementById("mob").focus();
			document.getElementById("mob").style.borderColor = '#FF0000';
			return false;
		}
		document.getElementById("mob").style.borderColor = 'Grey';		
	}
	
	if(document.getElementById("pass").value=="" || document.getElementById        ("pass").value=="Password")
	{
		document.getElementById("pass").style.borderColor = '#FF0000';
		output="false";
	}

	else if(document.getElementById("pass").value!="" || document.getElementById        ("pass").value!="Password")
	{
		var p=document.getElementById("pass").value;
		if(p.length<6)
		{
			alert("Password should have minimum 6 characters");
			document.getElementById("pass").focus();
			document.getElementById("pass").style.borderColor = '#FF0000';
			return false;
		}
		document.getElementById("pass").style.borderColor = 'Grey';		
	}
	
	if(output=="false")
	{
		alert("Please fill up the required fields");
		return false;
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

function submit3()
{
	var output;
	
	if(document.getElementById("nn").value=="" || document.getElementById        ("nn").value=="Name of NGO")
	{
		document.getElementById("nn").style.borderColor = '#FF0000';	
		output="false";
	}
	
	else
	{
		document.getElementById("nn").style.borderColor = 'grey';	
	}
	
	if(document.getElementById("regno").value=="" || document.getElementById        ("regno").value=="Registration Number")
	{
		document.getElementById("regno").style.borderColor = '#FF0000';
		output="false";
	}

	else
	{
		document.getElementById("regno").style.borderColor = 'grey';	
	}
	
	if(document.getElementById("cn").value=="" || document.getElementById        ("cn").value=="Name of Contact Person")
	{
		document.getElementById("cn").style.borderColor = '#FF0000';
		output="false";
	}

	else
	{
		document.getElementById("cn").style.borderColor = 'grey';	
	}
	
	if(document.getElementById("eml").value==""|| document.getElementById        ("eml").value=="Email")
	{
		document.getElementById("eml").style.borderColor = '#FF0000';
		output="false";
	}

	else if(document.getElementById("eml").value!=""|| document.getElementById        ("eml").value!="Email")
	{
		var x=document.getElementById("eml").value;
		var a=x.indexOf("@");
		var d=x.lastIndexOf(".");
		if(a<1 || d<a+2 || d+2>=x.length)
		{

			alert("Invalid Email");
			document.getElementById("eml").focus();
			return false;
		}
		document.getElementById("eml").style.borderColor = 'grey';
	}
	
	if(document.getElementById("cont").value=="" || document.getElementById        ("cont").value=="Contact Number")
	{
		document.getElementById("cont").style.borderColor = '#FF0000';
		output="false";
	}

	else if(document.getElementById("cont").value!="" || document.getElementById        ("cont").value!="Contact Number")
	{
		var n="0123456789";
		var num,dig;

		num=document.getElementById("cont").value;
		if(num.length==10)
		{
		for(i=0;i<num.length;i++)
		{
			dig=num.charAt(i);
			if(n.indexOf(dig)==-1)
			{
				alert("Enter digits only");
				document.getElementById("cont").focus();
				return false;
			}
		}
		}
		else
		{
			alert("Enter 10 digit contact number");
			document.getElementById("cont").focus();
			return false;
		}
		document.getElementById("cont").style.borderColor = 'grey';
	}
	
	if(document.getElementById("pwd").value=="" || document.getElementById        ("pwd").value=="Password")
	{
		document.getElementById("pwd").style.borderColor = '#FF0000';
		output="false";
	}
	
	else if(document.getElementById("pwd").value!="" || document.getElementById        ("pwd").value!="Password")
	{
		var p=document.getElementById("pwd").value;
		if(p.length<6)
		{
			alert("Password should have minimum 6 characters");
			document.getElementById("pwd").focus();
			return false;
		}
		document.getElementById("pwd").style.borderColor = 'grey';
	}

	if(document.getElementById("add").value=="" || document.getElementById        ("add").value=="Address")
	{
		document.getElementById("add").style.borderColor = '#FF0000';
		output="false";
	}
	
	else
	{
		document.getElementById("add").style.borderColor = 'grey';	
	}
	
	if(document.getElementById("cityreg").value=="" || document.getElementById        ("cityreg").value=="City")
	{
		document.getElementById("cityreg").style.borderColor = '#FF0000';
		output="false";
	}
	
	else
	{
		document.getElementById("cityreg").style.borderColor = 'grey';	
	}
	
	if(document.getElementById("statereg").value=="" || document.getElementById        ("statereg").value=="State")
	{
		document.getElementById("statereg").style.borderColor = '#FF0000';
		output="false";
	}
	
	else
	{
		document.getElementById("statereg").style.borderColor = 'grey';	
	}
	
	if(document.getElementById("dc").value=="" || document.getElementById        ("dc").value=="Description")
	{
		document.getElementById("dc").style.borderColor = '#FF0000';
		output="false";
	}

	else
	{
		document.getElementById("dc").style.borderColor = 'grey';	
	}
	
	if(document.getElementById("vi").value=="" || document.getElementById        ("vi").value=="Vision")
	{
		document.getElementById("vi").style.borderColor = '#FF0000';
		output="false";
	}

	else
	{
		document.getElementById("vi").style.borderColor = 'grey';	
	}
	
	if(document.getElementById("web").value=="" || document.getElementById        ("web").value=="Website")
	{
		document.getElementById("web").style.borderColor = '#FF0000';
		output="false";
	}
	
	else
	{
		document.getElementById("web").style.borderColor = 'grey';	
	}
	
	if(!document.getElementById("Health").checked && !document.getElementById("Food").checked && !document.getElementById("Education").checked && !document.getElementById("Old").checked && !document.getElementById("Child").checked )
	{

		//document.getElementById("Health").focus();
		document.getElementById("Health").style.borderColor = '##FF0000';
		output="false";
	}
	
	if(output=="false")
	{
		alert("Please fill up the required fields");
		return false;
	}

}

function submit4()
{
	var output;
	
	if(document.getElementById("unn").value=="" || document.getElementById        ("unn").value=="Name of NGO")
	{
		document.getElementById("unn").style.borderColor = '#FF0000';	
		output="false";
	}
	else
	{
		document.getElementById("unn").style.borderColor = 'grey';	
	}
	

	if(document.getElementById("ucn").value=="" || document.getElementById        ("ucn").value=="Name of Contact Person")
	{
		document.getElementById("ucn").style.borderColor = '#FF0000';	
		output="false";
	}

	else
	{
		document.getElementById("ucn").style.borderColor = 'grey';	
	}
	
	if(document.getElementById("ueml").value==""|| document.getElementById        ("ueml").value=="Email")
	{
		document.getElementById("ueml").style.borderColor = '#FF0000';	
		output="false";
	}

	else if(document.getElementById("ueml").value!=""|| document.getElementById        ("ueml").value!="Email")
	{
		var x=document.getElementById("ueml").value;
		var a=x.indexOf("@");
		var d=x.lastIndexOf(".");
		if(a<1 || d<a+2 || d+2>=x.length)
		{

			alert("Invalid Email");
			document.getElementById("ueml").focus();
			return false;
		}
		document.getElementById("ueml").style.borderColor = 'grey';	
	}
	
	if(document.getElementById("ucont").value=="" || document.getElementById        ("ucont").value=="Contact Number")
	{
		document.getElementById("ucont").style.borderColor = '#FF0000';	
		output="false";
	}
	
	else if(document.getElementById("ucont").value!="" || document.getElementById        ("ucont").value!="Contact Number")
	{
		var n="0123456789";
		var num,dig;

		num=document.getElementById("ucont").value;
		if(num.length==10)
		{
			for(i=0;i<num.length;i++)
			{
				dig=num.charAt(i);
				if(n.indexOf(dig)==-1)
				{
					alert("Enter digits only");
					document.getElementById("ucont").focus();
					return false;
				}
			}
		}
		
	
		else
		{
			alert("Enter 10 digit contact number");
			document.getElementById("ucont").focus();
			return false;
		}
		
		document.getElementById("ucont").style.borderColor = 'grey';
	}
	
	if(document.getElementById("upwd").value=="" || document.getElementById        ("upwd").value=="Password")
	{
		document.getElementById("upwd").style.borderColor = '#FF0000';	
		output="false";
	}
	else if(document.getElementById("upwd").value=="" || document.getElementById        ("upwd").value=="Password")
	{
		var p=document.getElementById("upwd").value;
		if(p.length<6)
		{
			alert("Password should have minimum 6 characters");
			document.getElementById("upwd").focus();
			return false;
		}
		document.getElementById("upwd").style.borderColor = 'grey';
	}

	if(document.getElementById("uadd").value=="" || document.getElementById        ("uadd").value=="Address")
	{
		document.getElementById("uadd").style.borderColor = '#FF0000';	
		output="false";
	}

	else
	{
		document.getElementById("uadd").style.borderColor = 'grey';	
	}
	
	if(document.getElementById("cityunreg").value=="" || document.getElementById        ("cityunreg").value=="City")
	{
		document.getElementById("cityunreg").style.borderColor = '#FF0000';
		output="false";
	}
	
	else
	{
		document.getElementById("cityunreg").style.borderColor = 'grey';	
	}
	
	if(document.getElementById("stateunreg").value=="" || document.getElementById        ("stateunreg").value=="State")
	{
		document.getElementById("stateunreg").style.borderColor = '#FF0000';
		output="false";
	}
	
	else
	{
		document.getElementById("stateunreg").style.borderColor = 'grey';	
	}
	
	if(document.getElementById("udc").value=="" || document.getElementById        ("udc").value=="Description")
	{
		document.getElementById("udc").style.borderColor = '#FF0000';	
		output="false";
	}
	
	else
	{
		document.getElementById("udc").style.borderColor = 'grey';	
	}
	
	if(document.getElementById("uvi").value=="" || document.getElementById        ("uvi").value=="Vision")
	{
		document.getElementById("uvi").style.borderColor = '#FF0000';	
		output="false";
	}
	
	else
	{
		document.getElementById("uvi").style.borderColor = 'grey';	
	}
	
	if(!document.getElementById("uHealth").checked && !document.getElementById("uFood").checked && !document.getElementById("uEducation").checked && !document.getElementById("uOld").checked && !document.getElementById("uChild").checked )
	{

		
		document.getElementById("uHealth").focus();
		output="false";
	}
	
	if(output=="false")
	{
		alert("Please fill up the required fields");
		return false;
	}

}


function eventPostf()
{
	if(document.getElementById("eventName").value=="" || document.getElementById        ("eventName").value=="Name of Event")
	{
		alert("Please enter the name of event");
		document.getElementById("eventName").focus();
		return false;
	}

	if(document.getElementById("eventDetails").value=="" || document.getElementById        ("eventDetails").value=="Details of Event")
	{
		alert("Please enter the details of event");
		document.getElementById("eventDetails").focus();
		return false;
	}

	if(document.getElementById("startDate").value=="" || document.getElementById        ("startDate").value=="dd-mm-yyyy")
	{
		alert("Please enter the start date of event");
		document.getElementById("startDate").focus();
		return false;
	}

	if(document.getElementById("endDate").value=="" || document.getElementById        ("endDate").value=="dd-mm-yyyy")
	{
		alert("Please enter the end date of event");
		document.getElementById("endDate").focus();
		return false;
	}

	if(document.getElementById("eventLocation").value=="" || document.getElementById        ("eventLocation").value=="Location of Event")
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
	if($("#donorButton").text() == "Donors"){
		$type = 'donors';
	}else{
		$type = 'event';
	};

	if ($type == 'donors') {
		$("#donorButton").text("Events");
		$("#allPostContainer").hide();
		$("#allDonorContainer").show();
	}else{
		$("#donorButton").text("Donors");
		$("#allPostContainer").show();
		$("#allDonorContainer").hide();
	};

};

// Functions for DONOR page
function DisplayEvents(){
	$("#allFavNgoContainer").hide();
	$("#allEventsContainer").show();
};

function DisplayNgo(){
	$("#allFavNgoContainer").show();
	$("#allEventsContainer").hide();
};

function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
currentPassword.focus();
document.getElementById("currentPassword").innerHTML = "required";
output = false;
}
else if(!newPassword.value) {
newPassword.focus();
document.getElementById("newPassword").innerHTML = "required";
output = false;
}
else if(!confirmPassword.value) {
confirmPassword.focus();
document.getElementById("confirmPassword").innerHTML = "required";
output = false;
}
if(newPassword.value != confirmPassword.value) {
newPassword.value="";
confirmPassword.value="";
newPassword.focus();
document.getElementById("confirmPassword").innerHTML = "not same";
output = false;
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
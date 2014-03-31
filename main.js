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
	if(document.getElementById("fn").value=="" || document.getElementById        ("fn").value=="First Name")
	{
		alert("Please enter your name");
		document.getElementById("fn").focus();
		return false;
	}

	if(document.getElementById("em").value==""|| document.getElementById        ("em").value=="Email")
	{
		alert("Please enter your email address");
		document.getElementById("em").focus();
		return false;
	}

	var x=document.getElementById("em").value;
	var a=x.indexOf("@");
	var d=x.lastIndexOf(".");
	if(a<1 || d<a+2 || d+2>=x.length)
	{

		alert("Invalid Email");
		document.getElementById("em").focus();
		return false;
	}

	if(document.getElementById("mob").value=="" || document.getElementById        ("mob").value=="Mobile Number")
	{
		alert("Please enter your mobile number");
		document.getElementById("mob").focus();
		return false;
	}

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
			return false;
		}
	}
	}
	else
	{
		alert("Enter 10 digit mobile number");
		document.getElementById("mob").focus();
		return false;
	}

	if(document.getElementById("pass").value=="" || document.getElementById        ("pass").value=="Password")
	{
		alert("Please enter your password");
		document.getElementById("pass").focus();
		return false;
	}

	var p=document.getElementById("pass").value;
	if(p.length<6)
	{
		alert("Password should have minimum 6 characters");
			document.getElementById("pass").focus();
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
	if(document.getElementById("nn").value=="" || document.getElementById        ("nn").value=="Name of NGO")
	{
		alert("Please enter name of NGO");
		document.getElementById("nn").focus();
		return false;
	}

	if(document.getElementById("regno").value=="" || document.getElementById        ("regno").value=="Registration Number")
	{
		alert("Please enter the registration number");
		document.getElementById("regno").focus();
		return false;
	}

	if(document.getElementById("cn").value=="" || document.getElementById        ("cn").value=="Name of Contact Person")
	{
		alert("Please enter name of contact person");
		document.getElementById("cn").focus();
		return false;
	}

	if(document.getElementById("eml").value==""|| document.getElementById        ("eml").value=="Email")
	{
		alert("Please enter your email address");
		document.getElementById("eml").focus();
		return false;
	}

	var x=document.getElementById("eml").value;
	var a=x.indexOf("@");
	var d=x.lastIndexOf(".");
	if(a<1 || d<a+2 || d+2>=x.length)
	{

		alert("Invalid Email");
		document.getElementById("eml").focus();
		return false;
	}

	if(document.getElementById("cont").value=="" || document.getElementById        ("cont").value=="Contact Number")
	{
		alert("Please enter your contact number");
		document.getElementById("cont").focus();
		return false;
	}

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

	if(document.getElementById("pwd").value=="" || document.getElementById        ("pwd").value=="Password")
	{
		alert("Please enter your password");
		document.getElementById("pwd").focus();
		return false;
	}

	var p=document.getElementById("pwd").value;
	if(p.length<6)
	{
		alert("Password should have minimum 6 characters");
		document.getElementById("pwd").focus();
		return false;
	}



	if(document.getElementById("dc").value=="" || document.getElementById        ("dc").value=="Description")
	{
		alert("Please enter the description");
		document.getElementById("dc").focus();
		return false;
	}

	if(document.getElementById("add").value=="" || document.getElementById        ("add").value=="Address")
	{
		alert("Please enter the Address");
		document.getElementById("add").focus();
		return false;
	}
	if(document.getElementById("vi").value=="" || document.getElementById        ("vi").value=="Vision")
	{
		alert("Please enter the vision");
		document.getElementById("vi").focus();
		return false;
	}

	if(document.getElementById("web").value=="" || document.getElementById        ("web").value=="Website")
	{
		alert("Please enter the website");
		document.getElementById("web").focus();
		return false;
	}
		if(!document.getElementById("Health").checked && !document.getElementById("Food").checked && !document.getElementById("Education").checked && !document.getElementById("Old").checked && !document.getElementById("Child").checked )
	{

		alert("Please select category");
		document.getElementById("Health").focus();
		document.getElementById("Food").focus();
		document.getElementById("Education").focus();
		document.getElementById("Old").focus();
		document.getElementById("Child").focus();
		return false;
	}

}

function submit4()
{
	if(document.getElementById("unn").value=="" || document.getElementById        ("unn").value=="Name of NGO")
	{
		alert("Please enter the name of NGO");
		document.getElementById("unn").focus();
		return false;
	}


	if(document.getElementById("ucn").value=="" || document.getElementById        ("ucn").value=="Name of Contact Person")
	{
		alert("Please enter name of contact person");
		document.getElementById("ucn").focus();
		return false;
	}

	if(document.getElementById("ueml").value==""|| document.getElementById        ("ueml").value=="Email")
	{
		alert("Please enter your email address");
		document.getElementById("ueml").focus();
		return false;
	}

	var x=document.getElementById("ueml").value;
	var a=x.indexOf("@");
	var d=x.lastIndexOf(".");
	if(a<1 || d<a+2 || d+2>=x.length)
	{

		alert("Invalid Email");
		document.getElementById("ueml").focus();
		return false;
	}

	if(document.getElementById("ucont").value=="" || document.getElementById        ("ucont").value=="Contact Number")
	{
		alert("Please enter your contact number");
		document.getElementById("ucont").focus();
		return false;
	}

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

	if(document.getElementById("upwd").value=="" || document.getElementById        ("upwd").value=="Password")
	{
		alert("Please enter your password");
		document.getElementById("upwd").focus();
		return false;
	}

	var p=document.getElementById("upwd").value;
	if(p.length<6)
	{
		alert("Password should have minimum 6 characters");
		document.getElementById("upwd").focus();
		return false;
	}



	if(document.getElementById("udc").value=="" || document.getElementById        ("udc").value=="Description")
	{
		alert("Please enter the description");
		document.getElementById("udc").focus();
		return false;
	}
	if(document.getElementById("uadd").value=="" || document.getElementById        ("uadd").value=="Address")
	{
		alert("Please enter the address");
		document.getElementById("uadd").focus();
		return false;
	}

	if(document.getElementById("uvi").value=="" || document.getElementById        ("uvi").value=="Vision")
	{
		alert("Please enter the vision");
		document.getElementById("uvi").focus();
		return false;
	}
	if(!document.getElementById("uHealth").checked && !document.getElementById("uFood").checked && !document.getElementById("uEducation").checked && !document.getElementById("uOld").checked && !document.getElementById("uChild").checked )
	{

		alert("Please select category");
		document.getElementById("uHealth").focus();
		document.getElementById("uFood").focus();
		document.getElementById("uEducation").focus();
		document.getElementById("uOld").focus();
		document.getElementById("uChild").focus();
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
document.getElementById('signupDonor').style.display = 'none';
document.getElementById('signupNgoModal').style.display = 'none';
document.getElementById('regSignupNgo').style.display = 'none';
document.getElementById('unregSignupNgo').style.display = 'none';
$('#signupModalContent').hide();
}


$(function(){
$('#signinHomeButton').click(function(){ hideAll(); $('#signinModalContent').show(); $('#signinDonor').show(); });
});


$(function(){
$('#closes').click(function(){  $('#signinModalContent').show('fast',function(){ $('#signupDonor').hide(); window.location.reload(); }); });
});

$(function(){
$('#donorTab').click(function(){ hideAll(); $('#signinModalContent').show(); $('#signinDonor').show(); });
});

$(function(){
$('#ngoTab').click(function(){  hideAll(); $('#signinModalContent').show(); $('#signinNgo').show(); });
});

$(function(){
$('#signupDonorButton').click(function(){  hideAll(); $('#signupModalContent').show(); $('#signupDonor').show(); });
});

$(function(){
$('#signupNgo').click(function(){ hideAll(); $('#signupModalContent').show(); $('#signupNgoModal').show(); $('#regSignupNgo').show();});
});

$(function(){
$('#tabRegNGO').click(function(){ hideAll(); $('#signupModalContent').show(); $('#signupNgoModal').show();  $('#regSignupNgo').show(); });
});

$(function(){
$('#tabUnRegNGO').click(function(){ hideAll(); $('#signupModalContent').show(); $('#signupNgoModal').show();  $('#unregSignupNgo').show(); });
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

function ClearAll() {

    var objInput = document.getElementsByTagName("input");

    for (var iCount = 0; iCount < objInput.length; i++) {

        if (objInput[iCount].type == "text")

            objInput[iCount].value = "";
        alert('clearing');
    }

}
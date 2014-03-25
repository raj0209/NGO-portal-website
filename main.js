
function email(email)
{
	document.getElementById(email).value="";
	document.getElementById(email).style.color="black";
}

function password(password)
{
	document.getElementById(password).value="";
	document.getElementById(password).style.color="black";
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


function fnf()
{
	document.getElementById("fn").value="";
	document.getElementById("fn").style.color="black";
}

function lnf()
{
	document.getElementById("ln").value="";
	document.getElementById("ln").style.color="black";
}


function mobf()
{
	document.getElementById("mob").value="";
	document.getElementById("mob").style.color="black";
}

function emlf()
{
	document.getElementById("em").value="";
	document.getElementById("em").style.color="black";
}

function pwdf()
{
	document.getElementById("pass").value="";
	document.getElementById("pass").style.color="black";
}

function submitSignUpForDonor()
{
	if(document.getElementById("fn").value=="" || document.getElementById        ("fn").value=="First Name")
	{
		alert("Please enter your first name");
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

function nnf()
{
	document.getElementById("nn").value="";
	document.getElementById("nn").style.color="black";
}

function cnf()
{
	document.getElementById("cn").value="";
	document.getElementById("cn").style.color="black";
}

function regnof()
{
	document.getElementById("regno").value="";
	document.getElementById("regno").style.color="black";
}
function emf()
{
	document.getElementById("eml").value="";
	document.getElementById("eml").style.color="black";
}

function contf()
{
	document.getElementById("cont").value="";
	document.getElementById("cont").style.color="black";
}

function passf()
{
	document.getElementById("pwd").value="";
	document.getElementById("pwd").style.color="black";
}
function dcf()
{
	document.getElementById("dc").value="";
	document.getElementById("dc").style.color="black";
}
function vif()
{
	document.getElementById("vi").value="";
	document.getElementById("vi").style.color="black";
}
function webf()
{
	document.getElementById("web").value="";
	document.getElementById("web").style.color="black";
}

function unnf()
{
	document.getElementById("unn").value="";
	document.getElementById("unn").style.color="black";
}

function ucnf()
{
	document.getElementById("ucn").value="";
	document.getElementById("ucn").style.color="black";
}

function uemf()
{
	document.getElementById("ueml").value="";
	document.getElementById("ueml").style.color="black";
}

function ucontf()
{
	document.getElementById("ucont").value="";
	document.getElementById("ucont").style.color="black";
}

function upassf()
{
	document.getElementById("upwd").value="";
	document.getElementById("upwd").style.color="black";
}

function udcf()
{
	document.getElementById("udc").value="";
	document.getElementById("udc").style.color="black";
}
function uvif()
{
	document.getElementById("uvi").value="";
	document.getElementById("uvi").style.color="black";
}


function submit3()
{
	if(document.getElementById("nn").value=="" || document.getElementById        ("nn").value=="Name of NGO")
	{
		alert("Please enter the name of NGO");
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

	if(document.getElementById("uvi").value=="" || document.getElementById        ("uvi").value=="Vision")
	{
		alert("Please enter the vision");
		document.getElementById("uvi").focus();
		return false;
	}

}

function eventNamef()
{
	document.getElementById("eventName").value="";
	document.getElementById("eventName").style.color="black";
}

function eventDetailsf()
{
	document.getElementById("eventDetails").value="";
	document.getElementById("eventDetails").style.color="black";
}

function eventLocationf()
{
	document.getElementById("eventLocation").value="";
	document.getElementById("eventLocation").style.color="black";
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




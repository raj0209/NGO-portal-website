<?php
    //Start session
    session_start();    
    //Unset the variables stored in session
    /*unset($_SESSION['SESS_MEMBER_ID']);
    unset($_SESSION['SESS_EMAIL']);
    unset($_SESSION['SESS_PASS']);
    */
    
    //Include database connection details
    require_once('connect.php');
 
    //Array to store validation errors
    $errmsg_arr = array();
 
    //Validation error flag
    $errflag = false;
 
    //Function to sanitize values received from the form. Prevents SQL injection
    function clean($str) {
        $str = @trim($str);
        if(get_magic_quotes_gpc()) {
            $str = stripslashes($str);
        }
        return mysql_real_escape_string($str);
    }
 
    //Sanitize the POST values
    $email = clean($_POST['emailNgo']);
    $password = clean($_POST['passwordNgo']);
    $password = sha1($password);
 
    //Input Validations
    if($email == '') {
        $errmsg_arr[] = 'Email missing';
        $errflag = true;
    }
    if($password == '') {
        $errmsg_arr[] = 'Password missing';
        $errflag = true;
    }
 
    //If there are input validations, redirect back to the login form
    /*if($errflag) {
        $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
        session_write_close();
        header("location: index.php");
        exit();
    }*/
 
    //Create query
    $qry="SELECT * FROM Ngo WHERE email='$email' AND password='$password'";
    $result=mysql_query($qry);
    //echo "string ".$qry;
 
    //Check whether the query was successful or not
    if($result) {
        if(mysql_num_rows($result) > 0) {
            //Login Successful
            session_regenerate_id();
            $member = mysql_fetch_assoc($result);
            $_SESSION['SESS_MEMBER_ID'] = $member['pid'];
            $_SESSION['SESS_EMAIL'] = $member['email'];
            $_SESSION['SESS_TYPE'] = "NGO";
            session_write_close();
            header("location: ngohome.php");
            exit();
        }
        else {
            //Login failed
            $errmsg_arr[] = 'email or password not found';
            $errflag = true;
            if($errflag) {
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
                session_write_close();
                header("location: index.php");
                exit();
            }
        }
    }else {
        die("Query failed");
    }
?>
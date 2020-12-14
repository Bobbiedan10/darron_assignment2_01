/*Registration*/

function checkId(id)
{
//Length Validation
    if(id == "" || id == null)
    {
    document.getElementById("national_id_err").innerHTML = "Error:Missing Information";
    return false;    
    }
    else if(id.length != 15)
    {
    document.getElementById("national_id_err").innerHTML = "Error: Incorrect length";
    return false;
    }
//Hypen Validation
    else if(id.charAt(4) && id.charAt(7) && id.charAt(10) != "-")
    {
    document.getElementById("national_id_err").innerHTML = "Error: Incorrect national Id format(Hypens Needed)";
    return false;
    }
//Year validation
    else if( parseInt(id.substring(0,5)) < 1940 )
    {
    document.getElementById("national_id_err").innerHTML = "Error: Year Is Not Valid";
    return false;
    }
//Month validation
    else if( parseInt(id.substring(5,8)) > 12 || parseInt(id.substring(5,8)) < 1 )
    {
    document.getElementById("national_id_err").innerHTML = "Error: Month Is Not Valid";
    return false;
    }
    else if( parseInt(id.substring(5,8)) == 02 && parseInt(id.substring(8,11)) > 29) 
    {
    document.getElementById("national_id_err").innerHTML = "Error: Invalid Not Date";
    return false;
    }
    else if( parseInt(id.substring(5,8)) == 04 && parseInt(id.substring(8,11)) > 30) 
    {
    document.getElementById("national_id_err").innerHTML = "Error: Invalid Not Date";
    return false;
    }
    else if(parseInt(id.substring(5,8)) == 06 && parseInt(id.substring(8,11)) > 30)
    {
    document.getElementById("national_id_err").innerHTML = "Error: Invalid Not Date";
    return false;
    }
    else if(parseInt(id.substring(5,8)) == 09 && parseInt(id.substring(8,11)) > 30)
    {
    document.getElementById("national_id_err").innerHTML = "Error: Invalid Not Date";
    return false;   
    }
    else if(parseInt(id.substring(5,8)) == 11 && parseInt(id.substring(8,11)) > 30)
    {
    document.getElementById("national_id_err").innerHTML = "Error: Invalid Not Date";
    return false;  
    }
//Day validation
    else if( parseInt(id.substring(8,11)) > 31 )
    {
    document.getElementById("national_id_err").innerHTML = "Error: Day Is Not Valid";
    return false;
    }
//Valid
    else 
    {
    document.getElementById("national_id_err").innerHTML = "";
    return true;
    }
}
//License
function checkLnum(Num)
{        
    if(Num.value == "" || Num.value == null)
    {
        document.getElementById("license_no_err").innerHTML = "Error:Missing Information";
        return false;    
    }
    else if(Num.value.length != 15)
    {
        document.getElementById("license_no_err").innerHTML = "Error: Incorrect length";
        return false;
    }
     else if(isNaN(Num.value))
    {
        document.getElementById("license_no_err").innerHTML = "Error:Enter Only Numbers";
        return false;  
    }
    else 
    {
        document.getElementById("license_no_err").innerHTML = "";
        return true;
    }
}
//Name
function checkName(name)
{
    var a = /^[A-Za-z]+$/;
    
    if(name == document.getElementById("first_name"))
    {
        if (name.value == "" || name.value == null)
        {
            document.getElementById("f_name_err").innerHTML = "Error:Missing Information";
            return false;
        }
        else if(!name.value.match(a))
        {
            document.getElementById("f_name_err").innerHTML = "Error: Letters only";
            return false;
        }
        else
        {
            document.getElementById("f_name_err").innerHTML = "";
            return true;
        }
    }
    
    if(name == document.getElementById("last_name"))
    {        
        if (name.value == "" || name.value == null)
        {
            document.getElementById("l_name_err").innerHTML = "Error:Missing Information";
            return false;
        }
        else if(!name.value.match(a))
        {
            document.getElementById("l_name_err").innerHTML = "Error: Letters only";
            return false;
        }
        else
        {
            document.getElementById("l_name_err").innerHTML = "";
            return true;
        }
    }
    
}
// Email
function checkEmail(email)
{
    var filter = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[09]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (email.value == "" || email.value == null)
    {
        document.getElementById("email_err").innerHTML = "Error: Missing Information";
        return false;
    }
    if (!filter.test(email)) 
    {
        document.getElementById("email_err").innerHTML = "Error: Invalid Format";
        email.focus;
        return false; 
    }
    else
    {
        document.getElementById("email_err").innerHTML = "";
        
    }
    return true;
}

function checkTelNum(telephone)
{
    if(telephone.value == "" || telephone.value == null)
    {
        document.getElementById("tele_err").innerHTML = "Error: Missing Information";
        return false;
    }
    else
    {
        document.getElementById("tele_err").innerHTML = "";
        return false;
    }
}
//Address
function checkAddress(addr)
{
        var a = /^[A-Za-z0-9\s,.'-]{3,}$/;
    
    if(addr == document.getElementById("address_1"))
    {
        if (addr.value == "" || addr.value == null)
        {
            document.getElementById("add1_err").innerHTML = "Error:Missing Information";
            return false;
        }
        else if(!addr.value.match(a))
        {
            document.getElementById("add1_err").innerHTML = "Error: Letters only";
            return false;
        }
        else
        {
            document.getElementById("add1_err").innerHTML = "";
            return true;
        }
    }
    
    if(addr == document.getElementById("address_2"))
    {        
        if (addr.value == "" || addr.value == null)
        {
            document.getElementById("add2_err").innerHTML = "Error:Missing Information";
            return false;
        }
        else if(!addr.value.match(a))
        {
            document.getElementById("add2_err").innerHTML = "Error: Letters only";
            return false;
        }
        else
        {
            document.getElementById("add2_err").innerHTML = "";
            return true;
        }
    }
    }
//Parish
function loadParishes()
{
    var parish = document.getElementById("parish");

    var userParish = parish.options[parish.selectedIndex].value;
    if(userParish == "")
        {
            document.getElementById("parish_err").innerHTML = "Error: Choose a Parish";
            return false;
        }
        else 
        {
            document.getElementById("parish_err").innerHTML = "";
            return true;
        }
    }
//Registration 
    function reg(e) 
    {
        var nationalId = document.getElementById("national_id").value;
        var licenseNo = document.getElementById("license_no");
        var fname = document.getElementById("first_name");
        var lname = document.getElementById("last_name");
        var email = document.getElementById("email");
        var telephone = document.getElementById("prefix")+document.getElementById("suffix");
        var add1 = document.getElementById("address_1");
        var add2 = document.getElementById("address_2");
        
        checkId(nationalId);
        checkLnum(licenseNo);
        checkName(fname);
        checkName(lname);
        checkEmail(email);
        checkTelNum(telephone);
        checkAddress(add1);
        checkAddress(add2);
        loadParishes();
        
        if(!checkId(nationalId) ||  !checkLnum(licenseNo) || !checkName(fname) || !checkName(lname) || !checkEmail(email) || !checkTelNum(telephone) || !checkAddress(add1) || !checkAddress(add2) || !loadParishes() )
        {
            document.getElementsByName("validation_by_js").value="validated";
            e.preventDefault();
            return false;
        }
        else
        {
           
           document.getElementById("register").onclick = newDriver();
            document.location.href="../index.html";
            return true;
        }
        
    }
//NewDriver
    function newDriver(driver) 
    { 
        
        var national_id = document.getElementById("national_id").value;
        var license_no = document.getElementById("license_no").value;
        var fname = document.getElementById("first_name").value;
        var lname = document.getElementById("last_name").value;
        var add1 = document.getElementById("address_1").value;
        var add2 = document.getElementById("address_2").value;
        var parish = document.getElementById("parish");
        var userParish = parish.options[parish.selectedIndex].value;

        driver =
                    {
                    nationalId: national_id,
                    licenseNo: license_no,
                    firstName: fname,
                    surame: lname,
                    address1: add1,
                    address2: add2,
                    parish: userParish,
                    };
            

        var info = localStorage.getItem("driverInfo");
        
            info = JSON.parse(info);
            info.push(driver);
            let driverInfo = JSON.stringify(info);
            localStorage.setItem("driverInfo", driverInfo);
            console.log(localStorage);
        
    }

//Log In DONT NOT TOUCH

//Username
function checkUsername(uname){
    var letter = /^[a-zA-Z]*$/g;
    
    if(uname.value == "" || uname.value == null)
        {
            uname.style.border = "1px solid red";
            document.getElementById("err_username").innerHTML = "Error: Missing Information";
            return false;
        }
    else if(uname.value.length != 8)
        {
            uname.style.border = "1px solid red";
            document.getElementById("err_username").innerHTML = "Error: Incorrect username length";
            return false;
        }
    else if(!uname.value.substring(0,4).match(letter)){
            uname.style.border = "1px solid red";
            document.getElementById("err_username").innerHTML = "Error: First 4 characters must be letters";
            return false;
    }
    
    else if(uname.value.substring(0,1) != uname.value.substring(0,1).toUpperCase()){
            uname.style.border = "1px solid red";
            document.getElementById("err_username").innerHTML = "Error: First letter must be capital";
            return false;
    }
    
    else if(uname.value.substring(1,4) != uname.value.substring(1,4).toLowerCase()){
            uname.style.border = "1px solid red";
            document.getElementById("err_username").innerHTML = "Error: Last 3 letters must be lowercase";
            return false;
    }
    
    else if(isNaN(uname.value.substring(4,9))){
            uname.style.border = "1px solid red";
            document.getElementById("err_username").innerHTML = "Error: Last 4 character must be numbers";
            return false;
    }
    else if(parseInt(uname.value.substring(4,5)) != parseInt(0) && parseInt(uname.value.substring(4,5) ) != parseInt(1))
    {
            uname.style.border = "1px solid red";
            document.getElementById("err_username").innerHTML = "Error: First digit must be a 0 or 1";
            return false;
    }
    else {
            uname.style.border = "none";
            document.getElementById("err_username").innerHTML = "";
            return true;
    }
    
}

function checkPassword(password) {
    var alphanum = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{10,18}$/gm;
    
    if(password.value == "" || password.value == null)
        {
            password.style.border = "1px solid red";
            document.getElementById("err_password").innerHTML = "Error: Missing Information";
            return false;
        }
    
    else if(password.value.length < 10) {
            password.style.border = "1px solid red";
            document.getElementById("err_password").innerHTML = "Error: Password too short";
            return false;
    }
    
    else if(password.value.length > 18) {
            password.style.border = "1px solid red";
            document.getElementById("err_password").innerHTML = "Error: Password too long";
            return false;
    }
    
    else if(!password.value.match(alphanum)){
            password.style.border = "1px solid red";
            document.getElementById("err_password").innerHTML = "Error: Password must contain uppercase letter and number";
            return false;
    }
    else {
            password.style.border = "none";
            document.getElementById("err_password").innerHTML = "";
            return true;
    }
}

function checkUser(data, usertype)
{
    var drivers = localStorage.getItem("driverInfo");
    var allDrivers = JSON.parse(drivers);
    
    console.log(drivers,allDrivers);
    return;
    
    for(var i = 0; i < allDrivers.length; i++)
    {
        var driver = allDrivers[i];
        if(data.username == driver.username && data.password == driver.password)
            {
                sessionStorage.setItem('user', JSON.stringify(driver));
                var loggedInUser = JSON.parse(sessionStorage.getItem('user'));
                window.location.href = "public_console.html";
                console.log("match");
                return;
            }
        else
            {
                console.log("no match");
            }
        
    }
    
}

 function logIn(e)
{
    var user = document.getElementById("username").value;
    var pword = document.getElementById("password").value;
    var info = {
        username: user,
        password: pword,
    };
    
    checkUsername(username);
    checkPassword(password);
    checkUser(info);
    
    if(!checkUsername(username) || !checkPassword(password) || !checkUser(info))
    {
        
        e.preventDefault();
        return false;
    }
    else
    {
        document.getElementById("sign_In").onclick = checkUser(info);
       // window.location.href = "public_console.html";
        return true;
    }

        
}

// Hamberger button 

    function Logout()
    {

    document.getElementById("content").classList.toggle("show");

    }

    window.onclick = function(event)
    {
        if (!event.target.matches('.burger-but'))
        {
            var myList = document.getElementsByClassName("content");
            var i;
            for (i = 0; i < myList.length; i++)
            {
              var openmyList = myList[i];
                  if (openmyList.classList.contains('show'))
                  {
                    openmyList.classList.remove('show');
                  }
            }
        }
    }

    /**
    * loadData function for Assignment #1
    *
    * Add this function to your external JavaScript file. The simplest way to invoke it is
    * to use the onload eventhandler on the body tag of the document, i.e. <body onload="loadData()">.
    * If successful, you should be able to see two sets of data in localStorage. The first is 
    * driverInfo and the second is employeeInfo. Feel free to modify this code to suit your field names.
    */
    function loadData()
    {
    var driverArray = [
     {
        nationalId: "1973-02-09-3043",
        licenseNo: "135686819730209",
        firstName: "Andrew",
        lastName: "Pryor",
        address1: "31 ",
        address2: "Prior Park",
        parish: "St. James",
        username: "Qwer1234",
        password:"andrewPryor123"
     },

     {
        nationalId: "1967-12-12-0404",
        licenseNo: "143647819671212",
        firstName: "Jennifer",
        surname: "Davis",
        address1: "Wavell Ave",
        address2: "Black Rock",
        parish: "St. Michael",
        username: "Geju0593",
        password:"Anoth3rpass"
    },

    {
      nationalId: "1979-04-22-1209",
      licenseNo: "100893419790422",
      firstName: "Anderson",
      surname: "Alleyne",
      address1: "Lascelles Terrace",
      address2: "The Pine",
      parish: "St. Michael",
      username: "Oyqb0789",
      password:"thePassw0rd"
    }
    ]

    var employeeArray = [
    {
      employeeId: "11005457ADMN",
      firstName: "Merissa",
      lastName: "Halliwall",
      password:"f1rst1Pa55"
    },

    {
      employeeId: "11000907DRVR",
      firstName: "Terold",
      lastName: "Bostwick",
      password:"secur3Acc3s5"
    },

    {
    employeeId: "11001478CLRK",
    firstName: "Vanda",
    lastName: "Marshall",
    password:"Oll1Ollip0ps"
    }
    ]

    //add to localStorage 
    if(!localStorage.getItem("driverInfo"))
    {
     localStorage.setItem("driverInfo", JSON.stringify(driverArray));
    }
    
    
    if(!localStorage.getItem("employeeinfo"))
    {
     localStorage.setItem("employeeinfo", JSON.stringify(employeeArray));
    }

}

//Display
function display()
{
    var islogIn = JSON.parse(sessionStorage.getItem("user"));
    console.log(islogIn);
    document.getElementById("F_name").innerHTML = islogIn.firstName + " " + islogIn.lastName;
    
}
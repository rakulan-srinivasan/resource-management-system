<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Income tax calculation</title>
</head>
<body>
    <script>
        console.log("Hello");
        var hi = document.getElementById("hli").value;
        var gp = document.getElementById("gp").value;
        var hra = document.getElementById("hra").value;
        
        const arr=['epf','lic','ppf','fd','hpa'];
        var ded=0;
        for(var i=0;i<arr.length();i++){
            ded+=document.getElementById(arr[i]).value
        }
        var mi = document.getElementById("mi").value; 
        var yob=document.getElementById('yob').value;
        var tax = 0;
        function validation()
        {
            var td = ded + mi;
            if(hi>200000 || td > 150000){ 
                document.getElementById("hli").value="";
                alert("Invalid Value"); 
            return false;}
            else{
                return true;
            }
        }
        function calculate(){
            if (validation()){
                var ngp = gp - hra - hli;
                var nti = ngp - td;
                var age=2022-yob;
                if(age < 60){
                    if(nti <= 250000){ tax = 0; }
                    else if (nti > 250000 && nti <= 500000){ tax = 0.1 * (nti - 250000); }
                    else if (nti > 500000 && nti <= 1000000){ tax = 25000 + (0.2 * (nti - 500000)); }
                    else if (nti > 1000000){ tax = 125000 + (0.3 * (nti - 1000000)); }
                }
                else{
                    if(nti <= 300000){ tax = 0; }
                    else if (nti > 300000 && nti <= 500000){ tax = 0.1 * (nti - 300000); }
                    else if (nti > 500000 && nti <= 1000000){ tax = 20000 + (0.2 * (nti - 500000)); }
                    else if (nti > 1000000){ tax = 120000 + (0.3 * (nti - 1000000)); }
                }
                tax = 1.03 * tax;
            }
        }
    </script>
    <style>
    .data, .data_head, .inp{
        margin: 5px;
    }
    </style>
<div class="data_head">
<form class = "data" method="post" onsubmit="return validation()">
    <p>
    Name: <input class="inp" type="text" id="nam"></input><br>
    Gender: <input class="inp" type="radio" value="f" id="gen">Female</input><input type="radio" value="m" id="gen">Male</input><br>
    Pan Number: <input class="inp" type="text" id="pan"></input><br>
    Gross Pay: <input class="inp" type="number" id="gp"></input><br>
    Housing Loan Interest: <input class="inp" type="number" id="hli"></input><br>
    Year of Birth: <input class="inp" type="number" id="yob"></input><br>
    HRA: <input class="inp" type="number" id="hra"></input><br>
    Principal: <input class="inp" type="number" id="prin"></input><br>
    <section class="deductions">
    80CCE Deductions:<br>
    EPF: <input class="inp" type="number" id="epf"></input><br>
    LIC Premium: <input class="inp" type="number" id="lic"></input><br>
    Mutual Fund, PPF: <input class="inp" type="number" id="ppf"></input><br>
    FD's, School Fees: <input class="inp" type="number" id="fd"></input><br>
    Housing Loan Principal Amount <input class="inp" type="number" id="hpa"></input><br>
    </section>
    Medical Insurance: <input class="inp" type="text" id="mi"></input><br>
    <button type="submit" id="submit" onclick="validation()" value="Submit">Submit</button>
    </p>
</form>
</div>   
</body>
</html>

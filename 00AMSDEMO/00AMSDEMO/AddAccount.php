<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="stdStyle.css" rel="stylesheet">
    <script>
        function showinitialbalance()
        {
            var type = document.getElementById("type").value;
            //alert(type);
            if(type=="Current") 
            {
                document.getElementById("balance").value = "1000";

            }   
            else if(type=="Savings")
            {
                document.getElementById("balance").value = 500;
            }   
            else
            {
                alert("Kindly select account type...");
                document.getElementById("balance").value = 0;
            }     

        }
    </script>
</head>
<body>
<?php 
    include "Header.php";
    
    //database connection
    include "dbconfig.php"; 
?>

<?php
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        //echo '<script>alert("Received..");</script>';
        $cid = $_POST['cid'];
        $bid = $_POST['bid'];
        $type = $_POST['type'];
        $balance = $_POST['balance'];
        $priv = $_POST['priv'];
        $query = "insert into account values('',$cid, $bid, '$type', $balance,'$priv')";
        //echo $query;
        $res = mysqli_query($db, $query);
        if($res>=1)
        {
            echo '<script>alert("Success..");</script>';
        }
        else
        {
            echo '<script>alert("Failed..");</script>';
        }
    }
?>

<div class="contentbody">
    <p class="title">
        ..Add Account..
    </p>
    <form id="addaccountform" method="post" action="">
    <table>
        <tr>
            <td class="column1 orangebox">
                Customer ID               
            </td>
            <td class="column2 greenbox">         
                <input type="text" id="cid" name="cid">      
            </td>
        </tr>
        <tr>
            <td class="column1 orangebox">
                Branch ID & Name               
            </td>
            <td class="column2 greenbox">  
                <select id="bid" name="bid">
<?php
                    $query = "select * from branch";
    
                    //Executing Query
                    $table = mysqli_query($db, $query);
                    while(($row=mysqli_fetch_array($table)))
                    {
                        $bid = $row["BranchId"];
                        $bname = $row["BranchName"];
                        $bnamebid = $bname." - ".$bid;
?>
                        <option value='<?php echo $bid; ?>'>
                            <?php echo $bnamebid; ?>
                        </option>
<?php
                    }
?>
                    </select>
            </td>
        </tr>
        <tr>
            <td class="column1 orangebox">    
                Account Type           
            </td>
            <td class="column2 greenbox">   
                <select id="type" name="type" onchange="showinitialbalance()">
                    <option value="Select">Select Account Type</option>
                    <option value="Current">Current Account</option>
                    <option value="Savings">Savings Account</option>
                </select>            
            </td>
        </tr>
        <tr>
            <td class="column1 orangebox"> 
                Balance              
            </td>
            <td class="column2 greenbox">
                <input type="text" id="balance" name="balance" value="0">               
            </td>
        </tr>
        <tr>
            <td class="column1 orangebox">
                Privilege               
            </td>
            <td class="column2 greenbox">
                <input type="radio" name="priv" id="priv1" value="Silver">Silver</input>              
                <input type="radio" name="priv" id="priv2" value="Gold">Gold</input>              
                <input type="radio" name="priv" id="priv3" value="Platinum">Platinum</input>              
            </td>
        </tr>
    </table>
    <p class="title">
        <input type="submit" value="Add Account">
    </p>
    </form>
</div>

</body>
</html>
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
    
    //Forming a query
    $query = "select * from branch";
    
    //Executing Query
    $table = mysqli_query($db, $query);
    ?>
<div class="contentbody">
    <p class="title">
        ..View Account..
    </p>
    <form id="viewaccountform" method="post" action="">
    <table>
        
        <tr>
            <td class="column1 orangebox">
                Branch ID & Name               
            </td>
            <td class="column2 greenbox">  
                <select id="bid" name="bid">
<?php
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
        
        
    </table>
    <p class="title">
        <input type="submit"  name = "acc" value="View Account">
    </p>
    <hr>
    <p class="title">
        <input type="submit" name = "all" value="View All Accounts">
    </p>
    </form>
</div>

<?php
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if (isset($_POST['acc'])){
        $bid = $_POST['bid'];
        $type = $_POST['type'];

        $query = "select x.CustomerId, y.CustomerName, x.AccountType, x.Balance, x.Privilege from Account x, Customer y where x.CustomerId=y.CustomerId and x.BranchId='$bid' and x.AccountType='$type'";
        }
        elseif (isset($_POST['all'])){
            $query = 'select x.CustomerId, y.CustomerName, x.AccountType, x.Balance, x.Privilege from Account x, Customer y where x.CustomerId=y.CustomerId order by CustomerId';
        }
        $table = mysqli_query($db,$query);
        
        $nrows = mysqli_num_rows($table);
        if($nrows==0)
        {
            echo '<script>alert("No Records Found...");</script>';
        }
        else
        {
            echo '<script>alert("Records Found...");</script>';
            
?>
            <div class="viewbody">
                <table width="100%" border="1" style="border-collapse:collapse;">
                    <thead>
                        <tr>
                            <th>Customer Id</th>
                            <th>Customer Name</th>
                            <th>Account Type</th>
                            <th>Balance</th>
                            <th>Privilege</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
                        while(($row=mysqli_fetch_array($table)))
                        {
                            $cid = $row["CustomerId"];
                            $cname = $row["CustomerName"];
                            $atype = $row["AccountType"];
                            $balance = $row["Balance"];
                            $privilege = $row["Privilege"];
?>
                             <tr>
                                <td><?php echo $cid; ?></td>
                                <td><?php echo $cname; ?></td>
                                <td><?php echo $atype; ?></td>
                                <td><?php echo $balance; ?></td>
                                <td><?php echo $privilege; ?></td>
                            </tr>
<?php
                        }
?>
                    </tbody>
                </table>
            </div>
<?php
        }
    }
?>

</body>
</html>
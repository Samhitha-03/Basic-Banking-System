<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Banking System</title>
    <link rel="stylesheet"href="style_transactions.css">
</head>
<body>
    <div class="navbar">
        <center>
            <hr color="white" width=70% size=1>
            <h1>BASIC BANKING SYSTEM</h1>
            <a class="active" href="index.php">Home</a>
            <a href="sendmoney.php">Send Money</a>
            <a href="customers.php">View All Customers</a>
            <a href="transcations.php">Transactions</a>
            <a href="contact.php">Contact us</a>
            <a href="about.php">About us</a>

                <hr color="grey" width=70% size=1>
                </center>   
    </div>

    <div class="container">
    <div class="header">FEDERAL BANK</div>
    <img src="bank.jpg" height=65% width=30% alt="Welcome to Federal Bank!" style="padding: 5px; margin: 30%;">
    </div>

    <br>
    <div class="contentbox">
        <center>
            <h1>TRANSACTION HISTORY</h1>
        </center>
    <table class="customer">
    <th> ID </th>
    <th> SENDER'S ACCOUNT NO.</th>
    <th> SENDER'S NAME </th>
    <th> RECEIVER'S ACCOUNT NO.</th>
    <th> RECEIVER'S NAME </th>
    <th> AMOUNT TRANSFERRED </th>
    <th> SENDER'S BALANCE </th>
    <th> RECEIVER'S BALANCE </th>
    <th> TRANSACTION STATUS </th>
    <th> TIME </th>
    </tr>

    <?php
     $server="localhost";
     $username="root";
     $password= "";
     $database= "fedbank";

     //create connections
     $con=mysqli_connect($server,$username,$password,$database);
     //check for success connection
     if(!$con)
     {
         die("connection failed due to".mysqli_connect_error());
     }
     $sql="Select * from transactions where ID>202200000";
     $result=$con-> query($sql);
                if($result-> num_rows > 0){
                    while ($row = $result-> fetch_assoc()) {
                        echo "<tr><td>".$row["ID"]."</td><td>".$row["Sender_AccountNo"]."</td><td>".$row["Sender_Name"]."</td>";


                    }
                    echo"</table>";
                }
                else{
                    echo "</table> <br>";
                    echo"0 Result Found";
                }
                $con->close();
                ?>

                </div>
                <br> <br>
                <br> <br>
                <br> <br>
                <br> <br>
                <br> <br>
                <br> <br>
                <br> <br>
                <br> <br>

                <center>
                <div class="pagebreak">
                </div>
                <div style="width:80%; color: white; padding: 20px">
                 <h5> When a customer deposits money into the bank,this money is on loan to the bank
                 </h5>
                </div>
                </center>

                <div class="pagebreak">
                </div>
                <div class="footer"> <center>
                    Made with love by Samhitha !
                 </center>
                </div>
            </center>
</body>
</html>

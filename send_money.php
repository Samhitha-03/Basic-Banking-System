<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BANKING SYSTEM</title>
    <link rel="stylesheet" href="style_sendmoney.css">
</head>
<body>
    <div class="navbar">
    <center>
        <hr color="grey" width=70% size=1>
        <h1>BASIC BANKING SYSTEM</h1>
        <a href="index.php">HOME</a>
        <a class="active" href="send_money.php">Send Money</a>
        <a href="customers.php">View All Customers</a>
        <a href="transactions.php">Transactions</a>
        <a href="contact.php">Contact Us</a>
        <a href="about.php">About Us</a>
        <hr color="grey" width=70% size=1>
    </center>
     </div>

     <div class="container">
        <div class="header">Welcome to Federal Bank!</div>
        <img src="bank.png" height=45% width=25% alt="Welcome to Federal Bank!" style="padding:5px; margin:2px;">
        <br><br>
        <br><br>
     </div>
     <br><br>
     <center>
        <div class="contentbox">
            <h1>TRANSFER MONEY</h1>

            <div class="subcontent">
                <form action="send_money.php" method="POST">
                    <h3>Sender Account</h3>
                
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
                echo"<select id='sender' name='sender'>";
                echo"<option value='' disabled selected hidden>Choose the sender</option>";
                $sqli="Select Name,Account_no from customers";
                $resulti=$con-> query($sqli);
                if($resulti-> num_rows > 0){
                    while ($row = $resulti-> fetch_assoc()) {
                        echo"<option value='". $row["Account_no"] ."'>". $row["Name"] ."<p> &nbsp; &nbsp;</p>". $row["Account_no"] ."</option>";

                    }
                }
                echo "</select>";
                echo "<br> <br> <h3> Receiver Amount </h3>";

                echo"<select id='receiever' name='receiever'>";
                echo"<option value='' disabled selected hidden>Choose the receiver</option>";
                $resulti=$con-> query($sqli);
                if($resulti-> num_rows > 0){
                    while ($row = $resulti-> fetch_assoc()) {
                        echo"<option value='". $row["Account_no"] ."'>". $row["Name"] ."<p> &nbsp; &nbsp;</p>". $row["Account_no"] ."</option>";

                    }
                }
                echo "</select>";
                $con->close();
                ?>
                <br><br>
                <h3>Amount</h3><input class="input" type="text" name="amount" id="amount" placeholder="Enter the account holder">
                <br>
                    <button class="button" value="submit">Send Money</button>
                <br> <br>
                </form>

                <?php

                if(isset($_POST["sender"])){
                    $server="localhost";
                    $username= "root";
                    $password= "";
                    $database= "fedbank";
                    $tablename="customers";

                    $con=mysqli_connect($server,$username,$password,$database);
                    if(!$con){
                        die("connection to the database failed due to". mysqli_connect_error());
                    }
                    $sender=$_POST['sender'];
                    $receiver=$_POST['receiver'];
                    $amount=$_POST['amount'];

                    $sql1="SELECT Name,Balance FROM customers WHERE Account_no=$sender";
                    $sql2="SELECT Name,Balance FROM customers WHERE Account_no=$receiver";
                    //query to select amounts from the database for R ans S
                    $res1= $con ->query($sql1);
                    $res2= $con-> query($sql2);
                    $sender_bal=$receiver_bal=$sender_name=$receiver_name=0;

                    while ($row = $res1->fetch_assoc()) {
                        $sender_bal=$row["Balance"];
                        $sender_name=$row["Name"];
                    }
                    if($sender_bal>=$amount){
                        //final balance
                        $receiver_bal+= $amount;
                        $sender_bal-=$amount;

                        $update1="UPDATE customers SET Balance=$receiver_bal WHERE Account_no=$receiver";
                        $update2= "UPDATE customers SET Balance=$sender_bal WHERE Account_no=$sender";

                        $updatebal_rec=$con ->query($update1);
                        $updatebal_sender=$con->query($update2);

                        if($updatebal_sender==true && $updatebal_rec==true){
                            echo "<hr style='color: green'> Transaction Successful! </h3>";
                            $status="Transaction Successful";

                            //add into records when transaction is successful
                            $query_rec="INSERT INTO transactions(Sender_AccountNo, Sender_Name,Receiver_Name,Receiver_AccountNo,Amount) VALUES ('$sender', '$sender_name','$receiver_name', '$receiver', $amount)";
                            if($con->query($query_rec)==true){
                                echo "successfully inserted";
                                $insert=true;
                        }
                        else{
                            echo "ERROR : $sql <br> $con-> error";
                        }
                    }
                    else{
                        echo "<h3 style='color : brown'> ERROR! Invalid Account Number </h3>";
                        echo "ERROR : $sql <br> $con-> error";
                        
                    }
                }
            }
                if($sender_bal<$amount){
                    $status="Transaction Failed";

                    $query_rec= "INSERT INTO transactions(Sender_AccountNo, Sender_Name,Receiver_Name,Receiver_AccountNo,Amount) VALUES ('$sender', '$sender_name','$receiver_name', '$receiver', $amount) ";
                    if($con->query($query_rec)==true){
                        echo "successfully inserted";
                        $insert=true;
                }
                else{
                    echo "ERROR : $sql <br> $con-> error";
                }
                echo "<h3 style='color : red'> Transaction Failed! Insufficient Balance in Sender's Account </h3>";
            }
            $con->close();
            ?>
         </div>
        </div>

        <div class="pagebreak">
        </div>

        <div style="width:80%; color: white; padding: 20px">
        <h5> When a customer deposits money into the bank,this money is on loan to the bank</h5>
        </div>
        <div class="pagebreak">
        </div>
        <div class="footer"><center>
            Made with love by Samhitha !
        </center>
        </div>
     </center>
</body>
</html>
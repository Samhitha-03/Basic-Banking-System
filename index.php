<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Banking System</title>
    <link rel="stylesheet"href="style_index.css">
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
    <center>
        <div class="contentbox">
            <h1>OUR FACILITIES</h1>

            <div class="subcontent">
                <img src="user.png" alt="View Customers" width=50% height=30% style="border-radius: 10px;
                border-style:double; display:block;margin:5px;">
                <h2><a href="customers.php"> View Customers</a></h2>
                <h4>Customer Details</h4>
            </div>

        <div class="subcontent">
            <img src="transfer.jpg" alt="Transfer money" width=50% height="30%" style="border-radius: 10px;
            border-style:double; display:block; margin: 5px;">
            <h2><a href="sendmoney.php">Transfer Money</a></h2>
            <h4>Here you can send money from your account</h4>
        </div>

        <div class="subcontent">
            <img src="history.png" alt="Check Transactions" width=50% height="30%" style="border-radius: 10px;
            border-style:double; display:block; margin: 5px;">
            <h2><a href="transactions.php">Transactions</a></h2>
            <h4>Here you can check the transactions involved</h4>
        </div>
        <div class="pagebreak">
        </div>

        <div style="width:80%;color:white;padding: 20px">
        <h4>When a customer deposits money into the bank,this money is on loan to the Bank
        </h4>
        </div>
        <div class="pagebreak">      
        </div>
        <div class="footer"> <center>
            Made with love by Samhitha !
        </center>
        </div>
    </center>
</body>
</html>
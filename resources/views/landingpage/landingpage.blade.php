<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>ACLC SCHEDULE</title>
    <style>
        /* Define CSS styles for your elements here */

        .container {
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        /* Add rounded borders to the <a> elements */
        .rounded-link {
            display: inline-block;
            padding: 10px 40px 10px 40px;
            border: 2px solid #57b846; /* Use the same button color as the previous example */
            border-radius: 25px; /* Use a similar border-radius value */
            text-align: center;
            text-decoration: none;
            margin: 5px; /* Add some spacing between the links */
            color: #fff; /* Change text color to white */
            background-color: #57b846; /* Change background color to match the button color */

        }

        .rounded-link:hover {
            background-color: #333333; /* Change background color on hover */
            border-color: #333333; /* Change border color on hover */
        }

        /* Center the "ACCESS WITH" text */
        .centered-text {
            text-align: center;
            font-size: 30px;
            color: #333333; /* You can set the color as needed */
        }

        /* Define your top navigation bar styles */
        .topnav {
            background: #333333;
            overflow: hidden;
        }

        .logo {
            color: #fff;
            text-decoration: none;
            padding: 15px;
            font-size: 24px;
        }
        /* Common Styles */
body {
    font-family: Poppins-Regular, sans-serif;
    background: linear-gradient(-135deg, #c850c0, #4158d0);
    height: 100%;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}


/* Add more common styles here */

    </style>
</head>
<body>
   

    <div class="container">
        
        <h3 class="centered-text">ACCESS WITH</h3>
        <a href="/login" class="rounded-link">Admin</a>
        <a href="/teacherID" class="rounded-link">Teacher</a>
        <a href="/studentID" class="rounded-link">Student</a>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

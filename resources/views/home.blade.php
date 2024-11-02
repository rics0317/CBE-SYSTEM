<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College of Business Education</title>
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Add your CSS file here -->
    <style>
        body {
            background-color: #f0f0f0;
            padding: 0;
            margin: 0;
            border: -10;
            overflow: hidden;
        }
        .navbar {
            background-color: #FFC107; /* Yellow background */
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 10px 0;
        }
        .navbar a {
            text-decoration: none;
            color: black;
            font-weight: bold;
            transition: color 0.3s; /* Smooth transition for color change */
        }
        .navbar a:hover {
            color: #FF8c00; /* Change color on hover */
        }
        .logo {
            margin-top: -200px;
            margin-left: 750px;
           
        }
        .container {
            margin-top: 30px;
            margin-left: 10px;
            width: 100%;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="{{ route('login') }}">Student</a>
        <a href="#">Officer</a>
        <a href="#">Enrollment</a>
    </div>
    <div class="container">
        <img src="{{ asset('images/cbe1.jpg') }}" alt="Department Logo" class="img-fluid my-4" style="max-width: 99%; height: auto; border-radius: 25px;">
        <div class="logo">
            <img src="{{ asset('images/dep.png') }}" alt="College Logo" class="img-fluid my-4" style="max-width: 99%; height: 400px;">
        </div>
    </div>
</body>
</html>

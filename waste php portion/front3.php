<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Catalog</title>
    <style>
        body {
            background-color: black;
            background-repeat: no-repeat;
            background-size: 1500px;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: black;
        }

        header {
            background-image: url('header bg.jpg');
            background-repeat: repeat-x;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
color:white;
        }

.hero-card {
           
            width: 1090px;
            height: 250px;
            border: solid hidden;
            border-radius: 70px;
           
            margin-left: 110px;
            margin-bottom:90px;
            color: white;
            padding: 10px;
            text-align: center;
        }
.hero-card video {
                width: 100%;
                height: 100%;
                border: solid hidden;
                border-radius: 30px;
                object-fit: cover;


            }


        }

        h1 {
            align-content: center;
            color: azure;
        }

        h2 {
            color: azure;
        }

        nav {
            background-color: transparent;
            padding: 10px;
            border: 3px solid hidden;
            border-radius: 15px;
        }
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            color: mistyrose;
            background-color: transparent;
            border: 1px solid hidden;
            border-radius: 13px;
            padding: 5px;
            font-family: 'Trebuchet MS', sans-serif;
            display: inline;
            margin-right: 30px;
        }

            li:hover {
                background-color: darkgray;
            }

            li:hover {
                background-color: darkslategrey;
            }


        a {
            text-decoration: none;
            color: #fff;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .card {
            width: 300px;
            margin: 20px;
           background-color:floralwhite;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
transition: transform .3s;
        }
.card:hover {
                transform:scale(1.1);
            }

            .card img {
                width: 100%;
                height: 200px;
                object-fit: cover;
            }

        .card-content {
            padding: 15px;
        }

            .card-content h3 {
                margin: 0;
                color: #333;
            }

            .card-content p {
                margin: 5px 0;
                color: #777;
            }

        .book-now-btn {
            background-color: #333;
            color: #fff;
            padding: 8px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin-top: 10px;
        }
.book-now-btn:hover{
            background-color:forestgreen;
        }
    </style>
</head>


<body>

    <header>
        <h1>Saltanat Car Rentals</h1>
        <h2>Welcome to our website </h2>

    </header>
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="contact.php">Contact us</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href=" admin page ki link">For Admin</a> </li>

        </ul>
    </nav>

 <div class="hero-card">
            <h2>Get started with your journey with us! </h2>
 <video width="320" height="240" autoplay muted>
                <source src="page_pics/carkeyvid.mp4" type="video/mp4">
            </video>
        </div>

    <div class="container">
        <?php
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $con = mysqli_connect('localhost','root','','fin');
        if(!$con)
        {
        echo 'please check your Database connection';
        }
       

        // Perform a SQL query to fetch car details
        $sql = "SELECT * FROM cars WHERE status!='booked' " ;
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
        // Display cards for each car
        while ($row = $result->fetch_assoc()) {
        echo '<div class="card">
            ';
            echo '<img src="car_images2/' . $row['filenames'] . '" alt="' . $row['make'] . ' ' . $row['model'] . '">';
            echo '<div class="card-content">
                ';
                echo '<h3>' . $row['make'] . ' ' . $row['model'] . '</h3>';
                echo '<p><strong>Color:</strong> ' . $row['color'] . '</p>';
                echo '<p><strong>Seating Capacity:</strong> ' . $row['seating_capacity'] . '</p>';
                echo '<p><strong>Plate Number:</strong> ' . $row['car_plate'] . '</p>';
                echo '<p><strong>Body Type:</strong> ' . $row['body_type'] . '</p>';
                echo '<p><strong>Status:</strong> ' . $row['status'] . '</p>';
                echo '<a href="#" class="book-now-btn">Book Now</a>';
                echo '
            </div>';
            echo '
        </div>';

        }
        } else {
        echo '<p>No cars found in the database.</p>';
        }

        // Close the database connection
        //$mysqli->close();
        ?>
    </div>



</body>
</html>

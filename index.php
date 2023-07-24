<?PHP
    $added = false;
    if (isset($_POST['submit'])) {
        $hostname = "sql108.epizy.com";
        $db_user = "epiz_33984872";
        $db_pass = "IVXmi5pqagijtse";
        $db_name="epiz_33984872_metromate";
        $conn = mysqli_connect($hostname, $db_user, $db_pass, $db_name);
        $query = "INSERT INTO emails(email) VALUES('".$_POST['email']."')";
        mysqli_query($conn, $query);
        $added = true;
    }    
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="" id="css">
        <link rel="icon" type="image/png" href="images/metromate_logo.png">
        <title>MetroMate</title>
        <?PHP if ($added): ?>
        <script>
            alert('Added you to newsletter!')
        </script>
        <?PHP endif; ?>
    </head>
    <body class="text-center">
        <?PHP require('navbar.php'); ?>
        <div id="home">
            <img src="images/metromatetext.png" width="500">
            <br><br>
            <h2 class="text-white"><i>Ride Smarter</i></h2>
            <br><br>
            <div class="flex container">
                <img class="mobilehide" src="images/app_preview_1.png" height="750">
                <div>
                    <h1 class="text-white">Navigation, Simplified</h1>
                    <p style="padding:20px;" class="text-white">
                        With bus tracking and route mapping combined, MetroMate is the only app you'll ever need when traveling by bus. MetroMate uses real-time data to make your trip as quick and easy as possible.
                    </p>
                </div>
            </div>
            <br>
            <div class="flex container">
                <div>
                    <h1 class="text-white">Know Your City
                    <p style="padding:20px;" class="text-white">
                        MetroMate's resource search feature allows you to instantly find resources such as food and shelter with one press of a button. MetroMate uses mapping software that is constantly updated to bring you the newest version of your city.
                    </p>
                </div>
                <img class="mobilehide" src="images/app_preview_2.png" height="750">
            </div>
            <br>
            <div class="flex container">
                <img class="mobilehide" src="images/congressionalappchallenge.png" height="250">
                <div>
                    <h1 class="text-white">Award-Winning</h1>
                    <p style="padding:20px;" class="text-white">
                        Developed by Matthew Bevins and Miles Schuler of Lakeside School in Seattle, MetroMate was the winner of the Congressional App Challenge for the WA-07 District.
                    </p>
                </div>
            </div>
        </div>
        <div id="contact">
            <br>
            <div class="container">
                <h1 class="text-white">Contact Us</h1>
                <h2><a href="https://twitter.com/@MetroMate" target="_blank" class="text-success">Twitter - @MetroMate</a></h2>
                <h2><a href="https://youtube.com/@MetroMate" target="_blank" class="text-success">YouTube - @MetroMate</a></h2>
                <h2><a href="mailto:metromatebellevue@gmail.com" target="_blank" class="text-success">Email - metromatebellevue@gmail.com</a></h2>
                <br>
                <img src="images/matthewandmiles.jpg" height="500">
                <p class="text-white"><i>Matthew Bevins, Congresswoman Jayapal, and Miles Schuler</i></p>
                <br>
                <br>
            </div>
        </div>
        <div id="get">
            <br>
            <div class="container">
                <h1 class="text-white mobilehide">Get MetroMate</h1>
                <br>
                <div class="flex container">
                    <div>
                        <h1 class="text-white">Available on Android</h1>
                        <button class="btn btn-success" onclick="alert('Coming Soon!')"><h2>Click Here</h2></button>
                    </div>
                    <img class="mobilehide" src="images/app_preview_4.png" height="750">
                </div>
                <form method="POST" action="<?PHP echo $_SERVER['PHP_SELF']; ?>">
                    <h2 class="text-white">Join Our Newsletter</h2>
                    <input class="form-control" name="email" type="email" placeholder="Your Email Here">
                    <button class="btn btn-success" name="submit"><h2>Submit</h2></button>
                </form>
                <br>
            </div>
        </div>
        <script src="js/bootstrap.js"></script>
        <!--IF MOBILE-->
        <script>
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                document.getElementById("css").href = "css/mobilestyle.css";
                let i = document.getElementsByTagName("input")[0]
                i.style.fontSize = '75px'
            }
            else {
                document.getElementById("css").href = "css/style.css";
            }
        </script>
    </body>
</html>
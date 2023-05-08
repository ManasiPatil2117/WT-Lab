<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marksheet</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    
    <?php
   $servername = "localhost";
    $username = "root";
    $db_password = "";
    $database = "test";
    $conn = mysqli_connect($servername, $username, $db_password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    ?>

    <div class="main-container">
        <div class="header-container">
        <img src="https://upload.wikimedia.org/wikipedia/en/f/f0/Vishwakarma_Institute_of_Technology.png" height="90px">

            <div class="header">
                <p>Bansilal Ramnath Agarwal Charitable Trust's</p>
                <h2>Vishwakarma Institute of Technology</h2>
                <p>666, Upper Indiranagar, Bibwewadi, Pune-411037, India</p>
                <p>(An Autonomous Institute Affiliated to Savitribai Phule Pune University)</p>
                <h3 class="highlight">Statement of Grades</h3>
            </div>
        </div>

        <div class="student-info">
            <table>
                <tr>
                    <td colspan="2">
                        <p>Name : </p>
                        <h4 id="name"></h4>
                    </td>
                   
                </tr>
                <tr>
                    <td>
                        <p>GR No : </p>
                        <form class="query" action="displaymarks.php">
                            <input type="text" name="grno" required placeholder="Enter GR No.">
                    </td>
                    <td>
                        <p>Mother's Name : </p>
                        <h4 id="mother"></h4>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p>Program : </p>
                        <h4 id="program"> BACHELOR OF TECHNOLOGY</h4>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p>Branch</p>
                        <h4 id="course">B.Tech-Computer Engineering</h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Class : </p>
                        <h4 id="clas">Third Year</h4>
                    </td>
                    <td>
                        <p>Semester : </p>
                        <h4 id="semester"><input type="text" placeholder="Enter semester" name="semester" required>
                            <button type="submit" hidden></button>
                            </form>
                        </h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Month & Year Of Exam : </p>
                        <h4 id="clas">Dec 2022</h4>
                    </td>
                    <td>
                        <p>Semester Result Date : </p>
                        <h4 id="semester">30 December 2022</h4>
                    </td>
                </tr>
            </table>
        </div>
        <div class="student-marks">
            <table>
                <tr>
                    <th>Sr.No</th>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>Credits</th>
                    <th>Grades</th>
                </tr>
            </table>
        </div>
        <div class="evaluation">
            <table>
                <tr>
                    <th colspan="2">Current Semester Record</th>
                    <th colspan="2">Cumulative Semester Record</th>
                </tr>
                <tr>
                    <th>Course</th>
                    <th>Credits Registered</th>
                    <th>Credits Earned</th>
                    <th>SGPA</th>
                    <th>Credits Registered</th>
                    <th>Credits Earned</th>
                    <th>CGPA</th>
                </tr>
            </table>
            <div class="footer">
                <br>
                <p>Cumulative Result Status : </p>
                <h4 id="result"></h4>
                <p>As On Date : </p>
                <h4 id="resultdate"></h4>
            </div>
        </div>
    </div>
</body>

</html>
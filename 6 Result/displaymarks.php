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
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $grno = $_GET["grno"];
            $semester = $_GET["semester"];
            $sql = "SELECT * FROM student WHERE grno = " . $grno;
            $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
            ?>
            <div class="student-info">
                <table>
                    <tr>
                        <td colspan="2">
                            <p>Name : </p>
                            <h4>
                                <?php echo $row['name']; ?>
                            </h4>
                        </td>
                        <center>

                            <img src="profile.jpeg" alt="" width="100px" height="100px">
                        </center>
                    </tr>
                    <tr>
                        <td>
                            <p>GR No : </p>
                            <form class="query" action="displaymarks.php">
                                <input type="text" name="grno" value=<?php echo $grno; ?>>

                        </td>
                        <td>
                            <p>Mother's Name : </p>
                            <h4>
                                <?php echo $row['mother']; ?>
                            </h4>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>Program : </p>
                            <h4>
                                <?php echo $row['program']; ?>
                            </h4>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>Branch</p>
                            <h4>
                                <?php echo $row['branch']; ?>
                            </h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Class : </p>
                            <h4>
                                <?php echo $row['class']; ?>
                            </h4>
                        </td>
                        <td>
                            <?php
                            ?>
                            <p>Semester : </p>
                            <h4>
                                <input type="text" name="semester" value=<?php echo $semester; ?>>
                                <button type="submit" hidden></button>
                                </form>
                            </h4>
                        </td>
                    </tr>
                    <?php
                    $sql2 = "SELECT m.coursecode, m.credits, m.grade, c.title, c.semester, c.examdate, c.resultdate
                        FROM marksheet m 
                        JOIN courses c ON m.coursecode = c.code WHERE m.grno =" . $grno . " AND c.semester = " . $semester;
                    $result2 = mysqli_query($conn, $sql2);
                    $rowno = 1;
                    $report = mysqli_fetch_assoc($result2)
                        ?>
                    <tr>
                        <td>
                            <p>Month & Year Of Exam : </p>
                            <h4>
                                <?php echo $report['examdate']; ?>
                            </h4>
                        </td>
                        <td>
                            <p>Semester Result Date : </p>
                            <h4>
                                <?php echo $report['resultdate']; ?>
                            </h4>
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
                    <?php
                    echo '<tr>';
                    echo '<td>' . $rowno . '</td>';
                    echo '<td>' . $report['coursecode'] . '</td>';
                    echo '<td>' . $report['title'] . '</td>';
                    echo '<td>' . $report['credits'] . '</td>';
                    echo '<td>' . $report['grade'] . '</td>';
                    echo '</tr>';
                    $rowno = $rowno + 1;
                    $resultdate = $report['resultdate'];
                    while ($report = mysqli_fetch_assoc($result2)):
                        echo '<tr>';
                        echo '<td>' . $rowno . '</td>';
                        echo '<td>' . $report['coursecode'] . '</td>';
                        echo '<td>' . $report['title'] . '</td>';
                        echo '<td>' . $report['credits'] . '</td>';
                        echo '<td>' . $report['grade'] . '</td>';
                        echo '</tr>';

                        ?>

                        <?php
                        $rowno = $rowno + 1;
                    endwhile; ?>
                </table>
            </div>
            <div class="evaluation">
                <?php
                $sql = "SELECT SUM(credits) AS credits from marksheet WHERE grno =" . $grno;
                $sql2 = "SELECT SUM(credits) AS credits FROM marksheet m JOIN courses c ON m.coursecode = c.code WHERE m.grno =" . $grno . " AND semester = " . $semester;
                $cumulativeresult = mysqli_query($conn, $sql);
                $currentresult = mysqli_query($conn, $sql2);
                $cumulativesemester = mysqli_fetch_assoc($cumulativeresult);
                $currentsemester = mysqli_fetch_assoc($currentresult);
                ?>
                <table>
                    <tr>
                        <th colspan="4">Current Semester Record</th>
                        <th colspan="3">Cumulative Semester Record</th>
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
                    <?php
                    echo "<tr>";
                    echo "<td>";
                    echo $row["program"];
                    echo "</td>";

                    echo "<td>";
                    echo $currentsemester["credits"];
                    echo "</td>";

                    echo "<td>";
                    echo $currentsemester["credits"];
                    echo "</td>";


                    echo "<td>";
                    echo ($GPA = rand(6 * 10, 10 * 10) / 10);
                    echo "</td>";


                    echo "<td>";
                    echo $cumulativesemester["credits"];
                    echo "</td>";

                    echo "<td>";
                    echo $cumulativesemester["credits"];
                    echo "</td>";

                    echo "<td>";
                    echo $GPA;
                    echo "</td>";

                    echo "</tr>";
                    ?>

                </table>
                <div class="footer">
                    <br>
                    <p>Cumulative Result Status : </p>
                    <h4>PASS</h4>
                    <p>As On Date : </p>
                    <h4>
                        <?php echo $resultdate; ?>
                    </h4>
                </div>
                <?php
        }
        ?>

        </div>
    </div>
</body>

</html>
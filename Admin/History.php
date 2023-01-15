<!DOCTYPE html>
<?php
include('header.php');
?>
<html>

<head>
    <title>Generic - Snapshot by TEMPLATED</title>
    <link rel="stylesheet" href="css2/main.css" />
    <link rel="icon" type="image/png" href="images2/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor2/bootstrap/css/bootstrap.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts2/font-awesome-4.7.0/css/font-awesome.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor2/animate/animate.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor2/select2/select2.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor2/perfect-scrollbar/perfect-scrollbar.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css2/util.css" />
    <link rel="stylesheet" type="text/css" href="css2/main2.css" />
    <style>
        .fNew {
            text-align: center;
            font-family: Lato-Regular;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>

    <div class="page-wrap">
        <!-- Nav -->


        <!-- Main -->
        <section style="margin-left: 113px;margin-top: 49px; background:transparent">
            <!-- Header -->

            <!-- Section -->
            <section>
                <div class="limiter">
                    <div class="shapeTable">
                        <div class="wrap-table100">
                            <div class="fNew">
                                <?php include("condb.php"); ?>
                                <?php
                                $ID = $_GET["input1"];
                                $sql = "SELECT h.Username,h.Movie_name,p.ID
                                                FROM profile p INNER JOIN history h on p.Username=h.Username";
                                $strSQL .= " WHERE p.Username LIKE '" . $ID . "%'";
                                $result = $con->query($sql);
                                $c = 0;
                                $rid = "";
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        if ($row["Username"] == $ID) { ?>
                                            <h1>History : <?php echo $row["Username"]; ?></h1>

                                <?php break;
                                        }
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                                <!--search-->
                                <!--search-->

                            </div>
                            <div class="table100 ver1 m-b-110">
                                <div class="table100-head">
                                    <table>
                                        <thead>
                                            <tr class="row100 head">
                                                <th class="cell100 column1" style="width: 50%">Username</th>
                                                <th class="cell100 column2" style="width: 50%">Movie</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div class="table100-body js-pscroll">
                                    <table>
                                        <tbody>
                                            <tr class="row100 body">
                                                <?php include("condb.php"); ?>
                                                <?php
                                                $ID = $_GET["input1"];
                                                $sql = "SELECT h.Username,h.Movie_name,p.ID
                                                                FROM profile p INNER JOIN history h on p.Username=h.Username";
                                                $strSQL .= " WHERE p.Username LIKE '" . $ID . "%'";
                                                $result = $con->query($sql);
                                                $rid = "";
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        if ($row["Username"] == $ID) { ?>

                                                            <td class="cell100 column2" style="width: 50%"><?php echo $row["Username"]; ?></td>
                                                            <td class="cell100 column2" style="width: 50%"><?php echo $row["Movie_name"]; ?></td>

                                            </tr><?php
                                                            $rid = $row["ID"];
                                                        }
                                                    }
                                                } else {
                                                    echo '<h1 class="fNew">No history</h1>';
                                                }

                                                $con->close();
                                                    ?>
                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php
                            echo '<a href=detail.php?input1=' .
                                $rid . '>' . '<p class="fNew">' . "กลับไปหน้าก่อนหน้านี้" . ' </p></a> ' . ' </td> ';
                            ?>
                        </div>

                    </div>
                </div>
            </section>
        </section>
    </div>
    <!-- Scripts -->
    <script src="assets/js2/jquery.min.js"></script>
    <script src="assets/js2/jquery.poptrox.min.js"></script>
    <script src="assets/js2/jquery.scrolly.min.js"></script>
    <script src="assets/js2/skel.min.js"></script>
    <script src="assets/js2/util.js"></script>
    <script src="assets/js2/main.js"></script>

    <!--===============================================================================================-->
    <script src="vendor2/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor2/bootstrap/js/popper.js"></script>
    <script src="vendor2/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor2/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor2/perfect-scrollbar/perfect-scrollbar.min.js"></script>
</body>

</html>
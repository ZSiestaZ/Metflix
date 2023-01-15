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
                    <h1 class="fNew">Profile User</h1>
                    <div class="shapeTable">
                        <div class="wrap-table100">
                            <div class="table100 ver1 m-b-110">
                                <div class="table100-head">
                                    <table>
                                        <thead>
                                            <tr class="row100 head">
                                                <th class="cell100 column1" style="width: 50%">The topic</th>
                                                <th class="cell100 column2" style="width: 50%">Details</th>
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
                                                $strSQL = "SELECT *
                                FROM profile p INNER JOIN users u ON p.ID = u.ID";
                                                $strSQL .= " WHERE u.ID LIKE '" . $ID . "%'";
                                                $result = $con->query($strSQL);
                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while ($row = $result->fetch_assoc()) {
                                                ?>
                                            <tr>
                                                <td class="cell100 column1" style="width: 50%">ID</td>
                                                <td class="cell100 column2" style="width: 50%"><?php echo $row["ID"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="cell100 column1" style="width: 50%">Username</td>
                                                <td class="cell100 column2" style="width: 50%"><?php echo $row["Username"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="cell100 column1" style="width: 50%">Name</td>
                                                <td class="cell100 column2" style="width: 50%"><?php echo $row["Name"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="cell100 column1" style="width: 50%">Email</td>
                                                <td class="cell100 column2" style="width: 50%"><?php echo $row["Email"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="cell100 column1" style="width: 50%">Password</td>
                                                <td class="cell100 column2" style="width: 50%"><?php echo $row["Password"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="cell100 column1" style="width: 50%">Status</td>
                                                <td class="cell100 column2" style="width: 50%"><?php echo $row["Status"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="cell100 column1" style="width: 50%">History</td>
                                                <?php
                                                        echo '<td class="cell100 column1" style="width: 50%"><a href=History.php?input1=' .
                                                            $row["Username"] . '>' . "All history" . ' </a> ' . ' </td> ';
                                                ?>
                                            </tr>
                                            <tr>
                                                <td class="cell100 column1" style="width: 50%">Favorite</td>
                                                <?php include("condb.php"); ?>

                                                <?php
                                                        echo '<td class="cell100 column1" style="width: 50%"><a href=Favorite.php?input1=' .
                                                            $row["Username"] . '>' . "All Favorite" . ' </a> ' . ' </td> ';
                                                ?>
                                            </tr>
                                    <?php
                                                    }
                                                } else {
                                                    echo "0 results";
                                                }
                                                $con->close(); ?>


                                    <tr>
                                        <td class="cell100 column1" style="width: 50%">Card Number</td>
                                        <td class="cell100 column2" style="width: 50%">
                                            <?php include("condb.php"); ?>
                                            <?php
                                            $t =  "SELECT p.ID,pm.Card_Number
                                            FROM profile p  INNER JOIN must m ON p.ID = m.ID 
                                            INNER JOIN payments pm ON m.Payment_ID=pm.Payment_ID";
                                            $t .= " WHERE p.ID LIKE '" . $ID . "%'";
                                            $result = $con->query($t);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                            ?>
                                                    <?php
                                                    echo $row["Card_Number"];

                                                    ?></td><?php
                                                        }
                                                    } else {
                                                        echo "No payment information";
                                                    } ?>
                                    </tr>
                                    <tr>
                                        <td class="cell100 column1" style="width: 50%">Package</td>
                                        <td class="cell100 column2" style="width: 50%">
                                            <?php include("condb.php"); ?>
                                            <?php
                                            $t =  "SELECT p.ID,pm.Package
                                            FROM profile p  INNER JOIN must m ON p.ID = m.ID 
                                            INNER JOIN payments pm ON m.Payment_ID=pm.Payment_ID";
                                            $t .= " WHERE p.ID LIKE '" . $ID . "%'";
                                            $result = $con->query($t);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                            ?>
                                                    <?php
                                                    echo $row["Package"];

                                                    ?></td><?php
                                                        }
                                                    } else {
                                                        echo "No payment information";
                                                    }
                                                    $con->close(); ?>
                                    </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <a href="profile.php">
                            <p class="fNew">กลับไปหน้าก่อนหน้านี้</p>
                        </a>
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
<?php include "config.php" ?>
<?php include "header.php" ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "admin_navigation.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome To Admin
                        <small><?php echo $username; ?></small>
                    </h1>

                </div>
            </div>
            <!-- /.row -->



            <!-- /.row -->

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <?php

                                    $query = "SELECT * FROM medicines";
                                    $select_all_post = mysqli_query($conn, $query);
                                    $medicine_count = mysqli_num_rows($select_all_post);

                                    echo "<div class='huge'>{$medicine_count}</div>"

                                    ?>

                                    <div>Medicines</div>
                                </div>
                            </div>
                        </div>
                        <a href="admin_medicines.php?p_id=3">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <?php



                                    echo "<div class='huge'>6</div>"

                                    ?>

                                    <div>Categories</div>
                                </div>
                            </div>
                        </div>
                        <a href="admin_medicines.php?p_id=3">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>


                <!-- /.row -->

                <?php

                $query = "SELECT * FROM medicines WHERE med_category = 'Antibiotics'";
                $select_all_Antibiotic = mysqli_query($conn, $query);
                $Antibiotic_count = mysqli_num_rows($select_all_Antibiotic);

                $query = "SELECT * FROM medicines WHERE med_category = 'Antiseptic'";
                $select_all_Antiseptic = mysqli_query($conn, $query);
                $Antiseptic_count = mysqli_num_rows($select_all_Antiseptic);

                $query = "SELECT * FROM medicines WHERE med_category = 'Antipyretics'";
                $Antipyretics_query = mysqli_query($conn, $query);
                $Antipyretics_count = mysqli_num_rows($Antipyretics_query);

                $query = "SELECT * FROM medicines WHERE med_category = 'Mood stabilizers'";
                $select_all_MoodStabilizers = mysqli_query($conn, $query);
                $MoodStabilizers_count = mysqli_num_rows($select_all_MoodStabilizers);

                $query = "SELECT * FROM medicines WHERE med_category = 'Stimulant'";
                $select_all_Stimulant = mysqli_query($conn, $query);
                $Stimulant_count = mysqli_num_rows($select_all_Stimulant);

                $query = "SELECT * FROM medicines WHERE med_category = 'Analgesic'";
                $select_all_Analgesic = mysqli_query($conn, $query);
                $Analgesic_count = mysqli_num_rows($select_all_Analgesic);

                ?>
                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['bar']
                    });
                    google.charts.setOnLoadCallback(drawStuff);

                    function drawStuff() {
                        var data = new google.visualization.arrayToDataTable([
                            ['Data', 'Count'],


                            <?php
                            $element_text = ['Antibiotic', 'Antiseptic', 'Antipyretics', 'Mood stabilizers', 'Stimulant', 'Analgesic'];
                            $element_count = [$Antibiotic_count, $Antiseptic_count, $Antipyretics_count, $MoodStabilizers_count, $Stimulant_count, $Analgesic_count];

                            for ($i = 0; $i < 6; $i++) {

                                echo "['{$element_text[$i]}'" . "," . "$element_count[$i]]" . ",";
                            }

                            ?>



                        ]);

                        var options = {
                            title: '',
                            width: 900,
                            legend: {
                                position: 'none'
                            },
                            chart: {
                                title: '',
                                subtitle: ''
                            },
                            bars: 'Vertical', // Required for Material Bar Charts.
                            axes: {
                                x: {
                                    0: {
                                        side: 'bottom',
                                        label: 'Category'
                                    } // Top x-axis.
                                }
                            },
                            bar: {
                                groupWidth: "90%"
                            }
                        };

                        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
                        chart.draw(data, options);
                    };
                </script>
            </div>


        </div>

    </div>
    <!-- /.container-fluid -->


    <div id="top_x_div" style="width: 900px; height: 500px;"></div>
    <?php include "footer.php" ?>
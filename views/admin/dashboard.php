<?php

    $_SESSION['analyseStatus'] = false;

?>
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="fa fa-users text-warning"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">Members</p>
                            <?php
                            
                                $tblquery = "SELECT COUNT(id) AS allMembers FROM members";
                                $tblvalue = array();
                                $select = $connect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);
                                    echo "
                                        <p class='card-title'>$allMembers<p>
                                    ";
                                }
                            
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="fa fa-clock-o"></i>
                    All Members
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="fa fa-home text-success"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">H. Leaders</p>
                            <?php
                            
                                $tblquery = "SELECT COUNT(id) AS homecells FROM tbl_leaders WHERE type = 'H' AND status = '1'";
                                $tblvalue = array();
                                $select = $connect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);
                                    echo "
                                        <p class='card-title'>$homecells<p>
                                    ";
                                }
                            
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="fa fa-clock-o"></i>
                    Active Homecell Leaders
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="fa fa-university text-danger"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">C. Leaders</p>
                            <?php
                            
                                $tblquery = "SELECT COUNT(id) AS churches FROM tbl_leaders WHERE type = 'C' AND status = '1'";
                                $tblvalue = array();
                                $select = $connect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);
                                    echo "
                                        <p class='card-title'>$churches<p>
                                    ";
                                }
                            
                            ?>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="fa fa-clock-o"></i>
                    Active Church Leaders
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="fa fa-bolt text-primary" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">Admin</p>
                            <?php
                            
                                $tblquery = "SELECT COUNT(id) AS admin FROM tbl_leaders WHERE type = 'A' AND status = '1'";
                                $tblvalue = array();
                                $select = $connect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);
                                    echo "
                                        <p class='card-title'>$admin<p>
                                    ";
                                }
                            
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="fa fa-clock-o"></i>
                    Active Admin
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="fa fa-home text-primary"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">Homecells</p>
                            <?php
                            
                                $tblquery = "SELECT COUNT(id) AS allHomecells FROM homecells";
                                $tblvalue = array();
                                $select = $connect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);
                                    echo "
                                        <p class='card-title'>$allHomecells<p>
                                    ";
                                }
                            
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="fa fa-clock-o"></i>
                    All Homecells
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="fa fa-university text-danger"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">Churches</p>
                            <?php
                            
                                $tblquery = "SELECT COUNT(id) AS churches FROM churches ";
                                $tblvalue = array();
                                $select = $connect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);
                                    echo "
                                        <p class='card-title'>$churches<p>
                                    ";
                                }
                            
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="fa fa-clock-o"></i>
                    All Churches
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid pt-5">
    <div class="row">
        <div class="col-12">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <?php 
        $themes = array();
        $attendance = array();
        $mem = array();

        $tblquery = "SELECT theme.id AS theme_id, theme.theme AS t, COUNT(attendance.user) AS members FROM theme INNER JOIN attendance ON theme.id = attendance.theme_id GROUP BY attendance.theme_id  ORDER BY theme.id DESC LIMIT 5";
        $tblvalue = array();
        $select = $connect->tbl_select($tblquery, $tblvalue);
        
        foreach($select as $data){
            extract($data);

            $tblquery = "SELECT COUNT(h_id) AS att FROM attendance WHERE theme_id = :theme_id AND h_id != ''";
            $tblvalue = array(
                ':theme_id' => $theme_id
            );
            $select12 = $connect->tbl_select($tblquery, $tblvalue);
            foreach($select12 as $data){
                extract($data);

                array_push($themes, $t);
                array_push($mem, $members);
                array_push($attendance, $att);
            }
        }
    
    ?>

    <script>
        const ctx = document.getElementById('myChart');

        const plugin = {
            id: 'customCanvasBackgroundColor',
            beforeDraw: (chart, args, options) => {
                const {ctx} = chart;
                ctx.save();
                ctx.globalCompositeOperation = 'destination-over';
                ctx.fillStyle = options.color || '#99ffff';
                ctx.fillRect(0, 0, chart.width, chart.height);
                ctx.restore();
            }
        };

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($themes); ?>,
                datasets: [{
                    label: 'Attendance',
                    data: <?php echo json_encode($attendance); ?>,
                    borderWidth: 1,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        'rgb(20, 290, 0)',
                        'rgb(255, 95, 59)'
                    ],
                    hoverOffset: 4
                },
                {
                    label: 'Total Members',
                    data: <?php echo json_encode($mem); ?>,
                    borderWidth: 1,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        'rgb(20, 290, 0)',
                        'rgb(255, 95, 59)'
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    customCanvasBackgroundColor: {
                        color: 'white',
                    }
                }
            },
            plugins: [plugin],
        });
    </script>
</div>

<div class="container-fluid pt-5">
    <div class="row">
        <!-- Sex -->
        <div class="col-md-6" style="height: 500px;">
            <canvas id="membersSex" class="w-100"></canvas>
        </div>

        <?php
        
            $sex = array();

            $tblquery = "SELECT COUNT(id) AS men FROM members WHERE sex = 'M'";
            $tblvalue = array();
            $men = $connect->tbl_select($tblquery, $tblvalue);
            foreach($men as $data){
                extract($data);
                array_push($sex, $men);
            }

            $tblquery = "SELECT COUNT(id) AS women FROM members WHERE sex = 'F'";
            $tblvalue = array();
            $women = $connect->tbl_select($tblquery, $tblvalue);
            foreach($women as $data){
                extract($data);
                array_push($sex, $women);
            }
        
        ?>

        <script>
            const membersSex = document.getElementById('membersSex');

            new Chart(membersSex, {
                type: 'pie',
                data: {
                    labels: ['Men', 'Women'],
                    datasets: [{
                        data: <?php echo json_encode($sex); ?>,
                        borderWidth: 1
                    }]
                },
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)'
                ],
                hoverOffset: 4,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Members base on Sex'
                        }
                    }
                }
            });
        </script>


        <div class="col-md-5 ml-5" style="height: 500px;">
            <canvas id="login" class="w-100"></canvas>
        </div>

        <?php
        
            $bap = array();

            $tblquery = "SELECT COUNT(id) AS bapt FROM members WHERE baptise != ''";
            $tblvalue = array();
            $baptise = $connect->tbl_select($tblquery, $tblvalue);
            foreach($baptise as $data){
                extract($data);
                array_push($bap, $bapt);
            }

            $tblquery = "SELECT COUNT(id) AS no_bap FROM members WHERE baptise = ''";
            $tblvalue = array();
            $empty = $connect->tbl_select($tblquery, $tblvalue);
            foreach($empty as $data){
                extract($data);
                array_push($bap, $no_bap);
            }
        
        ?>

        <script>
            const login = document.getElementById('login');

            new Chart(login, {
                type: 'doughnut',
                data: {
                    labels: ['Baptise', 'Not Baptise'],
                    datasets: [{
                        data: <?php echo json_encode($bap); ?>,
                        borderWidth: 1
                    }]
                },
                backgroundColor: [
                    'yellow',
                    'peru'
                ],
                hoverOffset: 4,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Members base on Sex'
                        }
                    }
                }
            });
        </script>
    </div>
</div>


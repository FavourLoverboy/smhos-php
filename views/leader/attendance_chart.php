<?php

    $_SESSION['analyseStatus'] = true;

?>
<div class="container-fluid pt-5">
    <div class="row">
        <div class="p-2">
            <h3>Last 5 Homecell Attendance Record</h3>
        </div>
        <div class="col-12">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <?php 
        $themes = array();
        $members = array();
        $attendance = array();

        $tblquery = "SELECT theme.id AS theme_id, theme.theme AS t, COUNT(attendance.user) AS member_att FROM theme INNER JOIN attendance ON theme.id = attendance.theme_id WHERE attendance.h_id = :h GROUP BY attendance.theme_id  ORDER BY theme.id DESC LIMIT 5";
        $tblvalue = array(
            ':h' => $_SESSION['homecell_id']
        );
        $select = $connect->tbl_select($tblquery, $tblvalue);
        
        foreach($select as $data){
            extract($data);

            
            array_push($themes, $t);
            array_push($attendance, $member_att);
        }

        $tblquery = "SELECT COUNT(attendance.id) AS mem FROM attendance INNER JOIN members ON attendance.user = members.id WHERE members.homecell_id = :h GROUP BY attendance.theme_Id";
        $tblvalue = array(
            ':h' => $_SESSION['homecell_id']
        );
        $select12 = $connect->tbl_select($tblquery, $tblvalue);
        foreach($select12 as $data){
            extract($data);
            array_push($members, $mem);
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
                    label: 'Members',
                    data: <?php echo json_encode($members); ?>,
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
                    label: 'Total Attendance',
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
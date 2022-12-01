<?php

    $_SESSION['analyseStatus'] = true;

?>
<div class="container-fluid pt-5">
    <div class="row">
        <div class="p-2">
            <h3>Login Members Record</h3>
        </div>
        <div class="col-12">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <?php 
        $log = array();

        $tblquery = "SELECT COUNT(login) AS login FROM members WHERE login != ''";
        $tblvalue = array();
        $select = $connect->tbl_select($tblquery, $tblvalue);
        foreach($select as $data){
            extract($data);

            array_push($log, $login);
        }

        $tblquery = "SELECT COUNT(login) AS n FROM members WHERE login = ''";
        $tblvalue = array();
        $select = $connect->tbl_select($tblquery, $tblvalue);
        foreach($select as $data){
            extract($data);

            array_push($log, $n);
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
                labels: ['Login', 'Not Login'],
                datasets: [
                    {
                        label: 'Member Login Chart',
                        data: <?php echo json_encode($log); ?>,
                        borderWidth: 1,
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)'
                        ],
                        hoverOffset: 4
                    }
                ]
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
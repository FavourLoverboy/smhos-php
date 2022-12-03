<?php

    $_SESSION['analyseStatus'] = true;

?>
<div class="container-fluid pt-5">
    <div class="row">
        <div class="p-2">
            <h3>Baptise Record</h3>
        </div>
        <div class="col-12">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <?php 
        $bap = array();

        $tblquery = "SELECT COUNT(baptise) AS bapt FROM members WHERE baptise != '' AND homecell_id = :h";
        $tblvalue = array(
            ':h' => $_SESSION['homecell_id']
        );
        $select = $connect->tbl_select($tblquery, $tblvalue);
        foreach($select as $data){
            extract($data);

            array_push($bap, $bapt);
        }

        $tblquery = "SELECT COUNT(baptise) AS n FROM members WHERE baptise = '' AND homecell_id = :h";
        $tblvalue = array(
            ':h' => $_SESSION['homecell_id']
        );
        $select = $connect->tbl_select($tblquery, $tblvalue);
        foreach($select as $data){
            extract($data);

            array_push($bap, $n);
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
                labels: ['Baptise', 'Not Baptise'],
                datasets: [
                    {
                        label: 'Member Baptise Chart',
                        data: <?php echo json_encode($bap); ?>,
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
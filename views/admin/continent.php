<div class="row">
    <div class="p-2">
        <h3>Most Populated</h3>
    </div>
    <div class="col-12">
        <canvas id="myChart"></canvas>
    </div>
</div>

<?php
    $con = array();
    $members = array();

    $tblquery = "SELECT COUNT(id) AS mebs, continent FROM members GROUP BY continent";
    $tblvalue = array();
    $select = $connect->tbl_select($tblquery, $tblvalue);
    // echo 'male <br>';
    foreach($select as $data) {
        extract($data);
        
        array_push($con, $continent);
        array_push($members, $mebs);
    }
?>

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($con); ?>,
            datasets: [{
                label: 'Most Populated',
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
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
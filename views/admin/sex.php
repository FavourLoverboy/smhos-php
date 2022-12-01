<div class="container-fluid pt-5">
    <div class="row">
        <!-- Sex -->
        <div class="col-md-6" style="height: 500px; margin: 10px auto;">
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
    </div>
</div>


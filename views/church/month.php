<div class="container-fluid pt-5">
    <div class="row">
        <div class="p-2">
            <h3>Members Birth Base on Month</h3>
        </div>
        <div class="col-12">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <?php
        $m = array();
        $f = array();
        

        function CheckAge($month, $sex, $connect){
            $tblquery = "SELECT COUNT(id) AS total FROM members WHERE month = :month AND sex = :sex AND church_id = :c";
            $tblvalue = array(
                ':month' => $month,
                ':sex' => $sex,
                ':c' => $_SESSION['church_id']
            );
            $select = $connect->tbl_select($tblquery, $tblvalue);
            foreach($select as $data) {
                extract($data);
                return $total;
            }
        }

        // Men
        $mMonth = CheckAge('1', 'M', $connect);
        array_push($m, $mMonth);

        $mMonth = CheckAge('2', 'M', $connect);
        array_push($m, $mMonth);

        $mMonth = CheckAge('3', 'M', $connect);
        array_push($m, $mMonth);

        $mMonth = CheckAge('4', 'M', $connect);
        array_push($m, $mMonth);

        $mMonth = CheckAge('5', 'M', $connect);
        array_push($m, $mMonth);

        $mMonth = CheckAge('6', 'M', $connect);
        array_push($m, $mMonth);

        $mMonth = CheckAge('7', 'M', $connect);
        array_push($m, $mMonth);

        $mMonth = CheckAge('8', 'M', $connect);
        array_push($m, $mMonth);

        $mMonth = CheckAge('9', 'M', $connect);
        array_push($m, $mMonth);

        $mMonth = CheckAge('10', 'M', $connect);
        array_push($m, $mMonth);

        $mMonth = CheckAge('11', 'M', $connect);
        array_push($m, $mMonth);

        $mMonth = CheckAge('12', 'M', $connect);
        array_push($m, $mMonth);

        // Female
        $fMonrh = CheckAge('1', 'F', $connect);
        array_push($f, $fMonrh);

        $fMonrh = CheckAge('2', 'F', $connect);
        array_push($f, $fMonrh);

        $fMonrh = CheckAge('3', 'F', $connect);
        array_push($f, $fMonrh);

        $fMonth = CheckAge('4', 'F', $connect);
        array_push($f, $fMonth);

        $fMonth = CheckAge('5', 'F', $connect);
        array_push($f, $fMonth);

        $fMonth = CheckAge('6', 'F', $connect);
        array_push($f, $fMonth);

        $fMonth = CheckAge('7', 'F', $connect);
        array_push($f, $fMonth);

        $fMonth = CheckAge('8', 'F', $connect);
        array_push($f, $fMonth);

        $fMonth = CheckAge('9', 'F', $connect);
        array_push($f, $fMonth);

        $fMonth = CheckAge('10', 'F', $connect);
        array_push($f, $fMonth);

        $fMonth = CheckAge('11', 'F', $connect);
        array_push($f, $fMonth);

        $fMonth = CheckAge('12', 'F', $connect);
        array_push($f, $fMonth);
    ?>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Male',
                    data: <?php echo json_encode($m); ?>,
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                },
                {
                    label: 'Female',
                    data: <?php echo json_encode($f); ?>,
                    fill: false,
                    borderColor: 'rgb(175, 192, 100)',
                    tension: 0.1
                }
                ]
            }
        });
    </script>
</div>
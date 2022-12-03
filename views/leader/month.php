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
            $tblquery = "SELECT COUNT(id) AS total FROM members WHERE month = :month AND sex = :sex AND homecell_id = :h";
            $tblvalue = array(
                ':month' => $month,
                ':sex' => $sex,
                ':h' => $_SESSION['homecell_id']
            );
            $select = $connect->tbl_select($tblquery, $tblvalue);
            foreach($select as $data) {
                extract($data);
                return $total;
            }
        }

        // Men
        $mMonth = CheckAge('01', 'M', $connect);
        array_push($m, $mMonth);

        $mMonth = CheckAge('02', 'M', $connect);
        array_push($m, $mMonth);

        $mMonth = CheckAge('03', 'M', $connect);
        array_push($m, $mMonth);

        $mMonth = CheckAge('04', 'M', $connect);
        array_push($m, $mMonth);

        $mMonth = CheckAge('05', 'M', $connect);
        array_push($m, $mMonth);

        $mMonth = CheckAge('06', 'M', $connect);
        array_push($m, $mMonth);

        $mMonth = CheckAge('07', 'M', $connect);
        array_push($m, $mMonth);

        $mMonth = CheckAge('08', 'M', $connect);
        array_push($m, $mMonth);

        $mMonth = CheckAge('09', 'M', $connect);
        array_push($m, $mMonth);

        $mMonth = CheckAge('10', 'M', $connect);
        array_push($m, $mMonth);

        $mMonth = CheckAge('11', 'M', $connect);
        array_push($m, $mMonth);

        $mMonth = CheckAge('12', 'M', $connect);
        array_push($m, $mMonth);

        // Female
        $fMonrh = CheckAge('01', 'F', $connect);
        array_push($f, $fMonrh);

        $fMonrh = CheckAge('02', 'F', $connect);
        array_push($f, $fMonrh);

        $fMonrh = CheckAge('03', 'F', $connect);
        array_push($f, $fMonrh);

        $fMonth = CheckAge('04', 'F', $connect);
        array_push($f, $fMonth);

        $fMonth = CheckAge('05', 'F', $connect);
        array_push($f, $fMonth);

        $fMonth = CheckAge('06', 'F', $connect);
        array_push($f, $fMonth);

        $fMonth = CheckAge('07', 'F', $connect);
        array_push($f, $fMonth);

        $fMonth = CheckAge('08', 'F', $connect);
        array_push($f, $fMonth);

        $fMonth = CheckAge('09', 'F', $connect);
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
<div class="accordion" id="accordionExample">
    <div class="row mb-2">
        <div class="col-md-3 p-3 mr-2 accordion-item">
            <h3 class="accordion-header mb-0" id="headingOne">
                <button class="accordion-button btn-info border-0 btn btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Male
                </button>
            </h3>
        </div>
        <div class="col-md-3 p-3 accordion-item">
            <h3 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed border-0 btn-warning btn btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Female
                </button>
            </h3>
        </div>
        <div class="col-md-3 p-3 ml-2 accordion-item">
            <h3 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed border-0 btn-primary btn btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Both
                </button>
            </h3>
        </div>
    </div>

    <!-- Men -->
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <div class="row">
                <div class="p-2">
                    <h3>Male Members Age Chart</h3>
                </div>
                <div class="col-12">
                    <div class="col-12">pupulation</div>
                    <canvas id="myChart"></canvas>
                    <div class="col-12 text-right">age</div>
                </div>
            </div>

            <?php
                $mAge = array();
                $mCount = array();
            
                function CheckAgeM($sex, $connect){
                    global $mAge;
                    global $mCount;

                    $tblquery = "SELECT dob FROM members WHERE sex = :sex ORDER BY dob DESC";
                    $tblvalue = array(
                        ':sex' => $sex
                    );
                    $select = $connect->tbl_select($tblquery, $tblvalue);
                    // echo 'male <br>';
                    foreach($select as $data) {
                        extract($data);
                        $bday = new DateTime($dob); // Your date of birth
                        $today = new Datetime(date('Y-m-d'));
                        $diff = $today->diff($bday);
                        
                        // print_r($diff->y);
                        // echo ' ';
                        if(!(in_array($diff->y, $mAge))){
                            array_push($mAge, $diff->y);
                            array_push($mCount, '1');
                        }else{
                            $index = array_search($diff->y, $mAge);
                            $mCount[$index] += 1;
                        }
                    }
                }

                // Men
                CheckAgeM('M', $connect);
                $minNumber = min($mCount);
                $maxNumber = max($mCount) + 2;
            ?>

            <script>
                const ctx = document.getElementById('myChart');

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: <?php echo json_encode($mAge); ?>,
                        datasets: [
                            {
                                label: 'Male',
                                data: <?php echo json_encode($mCount); ?>,
                                fill: false,
                                borderColor: 'rgb(75, 192, 192)',
                                tension: 0.1
                            }
                        ]
                    },
                    options: {
                        animations: {
                            tension: {
                                duration: 1000,
                                easing: 'linear',
                                from: 1,
                                to: 0,
                                loop: true
                            }
                        },
                        scales: {
                            y: { // defining min and max so hiding the dataset does not change scale range
                                min: <?php echo $minNumber; ?>,
                                max: <?php echo $maxNumber; ?>
                            }
                        }
                    }
                });
            </script>
        </div>
    </div>

    <!-- Female -->
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <div class="row">
                <div class="p-2">
                    <h3>Female Members Age Chart</h3>
                </div>
                <div class="col-12">
                    <div class="col-12">pupulation</div>
                    <canvas id="myChartFemale"></canvas>
                    <div class="col-12 text-right">age</div>
                </div>
            </div>

            <?php
                $fAge = array();
                $fCount = array();
            
                function CheckAgeF($sex, $connect){
                    global $fAge;
                    global $fCount;

                    $tblquery = "SELECT dob FROM members WHERE sex = :sex ORDER BY dob DESC";
                    $tblvalue = array(
                        ':sex' => $sex
                    );
                    $select = $connect->tbl_select($tblquery, $tblvalue);
                    
                    foreach($select as $data) {
                        extract($data);
                        $bday = new DateTime($dob); // Your date of birth
                        $today = new Datetime(date('Y-m-d'));
                        $diff = $today->diff($bday);
                        
                        
                        if(!(in_array($diff->y, $fAge))){
                            array_push($fAge, $diff->y);
                            array_push($fCount, '1');
                        }else{
                            $index = array_search($diff->y, $fAge);
                            $fCount[$index] += 1;
                        }
                    }
                }

                // Women
                CheckAgeF('F', $connect);
                $minNumbers = min($fCount);
                $maxNumbers = max($fCount) + 2;
            ?>

            <script>
                const myChartFemale = document.getElementById('myChartFemale');

                new Chart(myChartFemale, {
                    type: 'line',
                    data: {
                        labels: <?php echo json_encode($fAge); ?>,
                        datasets: [
                            {
                                label: 'Male',
                                data: <?php echo json_encode($fCount); ?>,
                                fill: false,
                                borderColor: 'rgb(75, 192, 192)',
                                tension: 0.1
                            }
                        ]
                    },
                    options: {
                        animations: {
                            tension: {
                                duration: 1000,
                                easing: 'linear',
                                from: 1,
                                to: 0,
                                loop: true
                            }
                        },
                        scales: {
                            y: { // defining min and max so hiding the dataset does not change scale range
                                min: <?php echo $minNumbers; ?>,
                                max: <?php echo $maxNumbers; ?>
                            }
                        }
                    }
                });
            </script>
        </div>
    </div>

    <!-- Members -->
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="accordion-body">
        <div class="row">
                <div class="p-2">
                    <h3>Female Members Age Chart</h3>
                </div>
                <div class="col-12">
                    <div class="col-12">pupulation</div>
                    <canvas id="both"></canvas>
                    <div class="col-12 text-right">age</div>
                </div>
            </div>

            <?php
                $bfCount = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                $bmCount = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            
                function CheckAgeBothF($sex, $connect){
                    global $bfCount;

                    $tblquery = "SELECT dob FROM members WHERE sex = :sex ORDER BY dob DESC";
                    $tblvalue = array(
                        ':sex' => $sex
                    );
                    $select = $connect->tbl_select($tblquery, $tblvalue);
                    
                    foreach($select as $data) {
                        extract($data);
                        $bday = new DateTime($dob); // Your date of birth
                        $today = new Datetime(date('Y-m-d'));
                        $diff = $today->diff($bday);
                        
                        if($diff->y <= 10){
                            $bfCount[0] += 1;
                        }else if($diff->y <= 20){
                            $bfCount[1] += 1;
                        }else if($diff->y <= 30){
                            $bfCount[2] += 1;
                        }else if($diff->y <= 40){
                            $bfCount[3] += 1;
                        }else if($diff->y <= 50){
                            $bfCount[4] += 1;
                        }else if($diff->y <= 60){
                            $bfCount[5] += 1;
                        }else if($diff->y <= 70){
                            $bfCount[6] += 1;
                        }else if($diff->y <= 80){
                            $bfCount[7] += 1;
                        }else if($diff->y <= 90){
                            $bfCount[8] += 1;
                        }else if($diff->y > 90){
                            $bfCount[9] += 1;
                        }
                        
                    }
                }

                function CheckAgeBothM($sex, $connect){
                    global $bmCount;

                    $tblquery = "SELECT dob FROM members WHERE sex = :sex ORDER BY dob DESC";
                    $tblvalue = array(
                        ':sex' => $sex
                    );
                    $select = $connect->tbl_select($tblquery, $tblvalue);
                    
                    foreach($select as $data) {
                        extract($data);
                        $bday = new DateTime($dob); // Your date of birth
                        $today = new Datetime(date('Y-m-d'));
                        $diff = $today->diff($bday);
                        
                        if($diff->y <= 10){
                            $bmCount[0] += 1;
                        }else if($diff->y <= 20){
                            $bmCount[1] += 1;
                        }else if($diff->y <= 30){
                            $bmCount[2] += 1;
                        }else if($diff->y <= 40){
                            $bmCount[3] += 1;
                        }else if($diff->y <= 50){
                            $bmCount[4] += 1;
                        }else if($diff->y <= 60){
                            $bmCount[5] += 1;
                        }else if($diff->y <= 70){
                            $bmCount[6] += 1;
                        }else if($diff->y <= 80){
                            $bmCount[7] += 1;
                        }else if($diff->y <= 90){
                            $bmCount[8] += 1;
                        }else if($diff->y > 90){
                            $bmCount[9] += 1;
                        }
                        
                    }
                }

                // Women
                CheckAgeBothF('F', $connect);
                CheckAgeBothM('M', $connect);

                $bMinF = min($bfCount);
                $bMaxF = max($bfCount) + 2;

                $bMinM = min($bmCount);
                $bMaxM = max($bmCount) + 2;

                $mainMax = max($bMaxF, $bMaxM);
                $mainMin = max($bMinF, $bMinM);
            ?>

            <script>
                const both = document.getElementById('both');

                new Chart(both, {
                    type: 'line',
                    data: {
                        labels: ['1 - 10', '11 - 20', '21 - 30', '31 - 40', '41 - 50', '51 - 60', '61 - 70', '71 - 80', '81 - 90', '91 - 100'],
                        datasets: [
                            {
                                label: 'Female',
                                data: <?php echo json_encode($bfCount); ?>,
                                fill: false,
                                borderColor: 'blue',
                                tension: 0.1
                            },
                            {
                                label: 'Male',
                                data: <?php echo json_encode($bmCount); ?>,
                                fill: false,
                                borderColor: 'red',
                                tension: 0.1
                            }
                        ]
                    },
                    options: {
                        animations: {
                            tension: {
                                duration: 1000,
                                easing: 'linear',
                                from: 1,
                                to: 0,
                                loop: true
                            }
                        },
                        scales: {
                            y: { // defining min and max so hiding the dataset does not change scale range
                                min: <?php echo $mainMin; ?>,
                                max: <?php echo $mainMax; ?>
                            }
                        }
                    }
                });
            </script>
        </div>
    </div>
</div>


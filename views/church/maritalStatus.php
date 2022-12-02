<div class="container-fluid pt-5">
    <div class="p-2">
        <h3>Members Marital Status</h3>
    </div>
    <div class="row">
        <div class="col-md-10" style="height: 500px; margin: 10px auto; width:400px;">
            <canvas id="maritalStatus"></canvas>
        </div>
    </div>

    <?php 
        $men = array();
        $women = array();

        
        function Check($ms, $sex, $connect){
            $tblquery = "SELECT COUNT(id) AS total FROM members WHERE marital_status = :ms AND sex = :sex AND church_id = :c";
            $tblvalue = array(
                ':ms' => $ms,
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
        $dMen = Check('Divorced', 'M', $connect);
        array_push($men, $dMen);

        $mMen = Check('Married', 'M', $connect);
        array_push($men, $mMen);

        $sMen = Check('Single', 'M', $connect);
        array_push($men, $sMen);

        $wMen = Check('Widowed', 'M', $connect);
        array_push($men, $wMen);

        // Women
        $dWomen = Check('Divorced', 'F', $connect);
        array_push($women, $dWomen);

        $mWomen = Check('Married', 'F', $connect);
        array_push($women, $mWomen);

        $sWomen = Check('Single', 'F', $connect);
        array_push($women, $sWomen);

        $wWomen = Check('Widowed', 'F', $connect);
        array_push($women, $wWomen);
    
    ?>

    <script>
        const maritalStatus = document.getElementById('maritalStatus');

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

        new Chart(maritalStatus, {
            type: 'radar',
            data: {
                labels: ['Divorced', 'Married', 'Single', 'Widowed'],
                datasets: [{
                    label: 'Male',
                    data: <?php echo json_encode($men); ?>,
                    fill: true,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgb(255, 99, 132)',
                    pointBackgroundColor: 'rgb(255, 99, 132)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(255, 99, 132)'
                }, {
                    label: 'Female',
                    data: <?php echo json_encode($women); ?>,
                    fill: true,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgb(54, 162, 235)',
                    pointBackgroundColor: 'rgb(54, 162, 235)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(54, 162, 235)'
                }]
            },
            options: {
                elements: {
                    line: {
                        borderWidth: 3
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
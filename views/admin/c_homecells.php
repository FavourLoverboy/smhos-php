<div class="accordion" id="accordionExample">
    <div class="row mb-2">
        <div class="col-md-3 p-3 mr-2 accordion-item">
            <h3 class="accordion-header mb-0" id="headingOne">
                <button class="accordion-button btn-info border-0 btn btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    More
                </button>
            </h3>
        </div>
        <div class="col-md-3 p-3 accordion-item">
            <h3 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed border-0 btn-warning btn btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Less
                </button>
            </h3>
        </div>
    </div>

    <!-- More -->
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <div class="row">
                <div class="p-2">
                    <h3>Most Homecells</h3>
                </div>
                <div class="col-12">
                    <canvas id="myChart"></canvas>
                </div>
            </div>

            <?php
                $churches = array();
                $homecells = array();
            
                $tblquery = "SELECT COUNT(homecells.id) AS homes, churches.name FROM homecells INNER JOIN churches ON homecells.church_id = churches.id GROUP BY homecells.church_id ORDER BY homes DESC, name LIMIT 5";
                $tblvalue = array();
                $select = $connect->tbl_select($tblquery, $tblvalue);
                // echo 'male <br>';
                foreach($select as $data) {
                    extract($data);
                    
                    array_push($churches, $name);
                    array_push($homecells, $homes);
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
                        labels: <?php echo json_encode($churches); ?>,
                        datasets: [{
                            label: 'Most Homecells',
                            data: <?php echo json_encode($homecells); ?>,
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
    </div>

    <!-- Less -->
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <div class="row">
                <div class="p-2">
                    <h3>Less Homecells</h3>
                </div>
                <div class="col-12">
                    <canvas id="less"></canvas>
                </div>
            </div>

            <?php
                $less_churches = array();
                $less_homecells = array();
            
                $tblquery = "SELECT COUNT(homecells.id) AS homes, churches.name FROM homecells INNER JOIN churches ON homecells.church_id = churches.id GROUP BY homecells.church_id ORDER BY homes, name LIMIT 5";
                $tblvalue = array();
                $select = $connect->tbl_select($tblquery, $tblvalue);
                
                foreach($select as $data) {
                    extract($data);
                    
                    array_push($less_churches, $name);
                    array_push($less_homecells, $homes);
                }
            ?>

            <script>
                const ctxs = document.getElementById('less');

                new Chart(ctxs, {
                    type: 'bar',
                    data: {
                        labels: <?php echo json_encode($less_churches); ?>,
                        datasets: [{
                            label: 'Less Homecells',
                            data: <?php echo json_encode($less_homecells); ?>,
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
        </div>
    </div>
</div>


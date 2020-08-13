<div class="page-inner">

<div class="page-title">
    <div class="container">
        <div class="col-md-3">
            <h3>Chart Calon</h3>
        </div>
    </div>
</div>

<div id="main-wrapper" class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-body">
                <div class="col-md-6 order-md-1">

                    <div class="panel-heading">
                        <h3 class="panel-title"></h3>
                    </div>
                    <div class="panel-body">
                        <div id="morris4"></div>
                    </div>
                
                </div>

                <div class="col-md-6 order-md-1">

                    <div class="panel-heading">
                        <h3 class="panel-title"></h3>
                    </div>
                    <div class="panel-body">
                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Parti</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>GERINDRA</td>
                                                <td>30</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>PDIP</td>
                                                <td>8</td>
                                            </tr>
                                        </tbody>
                                    </table>
                    </div>
                
                </div>


            </div>
        </div>
    </div>
</div>

<script>

$( document ).ready(function() {
    Morris.Donut({
        element: 'morris4',
        data: [
            {label: 'PBB', value: 35 },
            {label: 'PKS', value: 45 },
            {label: 'GERINDRA', value: 30 },
            {label: 'PDIP', value: 20 }
        ],
        resize: true,
        colors: ['#74e4d1', '#44cbb4', '#119d85','#22BAA0'],
    });
});
</script>


</div>
</div>
</div>


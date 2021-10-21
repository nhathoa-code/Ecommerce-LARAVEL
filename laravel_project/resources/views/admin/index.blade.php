<x-adminLayout>
    @php
    $brand_ids = $Brand::select("id")->where("field_id", 20)->get()->pluck("id");
    $brand_names = $Brand::select("name")->where("field_id", 20)->get()->pluck("name");
    $product_quantity = $Product::select($DB::raw('count(*)'))->whereIn("brand_id", $brand_ids)->groupBy("brand_id")->get()->pluck("count(*)");
    @endphp
    <div>
        <canvas id="myChart"></canvas>
    </div>

</x-adminLayout>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const cfg = {
        type: 'bar',
        data: {
            labels: <?php echo $brand_names ?>,
            datasets: [{
                label: 'Smartphone quantity by brand',
                data: <?php echo $product_quantity ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    min: 0,
                    max: 5,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    };

    var myChart = new Chart(
        document.getElementById('myChart'),
        cfg
    );
</script>
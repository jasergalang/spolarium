@extends('layout.layout')
@section('content')
@include('layout.adminNav')

<!-- Bar Graph for Customers -->
<canvas id="customerBarChart" width="400" height="200"></canvas>

<!-- Bar Graph for Artists -->
<canvas id="artistBarChart" width="400" height="200"></canvas>

<!-- Pie Chart for Customer vs Artist Comparison -->
<canvas id="customerArtistPieChart" width="1000" height="800"></canvas>

<script>
    // Fetch data from the server
    var customerData = {!! json_encode($customerData) !!};
    var artistData = {!! json_encode($artistData) !!};

    // Calculate total customers and artists
    var totalCustomers = customerData.data.reduce((acc, curr) => acc + curr, 0);
    var totalArtists = artistData.data.reduce((acc, curr) => acc + curr, 0);

    // Initialize Bar Graph for Customers
    var customerBarCtx = document.getElementById('customerBarChart').getContext('2d');
    var customerBarChart = new Chart(customerBarCtx, {
        type: 'bar',
        data: {
            labels: customerData.labels,
            datasets: [{
                label: 'Number of Customers',
                backgroundColor: 'blue',
                data: customerData.data
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    // Initialize Bar Graph for Artists
    var artistBarCtx = document.getElementById('artistBarChart').getContext('2d');
    var artistBarChart = new Chart(artistBarCtx, {
        type: 'bar',
        data: {
            labels: artistData.labels,
            datasets: [{
                label: 'Number of Artists',
                backgroundColor: 'green',
                data: artistData.data
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    // Initialize Pie Chart for Customer vs Artist Comparison
    var customerArtistPieCtx = document.getElementById('customerArtistPieChart').getContext('2d');
    var customerArtistPieChart = new Chart(customerArtistPieCtx, {
        type: 'pie',
        data: {
            labels: ['Customers', 'Artists'],
            datasets: [{
                data: [totalCustomers, totalArtists],
                backgroundColor: ['blue', 'green']
            }]
        },
        options: {
            responsive: false, // Disable responsiveness
            maintainAspectRatio: false, // Disable aspect ratio
            legend: {
                display: false // Hide legend
            }
        }
    });
</script>
@endsection

@extends('layouts.app')

@section('title', 'Admin: Accomodation')

@section('content2')

<style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .chart-container {
            display: flex;
            justify-content: center;
            gap: 50px;
            margin-top: 20px;
            flex-wrap: wrap;
            align-items: stretch;
        }
        .chart-box {
            width: 45%;
            height: 250px;
            flex-direction: column;
            justify-content: center;
        }
        .cityChart{
            height: 100%;
        }
</style>

<div class="chart-container">
    <div class="chart-box">
        <h2>Accommodation Rankings</h2>
        <canvas id="rankingChart"></canvas>
    </div>
    <div class="chart-box">
        <h2>Monthly Reservations</h2>
        <canvas id="monthlyChart"></canvas>
    </div>
    <div class="chart-box">
        <h2>User Rankings</h2>
        <canvas id="userChart"></canvas>
    </div>
    <div class="chart-box">
        <h2>City Share</h2>
        <canvas id="cityChart"></canvas>
    </div>
</div>

    <script>
        async function fetchData(url) {
            const response = await fetch(url);
            return await response.json();
        }

        async function renderCharts() {
        
            const rankingData = await fetchData('/rankings');
            console.log(rankingData);
            const rankingLabels = rankingData.map(item => item.name);
            const rankingValues = rankingData.map(item => item.reservation_count);

            const monthlyData = await fetchData('/monthly/bookings');
            console.log(monthlyData);
            const monthlyLabels = monthlyData.map(item => item.month);
            const monthlyValues = monthlyData.map(item => item.reservation_count);

            const userData = await fetchData('/user/rankings');
            console.log(userData);
            const userLabels = userData.map(item => item.name);
            const userValues = userData.map(item => item.reservation_count);

            const cityData = await fetchData('/city/share');
            console.log(cityData);
            const cityLabels = cityData.map(item => item.city);
            const cityValues = cityData.map(item => item.reservation_count);

            console.log(rankingLabels, rankingValues);
            const ctxRanking = document.getElementById('rankingChart').getContext('2d');

            new Chart(ctxRanking, {
                type: 'bar',
                data: {
                    labels: rankingLabels,
                    datasets: [{
                        label: 'Accommodation Reservation Count',
                        data: rankingValues,
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: { responsive: true, scales: { y: { beginAtZero: true } }, ticks: { precision: 0 }   }
            });

            const ctxMonthly = document.getElementById('monthlyChart').getContext('2d');
            new Chart(ctxMonthly, {
                type: 'line',
                data: {
                    labels: monthlyLabels,
                    datasets: [{
                        label: 'Monthly Reservation Count',
                        data: monthlyValues,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2
                    }]
                },
                options: { responsive: true, scales: { y: { beginAtZero: true }}, ticks: { precision: 0 } }
            });

            const ctxUserRanking = document.getElementById('userChart').getContext('2d');
            new Chart(ctxUserRanking, {
            type: 'bar',
            data: {
                labels: userLabels,
                datasets: [{
                    label: 'User Reservation Count',
                    data: userValues,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: { responsive: true, scales: { y: { beginAtZero: true } }, ticks: { precision: 0 } }
            });

            const ctxCity = document.getElementById('cityChart').getContext('2d');
            new Chart(ctxCity, {
                type: 'pie',
                data: {
                    labels: cityLabels,
                    datasets: [{
                        label: 'City Share',
                        data: cityValues,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: { responsive: true, maintainAspectRatio: false }
            });

        }
        renderCharts();

    </script>

@endsection
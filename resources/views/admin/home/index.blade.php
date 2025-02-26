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
        }
        .chart-box {
            width: 45%;
        }
</style>

<div class="chart-container">
    <div class="chart-box bg-primary">
        <h2>Accommodation Ranking</h2>
        <canvas id="rankingChart"></canvas>
    </div>
    <div class="chart-box bg-primary">
        <h2>Daily Guest Trends</h2>
        <canvas id="monthlyChart"></canvas>
    </div>
</div>

    <script>
        async function fetchData(url) {
            const response = await fetch(url);
            return await response.json();
        }

        async function renderCharts() {
            // 宿泊ランキングデータを取得
            const rankingData = await fetchData('/api/ranking');
            const rankingLabels = rankingData.map(item => item.accommodation_name);
            const rankingValues = rankingData.map(item => item.reservation_count);

            // 月別予約数データを取得
            const monthlyData = await fetchData('/api/monthly-bookings');
            const monthlyLabels = monthlyData.map(item => item.month);
            const monthlyValues = monthlyData.map(item => item.reservation_count);

            // グラフの描画
            const ctxRanking = document.getElementById('rankingChart').getContext('2d');
            new Chart(ctxRanking, {
                type: 'bar',
                data: {
                    labels: rankingLabels,
                    datasets: [{
                        label: '予約数',
                        data: rankingValues,
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: { responsive: true, scales: { y: { beginAtZero: true } } }
            });

            const ctxMonthly = document.getElementById('monthlyChart').getContext('2d');
            new Chart(ctxMonthly, {
                type: 'line',
                data: {
                    labels: monthlyLabels,
                    datasets: [{
                        label: '月別予約数',
                        data: monthlyValues,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2
                    }]
                },
                options: { responsive: true, scales: { y: { beginAtZero: true } } }
            });
        }

        renderCharts();
    </script>







@endsection
@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <canvas id="myChart"></canvas>
        </div>
        <div class="col">
            <canvas id="bestCustomers"></canvas>
        </div>
    </div>
    <br>
    <div class="row text-center">
        <div class="col">
            <canvas id="pie"></canvas>
            <label for="pie" id="lejbl"></label>
        </div>
        <div class="col">
            <canvas id="dateOrders"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var basket = {!! json_encode($basket) !!};
        var football = {!! json_encode($tenis) !!};
        var tenis = {!! json_encode($football) !!};
        var bowling = {!! json_encode($bowling) !!};
        var arch = {!! json_encode($arch) !!};
        var pool = {!! json_encode($pool) !!};

        var firstSum = {!! json_encode($firstSum) !!};
        var secondSum = {!! json_encode($secondSum) !!};
        var thirdSum = {!! json_encode($thirdSum) !!};
        var firstCus = {!! json_encode($firstCus) !!};
        var secondCus = {!! json_encode($secondCus) !!};
        var thirdCus = {!! json_encode($thirdCus) !!};

        var jan = {!! json_encode($januar) !!};
        var feb = {!! json_decode($februar) !!};
        var mar = {!! json_decode($marec) !!};
        var apr = {!! json_decode($april) !!};
        var may = {!! json_decode($may) !!};
        var jun = {!! json_decode($jun) !!};
        var jul = {!! json_decode($jul) !!};
        var aug = {!! json_decode($august) !!};
        var sep = {!! json_decode($september) !!};
        var oct = {!! json_decode($oktober) !!};
        var nov = {!! json_decode($november) !!};
        var dec = {!! json_decode($december) !!};

        var mails = @json($emaily);


        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Basketball', 'Football', 'Tenis', 'Bowling', 'Archery', 'Pool'],
                datasets: [{
                    label: 'Number of ordered sportsgrounds',
                    data: [basket, football, tenis, bowling, arch, pool],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
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

        var ctx2 = document.getElementById('bestCustomers').getContext('2d');
        var chart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: [firstCus, secondCus, thirdCus],
                datasets: [{
                    label: 'Customers, who paid the most for rentals',
                    data: [firstSum, secondSum, thirdSum],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                    ],
                    borderWidth: 1
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

        var ctx3 = document.getElementById('dateOrders').getContext('2d');
        var chartz = new Chart(ctx3, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May',
                    'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: 'Productivity of our company by months',
                    data: [jan, feb, mar, apr, may, jun, jul, aug, sep, oct, nov, dec],
                    fill: false,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    tension: 0.1
                }]
            }
        });
        // [mails[0]['client'], mails[1]['client'], mails[2]['client']
        // document.write(JSON.stringify(mails[0]['num']));
        let firsts = (JSON.stringify(mails[0]['client'])).replaceAll('"', "");
        let seconds = (JSON.stringify(mails[1]['client'])).replaceAll('"', "");
        let thirds = (JSON.stringify(mails[2]['client'])).replaceAll('"', "");
        let first = firsts.charAt(0).toUpperCase() + firsts.slice(1);
        let second = seconds.charAt(0).toUpperCase() + seconds.slice(1);
        let third = thirds.charAt(0).toUpperCase() + thirds.slice(1);

        let firstNum = (JSON.stringify([mails[0]['num']])).replaceAll('[', "").replaceAll("]", "");
        let secondNum = (JSON.stringify([mails[1]['num']])).replaceAll('[', "").replaceAll("]", "");
        let thirdNum = (JSON.stringify([mails[2]['num']])).replaceAll('[', "").replaceAll("]", "");

        let num = parseInt(firstNum);
        let num2 = parseInt(secondNum);
        let num3 = parseInt(thirdNum);
        let total = (num+num2+num3).toString();


        let colorHex = ['#FB3640', '#EFCA88', '#43AABB']
        let x = document.getElementById('lejbl').innerHTML =  'Total: ' + total;
        var ctx4 = document.getElementById('pie').getContext('2d');
        var chartzz = new Chart(ctx4, {
            type: 'pie',
            data: {
                labels: [first + ' users', second + ' users', third + ' users'],
                datasets: [{
                    label: 'Count of registered users with distinct email clients',
                    data: [num, num2, num3],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                legend:{
                    position: 'bottom',
                },
                aspectRatio: 2
            }
        });
    </script>
@endsection

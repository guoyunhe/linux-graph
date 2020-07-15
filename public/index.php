<!doctype html>
<html>
    <head>
        <title>Linux Graph</title>
    </head>

    <body>
        <canvas id="bar" width="400" height="200"></canvas>
        <script src="./Chart.bundle.min.js"></script>
        <script>
            const data = <?php include(__DIR__ . '/data.json'); ?>;
            const color = Chart.helpers.color;
            const chartColors = {
                red: 'rgb(255, 99, 132)',
                orange: 'rgb(255, 159, 64)',
                yellow: 'rgb(255, 205, 86)',
                green: 'rgb(75, 192, 192)',
                blue: 'rgb(54, 162, 235)',
                purple: 'rgb(153, 102, 255)',
                grey: 'rgb(201, 203, 207)'
            };
            new Chart(document.getElementById('bar'), {
                type: 'horizontalBar',
                data: {
                    labels: Object.keys(data.matrix),
                    datasets: [{
                        label: '# of matrix group members [global]',
                        backgroundColor: color(chartColors.grey).alpha(0.5).rgbString(),
                        borderColor: chartColors.grey,
                        borderWidth: 1,
                        data: Object.values(data.matrix).map(d => d.global.members)
                    },
                    {
                        label: '# of telegram group members [global]',
                        backgroundColor: color(chartColors.blue).alpha(0.5).rgbString(),
                        borderColor: chartColors.blue,
                        borderWidth: 1,
                        data: Object.values(data.telegram).map(d => d.global.members)
                    }]
                }
            });
        </script>
    </body>
</html>
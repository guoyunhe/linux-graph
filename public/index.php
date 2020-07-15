<!doctype html>
<html>
    <head>
        <title>Linux Graph</title>
    </head>

    <body>
        <canvas id="matrix-global-bar" width="400" height="100"></canvas>
        <canvas id="telegram-global-bar" width="400" height="100"></canvas>
        <canvas id="reddit-global-bar" width="400" height="100"></canvas>
        <script src="./Chart.bundle.min.js"></script>
        <script>
            const data = <?php include(__DIR__ . '/data.json'); ?>;
            const color = Chart.helpers.color;
            const chartColors = {
                matrix: '#0cc404',
                reddit: '#ff4500',
                telegram: '#0088cc'
            };

            ['matrix', 'reddit', 'telegram'].map(c => 
                new Chart(document.getElementById(c + '-global-bar'), {
                    type: 'horizontalBar',
                    data: {
                        labels: Object.keys(data[c]),
                        datasets: [
                            {
                                label: '# of ' + c + ' group members [global]',
                                backgroundColor: color(chartColors[c]).alpha(0.5).rgbString(),
                                borderColor: chartColors[c],
                                borderWidth: 1,
                                data: Object.values(data[c]).map(d => d.global.members)
                            },
                        ]
                    }
                })
            );
        </script>
    </body>
</html>
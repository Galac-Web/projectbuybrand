document.addEventListener('DOMContentLoaded', () => {
    // Let's make a chart object
    var chart = {};

    chart.width = 38;
    chart.height = 12;

    // ... and some data that we'll use in a bit
        chart.data = [1, 8, 4, 5, 3, 7, 2, 3, 5, 2];

    // ... and some chart methods that we'll call a bit later...

    // init will initialize the line graph with our
    // untouched dataset (chart.data)
    chart.init = function () {

        // Create the initial SVG container for the chart
        chart.svg = d3.select('.sm-chart')
            .append('svg')
            .attr('width', chart.width)
            .attr('height', chart.height)
            .attr('id', 'chartSVG');

        // Define the X and Y scales
        chart.x = d3.scale.linear()
            .domain([0, chart.data.length])
            .range([0, chart.width]);

        chart.y = d3.scale.linear()
            .domain([d3.max(chart.data), d3.min(chart.data)])
            .range([0, chart.height]);


        // Define the line generator
        chart.lineGen = d3.svg.line()
            .x(function (d, i) {
                return chart.x(i);
            })
            .y(function (d) {
                return chart.y(d);
            });

        // Generate a line graph in the SVG container,
        // using the initial data
        chart.line = chart.svg
            .append('svg:path')
            .attr('d', chart.lineGen(chart.data));
    };


    // redraw will provide us with a means to update
    // the chart after we modify the chart's data,
    // without removing the entire svg element
    chart.redraw = function () {

        // update the x and y scales with the new data
        chart.x = d3.scale.linear()
            .domain([0, chart.data.length])
            .range([0, chart.width]);

        chart.y = d3.scale.linear()
            .domain([d3.max(chart.data), d3.min(chart.data)])
            .range([0, chart.height]);

        // rather than add a new line, we can just use transitions
        // and update the 'd' attribute of the SVG path used to
        // originally generate the line
        chart.line
            .transition()
            .duration(100)
            .attr('d', chart.lineGen(chart.data));

    };

    // First, we call the initialize function
    chart.init();

    // And then we'll add new random data every second
    // for 10 seconds.  We update the chart with
    // each modification to the data via the chart.redraw
    // method.
    var loop = setInterval(function () {
        chart.data.push(Math.round(Math.random() * 10));
        chart.redraw();
    }, 1000);

    setTimeout(function () {
        clearTimeout(loop);
    }, 10000);


    /* Highcharts */

    if (document.querySelector('.highcharts-figure') != undefined) {
        Highcharts.chart('graph-place', {
            legend: {
                itemStyle: {
                    color: '#fff',
                    fontWeight: 'normal'
                },
                itemHoverStyle: {
                    color: 'rgba(255,255,255,0.69)',
                }
            },
            chart: {
                type: 'area',
                borderWidth: 0,
                backgroundColor: 'transparent',
            },
            accessibility: {
                description: ''
            },
            title: {
                text: ''
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                allowDecimals: false,
                labels: {
                    style: {
                        color: '#fff'
                    },
                    formatter: function () {
                        return this.value; // clean, unformatted number for year
                    }
                },
                accessibility: {
                    rangeDescription: ''
                }
            },
            yAxis: {
                title: {
                    text: false
                },
                labels: {
                    style: {
                        color: '#fff'
                    },
                    formatter: function () {
                        return this.value;
                    }
                }
            },
            tooltip: {
                pointFormat: '<b>{point.y:,.0f}</b> точек'
            },
            plotOptions: {
                area: {
                    pointStart: 1940,
                    marker: {
                        enabled: false,
                        symbol: 'circle',
                        radius: 2,
                        states: {
                            hover: {
                                enabled: true
                            }
                        }
                    }
                }
            },
            series: [
                {
                    name: 'Точек всего',
                    data: [
                        null, null, null, null, null, 6, 11, 32, 110, 235,
                        369, 640, 1005, 1436, 2063, 3057, 4618, 6444, 9822, 15468,
                        20434, 24126, 27387, 29459, 31056, 31982, 32040, 31233, 29224, 27342,
                        26662, 26956, 27912, 28999, 28965, 27826, 25579, 25722, 24826, 24605,
                        24304, 23464, 23708, 24099, 24357, 24237, 24401, 24344, 23586, 22380,
                        21004, 17287, 14747, 13076, 12555, 12144, 11009, 10950, 10871, 10824,
                        10577, 10527, 10475, 10421, 10358, 10295, 10104, 9914, 9620, 9326,
                        5113, 5113, 4954, 4804, 4761, 4717, 4368, 4018
                    ]
                }, {
                    name: 'Франчайзинговых точек',
                    data: [null, null, null, null, null, null, null, null, null, null,
                        5, 25, 50, 120, 150, 200, 426, 660, 869, 1060,
                        1605, 2471, 3322, 4238, 5221, 6129, 7089, 8339, 9399, 10538,
                        11643, 13092, 14478, 15915, 17385, 19055, 21205, 23044, 25393, 27935,
                        30062, 32049, 33952, 35804, 37431, 39197, 45000, 43000, 41000, 39000,
                        37000, 35000, 33000, 31000, 29000, 27000, 25000, 24000, 23000, 22000,
                        21000, 20000, 19000, 18000, 18000, 17000, 16000, 15537, 14162, 12787,
                        12600, 11400, 5500, 4512, 4502, 4502, 4500, 4500
                    ]
                },
                {
                    name: 'Собственных точек',
                    data: [null, null, null, null, null, null, null, null, null, null,
                        10, 30, 60, 190, 150, 200, 426, 660, 869, 1060,
                        1605, 2471, 3322, 4238, 5221, 6129, 7089, 8339, 9399, 10538,
                        11643, 18000, 17000, 16000, 15537, 14162, 12787,
                        12600, 11400, 5500, 4512, 4502, 4502, 4500, 30
                    ]
                }
            ]
        });
        Highcharts.chart('graph-franchise', {
            legend: {
                itemStyle: {
                    color: '#fff',
                    fontWeight: 'normal'
                },
                itemHoverStyle: {
                    color: 'rgba(255,255,255,0.69)',
                }
            },
            chart: {
                type: 'area',
                borderWidth: 0,
                backgroundColor: 'transparent',
            },
            accessibility: {
                description: ''
            },
            title: {
                text: ''
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                allowDecimals: false,
                labels: {
                    style: {
                        color: '#fff'
                    },
                    formatter: function () {
                        return this.value; // clean, unformatted number for year
                    }
                },
                accessibility: {
                    rangeDescription: ''
                }
            },
            yAxis: {
                title: {
                    text: false
                },
                labels: {
                    style: {
                        color: '#fff'
                    },
                    formatter: function () {
                        return this.value;
                    }
                }
            },
            tooltip: {
                pointFormat: '<b>{point.y:,.0f}</b> точек'
            },
            plotOptions: {
                area: {
                    pointStart: 1940,
                    marker: {
                        enabled: false,
                        symbol: 'circle',
                        radius: 2,
                        states: {
                            hover: {
                                enabled: true
                            }
                        }
                    }
                }
            },
            series: [
                {
                    name: 'Точек всего',
                    data: [
                        null, null, null, null, null, 6, 11, 32, 110, 235,
                        369, 640, 1005, 1436, 2063, 3057, 4618, 6444, 9822, 15468,
                        20434, 24126, 27387, 29459, 31056, 31982, 32040, 31233, 29224, 27342,
                        26662, 26956, 27912, 28999, 28965, 27826, 25579, 25722, 24826, 24605,
                        24304, 23464, 23708, 24099, 24357, 24237, 24401, 24344, 23586, 22380,
                        21004, 17287, 14747, 13076, 12555, 12144, 11009, 10950, 10871, 10824,
                        10577, 10527, 10475, 10421, 10358, 10295, 10104, 9914, 9620, 9326,
                        5113, 5113, 4954, 4804, 4761, 4717, 4368, 4018
                    ]
                }, {
                    name: 'Франчайзинговых точек',
                    data: [null, null, null, null, null, null, null, null, null, null,
                        5, 25, 50, 120, 150, 200, 426, 660, 869, 1060,
                        1605, 2471, 3322, 4238, 5221, 6129, 7089, 8339, 9399, 10538,
                        11643, 13092, 14478, 15915, 17385, 19055, 21205, 23044, 25393, 27935,
                        30062, 32049, 33952, 35804, 37431, 39197, 45000, 43000, 41000, 39000,
                        37000, 35000, 33000, 31000, 29000, 27000, 25000, 24000, 23000, 22000,
                        21000, 20000, 19000, 18000, 18000, 17000, 16000, 15537, 14162, 12787,
                        12600, 11400, 5500, 4512, 4502, 4502, 4500, 4500
                    ]
                },
                {
                    name: 'Собственных точек',
                    data: [null, null, null, null, null, null, null, null, null, null,
                        10, 30, 60, 190, 150, 200, 426, 660, 869, 1060,
                        1605, 2471, 3322, 4238, 5221, 6129, 7089, 8339, 9399, 10538,
                        11643, 18000, 17000, 16000, 15537, 14162, 12787,
                        12600, 11400, 5500, 4512, 4502, 4502, 4500, 30
                    ]
                }
            ]
        });
        Highcharts.chart('anticrise-place', {
            legend: {
                itemStyle: {
                    color: '#fff',
                    fontWeight: 'normal'
                },
                itemHoverStyle: {
                    color: 'rgba(255,255,255,0.69)',
                }
            },
            chart: {
                type: 'area',
                borderWidth: 0,
                backgroundColor: 'transparent',
            },
            accessibility: {
                description: ''
            },
            title: {
                text: ''
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                allowDecimals: false,
                labels: {
                    style: {
                        color: '#fff'
                    },
                    formatter: function () {
                        return this.value; // clean, unformatted number for year
                    }
                },
                accessibility: {
                    rangeDescription: ''
                }
            },
            yAxis: {
                title: {
                    text: false
                },
                labels: {
                    style: {
                        color: '#fff'
                    },
                    formatter: function () {
                        return this.value;
                    }
                }
            },
            tooltip: {
                pointFormat: '<b>{point.y:,.0f}</b> точек'
            },
            plotOptions: {
                area: {
                    pointStart: 1940,
                    marker: {
                        enabled: false,
                        symbol: 'circle',
                        radius: 2,
                        states: {
                            hover: {
                                enabled: true
                            }
                        }
                    }
                }
            },
            series: [
                {
                    name: 'Точек всего',
                    data: [
                        null, null, null, null, null, 6, 11, 32, 110, 235,
                        369, 640, 1005, 1436, 2063, 3057, 4618, 6444, 9822, 15468,
                        20434, 24126, 27387, 29459, 31056, 31982, 32040, 31233, 29224, 27342,
                        26662, 26956, 27912, 28999, 28965, 27826, 25579, 25722, 24826, 24605,
                        24304, 23464, 23708, 24099, 24357, 24237, 24401, 24344, 23586, 22380,
                        21004, 17287, 14747, 13076, 12555, 12144, 11009, 10950, 10871, 10824,
                        10577, 10527, 10475, 10421, 10358, 10295, 10104, 9914, 9620, 9326,
                        5113, 5113, 4954, 4804, 4761, 4717, 4368, 4018
                    ]
                }, {
                    name: 'Франчайзинговых точек',
                    data: [null, null, null, null, null, null, null, null, null, null,
                        5, 25, 50, 120, 150, 200, 426, 660, 869, 1060,
                        1605, 2471, 3322, 4238, 5221, 6129, 7089, 8339, 9399, 10538,
                        11643, 13092, 14478, 15915, 17385, 19055, 21205, 23044, 25393, 27935,
                        30062, 32049, 33952, 35804, 37431, 39197, 45000, 43000, 41000, 39000,
                        37000, 35000, 33000, 31000, 29000, 27000, 25000, 24000, 23000, 22000,
                        21000, 20000, 19000, 18000, 18000, 17000, 16000, 15537, 14162, 12787,
                        12600, 11400, 5500, 4512, 4502, 4502, 4500, 4500
                    ]
                },
                {
                    name: 'Собственных точек',
                    data: [null, null, null, null, null, null, null, null, null, null,
                        10, 30, 60, 190, 150, 200, 426, 660, 869, 1060,
                        1605, 2471, 3322, 4238, 5221, 6129, 7089, 8339, 9399, 10538,
                        11643, 18000, 17000, 16000, 15537, 14162, 12787,
                        12600, 11400, 5500, 4512, 4502, 4502, 4500, 30
                    ]
                }
            ]
        });
    }
})

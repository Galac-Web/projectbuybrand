// Let's make a chart object
var chart = {};

chart.width = 38;
chart.height = 12;

// ... and some data that we'll use in a bit
chart.data = [1,8,4,5,3,7,2,3,5,2];

// ... and some chart methods that we'll call a bit later...

// init will initialize the line graph with our
// untouched dataset (chart.data)
chart.init = function() {

    // Create the initial SVG container for the chart
    chart.svg = d3.select('.sm-chart')
        .append('svg')
        .attr('width', chart.width)
        .attr('height', chart.height)
        .attr('id', 'chartSVG');

    // Define the X and Y scales
    chart.x = d3.scale.linear()
        .domain([0, chart.data.length])
        .range([0,chart.width]);

    chart.y = d3.scale.linear()
        .domain([d3.max(chart.data), d3.min(chart.data)])
        .range([0,chart.height]);


    // Define the line generator
    chart.lineGen = d3.svg.line()
        .x(function(d, i) {
            return chart.x(i);
        })
        .y(function(d) {
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
chart.redraw = function() {

    // update the x and y scales with the new data
    chart.x = d3.scale.linear()
        .domain([0, chart.data.length])
        .range([0,chart.width]);

    chart.y = d3.scale.linear()
        .domain([d3.max(chart.data), d3.min(chart.data)])
        .range([0,chart.height]);

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
var loop = setInterval(function() {
    chart.data.push(Math.round(Math.random()*10));
    chart.redraw();
}, 1000);

setTimeout(function() {
    clearTimeout(loop);
}, 10000);
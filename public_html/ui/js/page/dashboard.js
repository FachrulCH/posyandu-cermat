$(document).ready(function () {
// call this from the developer console and you can control both instances
var calendars = {};

  // assuming you've got the appropriate language files,
  // clndr will respect whatever moment's language is set to.
  // moment.lang('ru');

  // here's some magic to make sure the dates are happening this month.
  var thisMonth = moment().format('YYYY-MM');

  var eventArray = [
    { startDate: thisMonth + '-10', endDate: thisMonth + '-14', title: 'Multi-Day Event' },
    { startDate: thisMonth + '-21', endDate: thisMonth + '-23', title: 'Another Multi-Day Event' }
  ];

  // the order of the click handlers is predictable.
  // direct click action callbacks come first: click, nextMonth, previousMonth, nextYear, previousYear, or today.
  // then onMonthChange (if the month changed).
  // finally onYearChange (if the year changed).

  calendars.clndr1 = $('.cal1').clndr({
    events: eventArray,
    // constraints: {
    //   startDate: '2013-11-01',
    //   endDate: '2013-11-15'
    // },
    clickEvents: {
      click: function(target) {
        console.log(target);
        if($(target.element).hasClass('inactive')) {
          console.log('not a valid datepicker date.');
        } else {
          console.log('VALID datepicker date.');
        }
      },
      nextMonth: function() {
        console.log('next month.');
      },
      previousMonth: function() {
        console.log('previous month.');
      },
      onMonthChange: function() {
        console.log('month changed.');
      },
      nextYear: function() {
        console.log('next year.');
      },
      previousYear: function() {
        console.log('previous year.');
      },
      onYearChange: function() {
        console.log('year changed.');
      }
    },
    multiDayEvents: {
      startDate: 'startDate',
      endDate: 'endDate'
    },
    showAdjacentMonths: true,
    adjacentDaysChangeMonth: false
  });

  // calendars.clndr2 = $('.cal2').clndr({
  //   template: $('#template-calendar').html(),
  //   events: eventArray,
  //   startWithMonth: moment().add('month', 1),
  //   clickEvents: {
  //     click: function(target) {
  //       console.log(target);
  //     }
  //   }
  // });

  // bind both clndrs to the left and right arrow keys
  $(document).keydown( function(e) {
    if(e.keyCode == 37) {
      // left arrow
      calendars.clndr1.back();
      calendars.clndr2.back();
    }
    if(e.keyCode == 39) {
      // right arrow
      calendars.clndr1.forward();
      calendars.clndr2.forward();
    }
  });

    var dataJK = [
        {
            value: 60,
            color: "#1ABC9C"
        },
        {
            value: 40,
            color: "#D95459"
        }

    ];
    new Chart(document.getElementById("pie-jk").getContext("2d")).Pie(dataJK);

    //  pie KB
    var dataKB = [
        {
            value: 30,
            color: "#4cd964"
        },
        {
            value: 40,
            color: "#009688"
        },
        {
            value: 30,
            color: "#cddc39"
        }

    ];
    new Chart(document.getElementById("pie-kb").getContext("2d")).Pie(dataKB);

    $('#demo-pie-1').pieChart({
        barColor: '#3bb2d0',
        trackColor: '#eee',
        lineCap: 'round',
        lineWidth: 8,
        onStep: function (from, to, percent) {
            $(this.element).find('.pie-value').text(Math.round(percent) + '%');
        }
    });

    $('#demo-pie-2').pieChart({
        barColor: '#fbb03b',
        trackColor: '#eee',
        lineCap: 'butt',
        lineWidth: 8,
        onStep: function (from, to, percent) {
            $(this.element).find('.pie-value').text(Math.round(percent) + '%');
        }
    });

    $('#demo-pie-3').pieChart({
        barColor: '#ed6498',
        trackColor: '#eee',
        lineCap: 'square',
        lineWidth: 8,
        onStep: function (from, to, percent) {
            $(this.element).find('.pie-value').text(Math.round(percent) + '%');
        }
    });


// Graph Data ##############################################
    var graphData = [{
        // #1
        data: [[6, 700], [7, 600], [8, 900], [9, 100], [10, 500], [11, 1200], [12, 2000], [13, 1950], [14, 1900], [15, 2000]],
        color: '#999999'
    }, {
        // #2
        data: [[6, 500], [7, 602], [8, 550], [9, 600], [10, 800], [11, 900], [12, 1800], [13, 1850], [14, 1830], [15, 2200]],
        color: '#FBB03B',
        points: {radius: 4, fillColor: '#FFF'}
    }
    ];

    // Lines Graph
    // https://github.com/flot/flot/blob/master/README.md
    // ################### Kunjungan ##########################
    $.plot($('#graph-lines'), graphData, {
        series: {
            points: {
                show: true,
                radius: 5
            },
            lines: {
                show: true
            },
            shadowSize: 0
        },
        grid: {
            color: '#7f8c8d',
            borderColor: 'transparent',
            borderWidth: 20,
            hoverable: true
        },
        xaxis: {
            tickColor: 'transparent',
            tickDecimals: 0
        },
        yaxis: {
            tickSize: 1000
        }
    });


    // Graph Toggle ############################################
    $('#graph-bars').hide();

    $('#lines').on('click', function (e) {
        $('#bars').removeClass('active');
        $('#graph-bars').fadeOut();
        $(this).addClass('active');
        $('#graph-lines').fadeIn();
        e.preventDefault();
    });

    $('#bars').on('click', function (e) {
        $('#lines').removeClass('active');
        $('#graph-lines').fadeOut();
        $(this).addClass('active');
        $('#graph-bars').fadeIn().removeClass('hidden');
        e.preventDefault();
    });

    // Tooltip #################################################
    function showTooltip(x, y, contents) {
        $('<div id="tooltip">' + contents + '</div>').css({
            top: y - 16,
            left: x + 20
        }).appendTo('body').fadeIn();
    }

    var previousPoint = null;

    $('#graph-lines, #graph-bars').bind('plothover', function (event, pos, item) {
        if (item) {
            if (previousPoint != item.dataIndex) {
                previousPoint = item.dataIndex;
                $('#tooltip').remove();
                var x = item.datapoint[0],
                    y = item.datapoint[1];
                //showTooltip(item.pageX, item.pageY, y + ' visitors at ' + x + '.00h');
                showTooltip(item.pageX, item.pageY, y + ' kunjungan pada tanggal ' + x);
            }
        } else {
            $('#tooltip').remove();
            previousPoint = null;
        }
    });

});
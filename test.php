
<!DOCTYPE html>
<!-- saved from url=(0016)http://localhost -->
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:ms="urn:schemas-microsoft-com:xslt" xmlns:bat="http://schemas.microsoft.com/battery/2012" xmlns:js="http://microsoft.com/kernel"><head><meta http-equiv="X-UA-Compatible" content="IE=edge"/><meta name="ReportUtcOffset" content="+8:00"/><title>Battery report</title><style type="text/css">

      body {

          font-family: Segoe UI Light;

          letter-spacing: 0.02em;

          background-color: #181818;

          color: #F0F0F0;

          margin-left: 5.5em;

      }



      h1 {

          color: #11D8E8;

          font-size: 42pt;

      }



      h2 {

          font-size: 15pt;

          color: #11EEF4;

          margin-top: 4em;

          margin-bottom: 0em;

          letter-spacing: 0.08em;

      }



      td {

          padding-left: 0.3em;

          padding-right: 0.3em;

      }



      .nobatts {

          font-family: Segoe UI Semibold;

          background: #272727;

          color: #ACAC60;

          font-size: 13pt;

          padding-left:0.4em;

          padding-right:0.4em;

          padding-top:0.3em;

          padding-bottom:0.3em;

      }



      .explanation {

          color: #777777;

          font-size: 12pt;

          margin-bottom: 1em;

      }



      .explanation2 {

          color: #777777;

          font-size: 12pt;

          margin-bottom: 0.1em;

      }



      table {

          border-width: 0;

          table-layout: fixed;

          font-family: Segoe UI Light;

          letter-spacing: 0.02em;

          background-color: #181818;

          color: #f0f0f0;

      }



      .even { background: #272727; }

      .odd { background: #1E1E1E; }

      .even.suspend { background: #1A1A28; }

      .odd.suspend { background: #1A1A2C; }



      thead {

          font-family: Segoe UI Semibold;

          font-size: 85%;

          color: #BCBCBC;

      }



      text {

          font-size: 12pt;

          font-family: Segoe UI Light;

          fill: #11EEF4;

      }



      .centered { text-align: center; }



      .label {

          font-family: Segoe UI Semibold;

          font-size: 85%;

          color: #BCBCBC;

      }



      .dc.even { background: #40182C; }

      .dc.odd { background: #30141F; }



      td.colBreak {

          padding: 0;

          width: 0.15em;

      }



      td.state { text-align: center; }



      td.hms {

          font-family: Segoe UI Symbol;

          text-align: right;

          padding-right: 3.4em;

      }



      td.dateTime { font-family: Segoe UI Symbol; }

      td.nullValue { text-align: center; }



      td.percent {

          font-family: Segoe UI Symbol;

          text-align: right;

          padding-right: 2.5em;

      }



      col:first-child { width: 13em; }

      col.col2 { width: 10.4em; }

      col.percent { width: 7.5em; }



      td.mw {

          text-align: right;

          padding-right: 2.5em;

      }



      td.acdc { text-align: center; }



      span.date {

          display: inline-block;

          width: 5.5em;

      }



      span.time {

          text-align: right;

          width: 4.2em;

          display: inline-block;

      }



      text { font-family: Segoe UI Symbol; }



      .noncontigbreak {

          height: 0.3em;

          background-color: #1A1A28;

      }

    </style><script type="text/javascript">

    // Formats a number using the current locale (to handle the 1000's separator).

    // The result is rounded so no decimal point is shown.

    function numberToLocaleString(value) {

        var localeString = Math.round(parseFloat(value + '')).toLocaleString();

        return localeString.substring(0, localeString.indexOf('.'));

    }



    function padLeft(number, length) {

        var str = '' + number;

        while (str.length < length) {

            str = '0' + str;

        }



        return str;

    }



    // Returns the number of milliseconds between 2 date-times represented as strings.

    function msBetween(startTime, endTime) {

        return startTime > endTime

               ? msBetween(endTime, startTime)

               : parseDateTime(endTime) - parseDateTime(startTime);

    }



    var dateFormat = /(\d{4})-(\d{2})-(\d{2})[T](\d{2}):(\d{2}):(\d{2})/



    // Parses a date-time string and returns a Date (i.e. number of milliseconds)

    function parseDateTime(value) {

        if (!value) {

            return 0;

        }



        var match = dateFormat.exec(value)

        if (!match) {

            return 0;

        }



        return Date.parse(match[1] + '/' + match[2] + '/' +

                          match[3] + ' ' + match[4] + ':' +

                          match[5] + ':' + match[6])

    }



    // Parses just the date portion of a date-time string and returns a Date

    // (i.e. number of milliseconds)

    function parseDate(value) {

        if (!value) {

            return 0;

        }



        var match = dateFormat.exec(value)

        if (!match) {

            return 0;

        }



        return Date.parse(match[1] + '/' + match[2] + '/' + match[3])

    }



    var durationFormat = /P((\d+)D)?T((\d+)H)?((\d+)M)?(\d+)S/



    // Convert a string of the form P10DT1H15M40S to a count of milliseconds

    function parseDurationToMs(value) {

        var match = durationFormat.exec(value)

        if (!match) {

            return 0

        }



        var days = parseInt(match[2] || '0');

        var hrs = parseInt(match[4] || '0');

        var mins = parseInt(match[6] || '0');

        var secs = parseInt(match[7] || '0');

        return ((((((days * 24) + hrs) * 60) + mins) * 60) +  secs) * 1000;

    }



    // Converts milliseconds to days

    function msToDays(ms) {

        return (ms / 1000 / 60 / 60 / 24);

    }



    function daysToMs(days) {

        return (days * 24 * 60 * 60 * 1000);

    }



    // Formats a number of milliseconds as h:mm:ss

    function formatDurationMs(value) {

        var ms = parseInt(value);

        var secs = ms / 1000;

        var mins = secs / 60;

        var hrs = Math.floor(mins / 60);

        mins = Math.floor(mins % 60);

        secs = Math.floor(secs % 60);

        return hrs + ':' + padLeft(mins,2) + ':' + padLeft(secs,2);

    }



    // Converts a millisecond timestamp to a day and month string

    // Note: dayOffset is forward from date.

    function dateToDayAndMonth(ms, dayOffset) {

        var adjustedDate = new Date(ms + (dayOffset * 24 * 60 * 60 * 1000));

        return padLeft(adjustedDate.getMonth() + 1, 2) + "-" +

               padLeft(adjustedDate.getDate(), 2);

    }



    // Takes a millisecond timestamp and returns a new millisecond timestamp

    // rounded down to the current day.

    function dateFloor(ms) {

        var dt = new Date(ms);

        return Date.parse(dt.getFullYear() + '/' + (dt.getMonth() + 1) + '/' + dt.getDate());

    }

    

    Timegraph = {

        axisTop: 9.5,

        axisRight: 24.5,

        axisBottom: 25.5,

        axisLeft: 25.5,

        ticks: 10,



        // Maximum number of 24 hour ticks for showing 12 and 6 hour ticks



        ticks12Hour: 8,

        ticks6Hour: 4,



        // Shading



        lineColor: "#B82830",

        shadingColor: "#4d1d35",



        precompute: function (graph) {

            var canvas = graph.canvas;

            var data = graph.data;

            var min = 0;

            var max = 0;



            graph.height = canvas.height - Timegraph.axisTop - Timegraph.axisBottom;

            graph.width = canvas.width - Timegraph.axisLeft - Timegraph.axisRight;

            for (var i = 0; i < data.length; i++) {

                data[i].t0 = parseDateTime(data[i].x0);

                data[i].t1 = parseDateTime(data[i].x1);



                if (i == 0) {

                    min = data[i].t0;

                    max = data[i].t1;

                }



                if (data[i].t0 < min) {

                    min = data[i].t0;

                }



                if (data[i].t1 > max) {

                    max = data[i].t1;

                }



                data[i].yy0 =

                    Timegraph.axisTop + graph.height - data[i].y0 * graph.height;



                data[i].yy1 =

                    Timegraph.axisTop + graph.height - data[i].y1 * graph.height;

            }



            if (graph.startTime != null) {

                graph.startMs = parseDateTime(graph.startTime);



            } else {

                graph.startMs = min;

            }



            graph.endMs = max;

            graph.durationMs = max - min;

        },



        drawFrame: function (graph) {

            var canvas = graph.canvas;

            var context = graph.context;



            graph.width =

                canvas.width - Timegraph.axisRight - Timegraph.axisLeft;



            graph.height =

                canvas.height - Timegraph.axisTop - Timegraph.axisBottom;



            context.beginPath();

            context.moveTo(Timegraph.axisLeft, Timegraph.axisTop);

            context.lineTo(Timegraph.axisLeft + graph.width,

                           Timegraph.axisTop);



            context.lineTo(Timegraph.axisLeft + graph.width,

                           Timegraph.axisTop + graph.height);



            context.lineTo(Timegraph.axisLeft,

                           Timegraph.axisTop + graph.height);



            context.lineTo(Timegraph.axisLeft, Timegraph.axisTop);

            context.strokeStyle = "#c0c0c0";

            context.stroke();

        },



        drawRange: function (graph) {

            var canvas = graph.canvas;

            var context = graph.context;



            context.font = "12pt Segoe UI";

            context.fillStyle = "#00b0f0";

            context.fillText("%", 0, Timegraph.axisTop + 5, Timegraph.axisLeft);



            var tickSpacing = graph.height / 10;

            var offset = Timegraph.axisTop + tickSpacing;

            var tickValue = 90;

            for (var i = 0; i < 9; i++) {

                context.beginPath();

                context.moveTo(Timegraph.axisLeft, offset);

                context.lineTo(Timegraph.axisLeft + graph.width,

                               offset);



                context.stroke();

                context.fillText(tickValue.toString(),

                                 0,

                                 offset + 5,

                                 Timegraph.axisLeft);



                offset += tickSpacing;

                tickValue -= 10;

            }

        },



        drawDomain: function (graph, start, end) {

            var canvas = graph.canvas;

            var context = graph.context;

            var data = graph.data;

            var duration = end - start;

            if ((end < start)) {

                return;

            }



            var startDay = dateFloor(start);

            var t0 = startDay;

            var t1 = dateFloor(end);

            var dayOffset = 0;

            if (start > t0) {

                t0 = t0 + daysToMs(1);

                dayOffset++;

            }



            if (t0 >= t1) {

                return;

            }



            var increment =

                Math.max(Math.floor((t1 - t0) / daysToMs(Timegraph.ticks)), 1);



            var incrementMs = daysToMs(increment);

            var spacing = (incrementMs / duration) * graph.width;

            var offset = (t0 - start) / duration;

            var ticksCount = Math.floor((t1 - t0) / incrementMs);

            for (offset = offset * graph.width + Timegraph.axisLeft;

                 offset < (graph.width + Timegraph.axisLeft);

                 offset += spacing) {



                context.beginPath();

                context.moveTo(offset, Timegraph.axisTop);

                context.lineTo(offset, Timegraph.axisTop + graph.height);

                context.stroke();

                context.fillText(dateToDayAndMonth(startDay, dayOffset),

                                 offset,

                                 Timegraph.axisTop + graph.height + 15,

                                 spacing);



                dayOffset += increment;

            }

        },



        plot: function (graph, start, end) {

            var canvas = graph.canvas;

            var context = graph.context

            var data = graph.data;



            if ((end < start)) {

                return;

            }



            var duration = end - start;

            Timegraph.drawDomain(graph, start, end);

            context.fillStyle = Timegraph.shadingColor;

            for (var i = 0; i < data.length - 1; i++) {

                if ((data[i].t0 < start) || (data[i].t0 > end) ||

                    (data[i].t1 > end)) {



                    continue;

                }



                var x1 = (data[i].t0 - start) / duration;

                x1 = x1 * graph.width + Timegraph.axisLeft;



                var x2 = (data[i].t1 - start) / duration;

                x2 = x2 * graph.width + Timegraph.axisLeft;



                context.globalAlpha = 0.3;

                context.fillRect(x1, Timegraph.axisTop, (x2 - x1), graph.height);

                context.globalAlpha = 1;

                context.beginPath();

                context.strokeStyle = Timegraph.lineColor;

                context.lineWidth = 1.5;

                context.moveTo(x1, data[i].yy0);

                context.lineTo(x2, data[i].yy1);

                context.stroke();

            }

        },



        draw: function (graph) {

            var canvas = document.getElementById(graph.element);

            if (canvas == null) {

                return;

            }



            var context = canvas.getContext('2d');

            if (context == null) {

                return;

            }



            graph.width = 0;

            graph.height = 0;

            graph.context = context;

            graph.canvas = canvas;



            Timegraph.precompute(graph);

            Timegraph.drawFrame(graph);

            Timegraph.drawRange(graph);

            Timegraph.plot(graph, graph.startMs, graph.endMs);

        }

    };

    

    drainGraphData = [

    { x0: "2019-06-30T17:57:49", x1: "2019-06-30T18:00:33", y0: 0.9408891060087934, y1: 0.9352711284807035 }, 

{ x0: "2019-06-30T18:00:33", x1: "2019-06-30T18:00:34", y0: 0.9352711284807035, y1: 0.9352711284807035 }, 

{ x0: "2019-06-30T18:00:34", x1: "2019-06-30T18:01:03", y0: 0.9352711284807035, y1: 0.9345383488031265 }, 

{ x0: "2019-06-30T19:40:40", x1: "2019-06-30T19:47:11", y0: 0.9819247679531021, y1: 0.9899853444064485 }, 

{ x0: "2019-06-30T19:47:11", x1: "2019-06-30T19:47:13", y0: 0.9899853444064485, y1: 0.9899853444064485 }, 

{ x0: "2019-06-30T19:47:13", x1: "2019-06-30T19:47:04", y0: 0.9899853444064485, y1: 0.9899853444064485 }, 

{ x0: "2019-06-30T19:47:04", x1: "2019-06-30T19:47:06", y0: 0.9899853444064485, y1: 0.9899853444064485 }, 

{ x0: "2019-06-30T19:47:06", x1: "2019-06-30T19:47:37", y0: 0.9899853444064485, y1: 0.9880312652662433 }, 

{ x0: "2019-06-30T19:47:37", x1: "2019-07-01T01:47:38", y0: 0.9880312652662433, y1: 0.9704445530043967 }, 

{ x0: "2019-07-01T01:47:38", x1: "2019-07-01T09:23:50", y0: 0.9704445530043967, y1: 0.9745969711773327 }, 

{ x0: "2019-07-01T09:24:25", x1: "2019-07-01T09:24:25", y0: 0.970933072789448, y1: 0.970933072789448 }, 

{ x0: "2019-07-01T09:24:25", x1: "2019-07-01T10:04:26", y0: 0.970933072789448, y1: 0.8553981436248168 }, 

{ x0: "2019-07-01T10:04:26", x1: "2019-07-01T10:24:00", y0: 0.8553981436248168, y1: 0.8480703468490474 }, 

{ x0: "2019-07-01T10:24:00", x1: "2019-07-01T10:25:22", y0: 0.8480703468490474, y1: 0.8451392281387396 }, 

{ x0: "2019-07-01T10:25:22", x1: "2019-07-01T10:30:30", y0: 0.8451392281387396, y1: 0.833170493404983 }, 

{ x0: "2019-07-01T10:30:30", x1: "2019-07-01T10:49:10", y0: 0.833170493404983, y1: 0.8243771372740596 }, 

{ x0: "2019-07-01T10:49:10", x1: "2019-07-01T11:23:43", y0: 0.8243771372740596, y1: 0.7164142647777235 }, 

{ x0: "2019-07-01T11:23:43", x1: "2019-07-01T11:26:44", y0: 0.7164142647777235, y1: 0.7073766487542745 }, 

{ x0: "2019-07-01T11:26:44", x1: "2019-07-01T11:32:36", y0: 0.7073766487542745, y1: 0.6888128969223254 }, 

{ x0: "2019-07-01T11:32:36", x1: "2019-07-01T11:32:39", y0: 0.6888128969223254, y1: 0.6888128969223254 }, 

{ x0: "2019-07-01T11:32:39", x1: "2019-07-01T11:37:45", y0: 0.6888128969223254, y1: 0.6873473375671715 }, 

{ x0: "2019-07-01T13:54:55", x1: "2019-07-01T13:54:56", y0: 0.6809965803615047, y1: 0.6809965803615047 }, 

{ x0: "2019-07-01T13:55:20", x1: "2019-07-01T13:55:22", y0: 0.6809965803615047, y1: 0.6805080605764533 }, 

{ x0: "2019-07-01T13:55:23", x1: "2019-07-01T13:55:24", y0: 0.6805080605764533, y1: 0.6805080605764533 }, 

{ x0: "2019-07-01T13:55:43", x1: "2019-07-01T13:55:44", y0: 0.6805080605764533, y1: 0.6805080605764533 }, 

{ x0: "2019-07-01T13:56:02", x1: "2019-07-01T13:56:03", y0: 0.6805080605764533, y1: 0.6805080605764533 }, 

{ x0: "2019-07-01T13:56:04", x1: "2019-07-01T13:56:05", y0: 0.6805080605764533, y1: 0.6805080605764533 }, 

{ x0: "2019-07-01T13:56:17", x1: "2019-07-01T13:56:18", y0: 0.6805080605764533, y1: 0.6805080605764533 }, 

{ x0: "2019-07-01T13:56:19", x1: "2019-07-01T13:56:22", y0: 0.6805080605764533, y1: 0.680019540791402 }, 

{ x0: "2019-07-01T13:56:34", x1: "2019-07-01T13:56:35", y0: 0.680019540791402, y1: 0.680019540791402 }, 

{ x0: "2019-07-01T13:56:36", x1: "2019-07-01T13:56:37", y0: 0.680019540791402, y1: 0.680019540791402 }, 

{ x0: "2019-07-01T15:02:00", x1: "2019-07-01T15:53:54", y0: 0.9606741573033708, y1: 0.9870542256961406 }, 

{ x0: "2019-07-01T15:53:54", x1: "2019-07-01T15:56:00", y0: 0.9870542256961406, y1: 1.0175867122618467 }, 

{ x0: "2019-07-01T15:56:00", x1: "2019-07-01T16:01:00", y0: 1.0175867122618467, y1: 1.0175867122618467 }, 

{ x0: "2019-07-01T16:01:00", x1: "2019-07-01T16:08:44", y0: 1.0175867122618467, y1: 1.0175867122618467 }, 

{ x0: "2019-07-01T16:08:44", x1: "2019-07-01T16:17:02", y0: 1.0175867122618467, y1: 1.0175867122618467 }, 

{ x0: "2019-07-01T16:17:02", x1: "2019-07-01T16:33:11", y0: 1.0175867122618467, y1: 0.9587200781631656 }, 

{ x0: "2019-07-01T16:33:11", x1: "2019-07-01T16:40:33", y0: 0.9587200781631656, y1: 0.9518808011724474 }, 

{ x0: "2019-07-01T16:40:33", x1: "2019-07-01T16:41:25", y0: 0.9518808011724474, y1: 0.9491939423546654 }, 

{ x0: "2019-07-01T16:41:25", x1: "2019-07-01T16:45:56", y0: 0.9491939423546654, y1: 0.9450415241817294 }, 

{ x0: "2019-07-01T16:45:56", x1: "2019-07-01T16:57:17", y0: 0.9450415241817294, y1: 0.9098680996580362 }, 

{ x0: "2019-07-01T16:57:17", x1: "2019-07-01T17:00:18", y0: 0.9098680996580362, y1: 0.8993649242794333 }, 

{ x0: "2019-07-01T17:00:18", x1: "2019-07-01T17:11:09", y0: 0.8993649242794333, y1: 0.8724963361016121 }, 

{ x0: "2019-07-01T17:11:09", x1: "2019-07-01T17:12:34", y0: 0.8724963361016121, y1: 0.8707865168539326 }, 

{ x0: "2019-07-01T17:12:34", x1: "2019-07-01T17:13:36", y0: 0.8707865168539326, y1: 0.8676111382510991 }, 

{ x0: "2019-07-01T17:13:36", x1: "2019-07-01T17:23:02", y0: 0.8676111382510991, y1: 0.8590620420127015 }, 

{ x0: "2019-07-01T17:23:02", x1: "2019-07-01T17:28:10", y0: 0.8590620420127015, y1: 0.8473375671714705 }, 

{ x0: "2019-07-01T17:28:10", x1: "2019-07-01T17:31:23", y0: 0.8473375671714705, y1: 0.8444064484611626 }, 

{ x0: "2019-07-01T17:31:23", x1: "2019-07-01T17:36:27", y0: 0.8444064484611626, y1: 0.8321934538348803 }, 

{ x0: "2019-07-01T17:36:27", x1: "2019-07-01T17:45:21", y0: 0.8321934538348803, y1: 0.8248656570591109 }, 

{ x0: "2019-07-01T17:45:21", x1: "2019-07-01T17:51:56", y0: 0.8248656570591109, y1: 0.8085002442598925 }, 

{ x0: "2019-07-01T17:51:56", x1: "2019-07-01T17:52:02", y0: 0.8085002442598925, y1: 0.8085002442598925 }, 

{ x0: "2019-07-01T17:52:02", x1: "2019-07-01T23:52:01", y0: 0.8085002442598925, y1: 0.7799218368343918 }, 

{ x0: "2019-07-01T23:52:01", x1: "2019-07-01T23:52:02", y0: 0.7799218368343918, y1: 0.7799218368343918 }, 

{ x0: "2019-07-02T11:27:14", x1: "2019-07-02T11:27:52", y0: 0.7789447972642892, y1: 0.7750366389838789 }, 

{ x0: "2019-07-02T11:27:52", x1: "2019-07-02T11:38:41", y0: 0.7750366389838789, y1: 0.7344894968246214 }, 

{ x0: "2019-07-02T11:38:41", x1: "2019-07-02T11:38:44", y0: 0.7344894968246214, y1: 0.7344894968246214 }, 

{ x0: "2019-07-02T11:38:44", x1: "2019-07-02T13:53:11", y0: 0.7344894968246214, y1: 0.7261846604787494 }, 

{ x0: "2019-07-02T13:53:11", x1: "2019-07-02T15:23:50", y0: 0.7261846604787494, y1: 0.722276502198339 }, 

{ x0: "2019-07-02T15:23:50", x1: "2019-07-02T15:25:00", y0: 0.722276502198339, y1: 0.7220322423058134 }, 

{ x0: "2019-07-02T15:25:00", x1: "2019-07-02T15:43:33", y0: 0.7220322423058134, y1: 0.673180263800684 }, 

{ x0: "2019-07-02T15:43:33", x1: "2019-07-02T15:59:00", y0: 0.673180263800684, y1: 0.6660967269174401 }, 

{ x0: "2019-07-02T15:59:00", x1: "2019-07-02T16:03:13", y0: 0.6660967269174401, y1: 0.6602344894968246 }, 

{ x0: "2019-07-02T16:03:13", x1: "2019-07-02T18:34:48", y0: 0.6602344894968246, y1: 0.6560820713238886 }, 

{ x0: "2019-07-02T18:34:48", x1: "2019-07-02T19:15:51", y0: 0.6560820713238886, y1: 0.6460674157303371 }, 

{ x0: "2019-07-02T19:15:51", x1: "2019-07-02T22:03:08", y0: 0.6460674157303371, y1: 0.6362970200293112 }, 

{ x0: "2019-07-02T22:03:08", x1: "2019-07-02T22:03:08", y0: 0.6362970200293112, y1: 0.6362970200293112 }, 

{ x0: "2019-07-03T10:07:56", x1: "2019-07-03T10:09:07", y0: 0.6355642403517342, y1: 0.6272594040058622 }, 

{ x0: "2019-07-03T10:09:07", x1: "2019-07-03T11:06:49", y0: 0.6272594040058622, y1: 0.4152418172936004 }, 

{ x0: "2019-07-03T11:06:49", x1: "2019-07-03T11:08:49", y0: 0.4152418172936004, y1: 0.40522716170004885 }, 

{ x0: "2019-07-03T11:08:49", x1: "2019-07-03T12:05:31", y0: 0.40522716170004885, y1: 0.19491939423546653 }, 

{ x0: "2019-07-03T12:05:31", x1: "2019-07-03T12:09:01", y0: 0.19491939423546653, y1: 0.184904738641915 }, 

{ x0: "2019-07-03T12:35:53", x1: "2019-07-03T12:36:01", y0: 0.10405471421592574, y1: 0.10478749389350268 }, 

{ x0: "2019-07-03T12:36:01", x1: "2019-07-03T12:36:03", y0: 0.10478749389350268, y1: 0.10478749389350268 }, 

{ x0: "2019-07-03T12:36:03", x1: "2019-07-03T12:37:20", y0: 0.10478749389350268, y1: 0.11504640937957987 }, 

{ x0: "2019-07-03T12:37:20", x1: "2019-07-03T12:37:26", y0: 0.11504640937957987, y1: 0.11529066927210552 }, 

{ x0: "2019-07-03T12:37:45", x1: "2019-07-03T12:37:46", y0: 0.11529066927210552, y1: 0.11529066927210552 }, 

{ x0: "2019-07-03T12:37:54", x1: "2019-07-03T12:37:55", y0: 0.11529066927210552, y1: 0.11529066927210552 }, 

{ x0: "2019-07-03T12:37:56", x1: "2019-07-03T12:37:57", y0: 0.11529066927210552, y1: 0.11529066927210552 }, 

{ x0: "2019-07-03T12:38:23", x1: "2019-07-03T12:38:48", y0: 0.11577918905715681, y1: 0.11944308744504152 }, 

{ x0: "2019-07-03T12:38:48", x1: "2019-07-03T12:38:49", y0: 0.11944308744504152, y1: 0.11944308744504152 }, 

{ x0: "2019-07-03T12:38:49", x1: "2019-07-03T12:38:55", y0: 0.11944308744504152, y1: 0.11968734733756717 }, 

{ x0: "2019-07-03T12:39:15", x1: "2019-07-03T12:41:22", y0: 0.11968734733756717, y1: 0.13336590131900341 }, 

{ x0: "2019-07-03T12:41:23", x1: "2019-07-03T12:45:10", y0: 0.13361016121152908, y1: 0.1626770884220811 }, 

{ x0: "2019-07-03T12:45:10", x1: "2019-07-03T12:53:35", y0: 0.1626770884220811, y1: 0.14484611626770885 }, 

{ x0: "2019-07-03T12:53:35", x1: "2019-07-03T13:10:00", y0: 0.14484611626770885, y1: 0.13556424035173425 }, 

{ x0: "2019-07-03T13:10:00", x1: "2019-07-03T13:16:00", y0: 0.13556424035173425, y1: 0.13556424035173425 }, 

{ x0: "2019-07-03T13:16:00", x1: "2019-07-03T13:36:02", y0: 0.13556424035173425, y1: 0.11016121152906692 }, 

{ x0: "2019-07-03T13:40:49", x1: "2019-07-03T13:40:50", y0: 0.09990229604298974, y1: 0.09990229604298974 }, 

{ x0: "2019-07-03T13:40:51", x1: "2019-07-03T13:40:52", y0: 0.09990229604298974, y1: 0.09990229604298974 }, 

{ x0: "2019-07-03T13:41:13", x1: "2019-07-03T13:41:14", y0: 0.09990229604298974, y1: 0.09990229604298974 }, 

{ x0: "2019-07-03T13:41:14", x1: "2019-07-03T13:41:15", y0: 0.09990229604298974, y1: 0.09794821690278456 }, 

{ x0: "2019-07-03T15:12:33", x1: "2019-07-03T15:15:06", y0: 0.8292623351245726, y1: 0.848314606741573 }, 

{ x0: "2019-07-03T15:15:21", x1: "2019-07-03T15:15:22", y0: 0.848314606741573, y1: 0.848314606741573 }, 

{ x0: "2019-07-03T15:15:23", x1: "2019-07-03T16:11:29", y0: 0.848314606741573, y1: 0.9513922813873962 }, 

{ x0: "2019-07-03T16:11:30", x1: "2019-07-03T16:11:33", y0: 0.9513922813873962, y1: 0.9643380556912555 }, 

{ x0: "2019-07-03T16:11:34", x1: "2019-07-03T16:11:37", y0: 0.9643380556912555, y1: 0.9645823155837812 }, 

{ x0: "2019-07-03T16:17:00", x1: "2019-07-03T16:25:43", y0: 0.9645823155837812, y1: 0.9748412310698583 }, 



    ];

    

    function main() {

        Timegraph.draw({

            element: "drain-graph",

            data: drainGraphData,

            startTime: "2019-06-30T17:36:16",

            endTime: "2019-07-03T17:36:16",

        });

    }



    if (window.addEventListener != null) {

        window.addEventListener("load", main, false);



    } else if (window.attachEvent != null) {

        window.attachEvent("onload", main);

    }

    </script></head><body><h1>

      电池报告

    </h1><table style="margin-bottom: 6em;"><col/><tr><td class="label">

          COMPUTER NAME

        </td><td>DESKTOP-62T4AC2</td></tr><tr><td class="label">

          SYSTEM PRODUCT NAME

        </td><td>Microsoft Corporation Surface Pro</td></tr><tr><td class="label">

          BIOS

        </td><td>234.2706.768 04/18/2019</td></tr><tr><td class="label">

          OS BUILD

        </td><td>18362.1.amd64fre.19h1_release.190318-1202</td></tr><tr><td class="label">

          PLATFORM ROLE

        </td><td>Slate</td></tr><tr><td class="label">

          CONNECTED STANDBY

        </td><td>Supported</td></tr><tr><td class="label">

          REPORT TIME

        </td><td class="dateTime"><span class="date">2019-07-03 </span><span class="time">17:36:16</span></td></tr></table><h2>

      Installed batteries

    </h2><div class="explanation">

      Information about each currently installed battery

    </div><table><colgroup><col style="width: 15em;"/><col style="width: 14em;"/></colgroup><thead><tr><td> </td><td>

                  BATTERY

                  1</td></tr></thead><tr><td><span class="label">NAME</span></td><td>M1009168</td></tr><tr><td><span class="label">MANUFACTURER</span></td><td>DYN</td></tr><tr><td><span class="label">SERIAL NUMBER</span></td><td>0102972733</td></tr><tr><td><span class="label">CHEMISTRY</span></td><td>LION</td></tr><tr><td><span class="label">DESIGN CAPACITY</span></td><td>45,000 mWh

      </td></tr><tr style="height:0.4em;"></tr><tr><td><span class="label">FULL CHARGE CAPACITY</span></td><td>41,050 mWh

      </td></tr><tr><td><span class="label">CYCLE COUNT</span></td><td>116</td></tr></table><h2>Recent usage</h2><div class="explanation">

      Power states over the last 3 days

    </div><table><colgroup><col/><col class="col2"/><col style="width: 4.2em;"/><col class="percent"/><col style="width: 11em;"/></colgroup><thead><tr><td>

            START TIME

          </td><td class="centered">

            STATE

          </td><td class="centered">

            SOURCE

          </td><td colspan="2" class="centered">

            CAPACITY REMAINING

          </td></tr></thead><tr class="even dc 1"><td class="dateTime"><span class="date">2019-06-30 </span><span class="time">17:57:49</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">94 %

        </td><td class="mw">38,520 mWh

        </td></tr><tr class="odd dc 2"><td class="dateTime"><span class="date"> </span><span class="time">18:00:34</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">94 %

        </td><td class="mw">38,290 mWh

        </td></tr><tr class="even dc 3"><td class="dateTime"><span class="date"> </span><span class="time">18:01:03</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">93 %

        </td><td class="mw">38,260 mWh

        </td></tr><tr class="odd  4"><td class="dateTime"><span class="date"> </span><span class="time">18:55:04</span></td><td class="state">

        Active

      </td><td class="acdc">

        AC

      </td><td class="percent">78 %

        </td><td class="mw">31,970 mWh

        </td></tr><tr class="even  5"><td class="dateTime"><span class="date"> </span><span class="time">18:55:31</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        AC

      </td><td class="percent">78 %

        </td><td class="mw">32,120 mWh

        </td></tr><tr class="odd suspend 6"><td class="dateTime"><span class="date"> </span><span class="time">19:40:40</span></td><td class="state">

        Suspended

      </td><td class="acdc"></td><td class="percent">98 %

        </td><td class="mw">40,200 mWh

        </td></tr><tr class="even dc 7"><td class="dateTime"><span class="date"> </span><span class="time">19:47:11</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">99 %

        </td><td class="mw">40,530 mWh

        </td></tr><tr class="odd suspend 8"><td class="dateTime"><span class="date"> </span><span class="time">19:47:13</span></td><td class="state">

        Suspended

      </td><td class="acdc"></td><td class="percent">99 %

        </td><td class="mw">40,530 mWh

        </td></tr><tr class="even dc 9"><td class="dateTime"><span class="date"> </span><span class="time">19:47:04</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">99 %

        </td><td class="mw">40,530 mWh

        </td></tr><tr class="odd dc 10"><td class="dateTime"><span class="date"> </span><span class="time">19:47:06</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">99 %

        </td><td class="mw">40,530 mWh

        </td></tr><tr class="even dc 11"><td class="dateTime"><span class="date"> </span><span class="time">19:47:37</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">99 %

        </td><td class="mw">40,450 mWh

        </td></tr><tr class="odd suspend 12"><td class="dateTime"><span class="date">2019-07-01 </span><span class="time">09:23:50</span></td><td class="state">

        Suspended

      </td><td class="acdc"></td><td class="percent">97 %

        </td><td class="mw">39,900 mWh

        </td></tr><tr class="even dc 13"><td class="dateTime"><span class="date"> </span><span class="time">09:24:25</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">97 %

        </td><td class="mw">39,750 mWh

        </td></tr><tr class="odd dc 14"><td class="dateTime"><span class="date"> </span><span class="time">09:24:25</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">97 %

        </td><td class="mw">39,750 mWh

        </td></tr><tr class="even dc 15"><td class="dateTime"><span class="date"> </span><span class="time">10:04:26</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">86 %

        </td><td class="mw">35,020 mWh

        </td></tr><tr class="odd dc 16"><td class="dateTime"><span class="date"> </span><span class="time">10:25:22</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">85 %

        </td><td class="mw">34,600 mWh

        </td></tr><tr class="even dc 17"><td class="dateTime"><span class="date"> </span><span class="time">10:30:30</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">83 %

        </td><td class="mw">34,110 mWh

        </td></tr><tr class="odd dc 18"><td class="dateTime"><span class="date"> </span><span class="time">10:49:10</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">82 %

        </td><td class="mw">33,750 mWh

        </td></tr><tr class="even dc 19"><td class="dateTime"><span class="date"> </span><span class="time">11:32:39</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">69 %

        </td><td class="mw">28,200 mWh

        </td></tr><tr class="odd  20"><td class="dateTime"><span class="date"> </span><span class="time">13:54:55</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        AC

      </td><td class="percent">68 %

        </td><td class="mw">27,880 mWh

        </td></tr><tr class="even dc 21"><td class="dateTime"><span class="date"> </span><span class="time">13:54:56</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">68 %

        </td><td class="mw">27,880 mWh

        </td></tr><tr class="odd  22"><td class="dateTime"><span class="date"> </span><span class="time">13:55:20</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        AC

      </td><td class="percent">68 %

        </td><td class="mw">27,880 mWh

        </td></tr><tr class="even dc 23"><td class="dateTime"><span class="date"> </span><span class="time">13:55:22</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">68 %

        </td><td class="mw">27,860 mWh

        </td></tr><tr class="odd  24"><td class="dateTime"><span class="date"> </span><span class="time">13:55:23</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        AC

      </td><td class="percent">68 %

        </td><td class="mw">27,860 mWh

        </td></tr><tr class="even dc 25"><td class="dateTime"><span class="date"> </span><span class="time">13:55:24</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">68 %

        </td><td class="mw">27,860 mWh

        </td></tr><tr class="odd  26"><td class="dateTime"><span class="date"> </span><span class="time">13:55:43</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        AC

      </td><td class="percent">68 %

        </td><td class="mw">27,860 mWh

        </td></tr><tr class="even dc 27"><td class="dateTime"><span class="date"> </span><span class="time">13:55:44</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">68 %

        </td><td class="mw">27,860 mWh

        </td></tr><tr class="odd  28"><td class="dateTime"><span class="date"> </span><span class="time">13:56:02</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        AC

      </td><td class="percent">68 %

        </td><td class="mw">27,860 mWh

        </td></tr><tr class="even dc 29"><td class="dateTime"><span class="date"> </span><span class="time">13:56:03</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">68 %

        </td><td class="mw">27,860 mWh

        </td></tr><tr class="odd  30"><td class="dateTime"><span class="date"> </span><span class="time">13:56:04</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        AC

      </td><td class="percent">68 %

        </td><td class="mw">27,860 mWh

        </td></tr><tr class="even dc 31"><td class="dateTime"><span class="date"> </span><span class="time">13:56:05</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">68 %

        </td><td class="mw">27,860 mWh

        </td></tr><tr class="odd  32"><td class="dateTime"><span class="date"> </span><span class="time">13:56:17</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        AC

      </td><td class="percent">68 %

        </td><td class="mw">27,860 mWh

        </td></tr><tr class="even dc 33"><td class="dateTime"><span class="date"> </span><span class="time">13:56:18</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">68 %

        </td><td class="mw">27,860 mWh

        </td></tr><tr class="odd  34"><td class="dateTime"><span class="date"> </span><span class="time">13:56:19</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        AC

      </td><td class="percent">68 %

        </td><td class="mw">27,860 mWh

        </td></tr><tr class="even dc 35"><td class="dateTime"><span class="date"> </span><span class="time">13:56:22</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">68 %

        </td><td class="mw">27,840 mWh

        </td></tr><tr class="odd  36"><td class="dateTime"><span class="date"> </span><span class="time">13:56:34</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        AC

      </td><td class="percent">68 %

        </td><td class="mw">27,840 mWh

        </td></tr><tr class="even dc 37"><td class="dateTime"><span class="date"> </span><span class="time">13:56:35</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">68 %

        </td><td class="mw">27,840 mWh

        </td></tr><tr class="odd  38"><td class="dateTime"><span class="date"> </span><span class="time">13:56:36</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        AC

      </td><td class="percent">68 %

        </td><td class="mw">27,840 mWh

        </td></tr><tr class="even dc 39"><td class="dateTime"><span class="date"> </span><span class="time">13:56:37</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">68 %

        </td><td class="mw">27,840 mWh

        </td></tr><tr class="odd  40"><td class="dateTime"><span class="date"> </span><span class="time">13:56:40</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        AC

      </td><td class="percent">68 %

        </td><td class="mw">27,840 mWh

        </td></tr><tr class="even  41"><td class="dateTime"><span class="date"> </span><span class="time">13:58:17</span></td><td class="state">

        Active

      </td><td class="acdc">

        AC

      </td><td class="percent">69 %

        </td><td class="mw">28,430 mWh

        </td></tr><tr class="odd dc 42"><td class="dateTime"><span class="date"> </span><span class="time">15:53:54</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">99 %

        </td><td class="mw">40,410 mWh

        </td></tr><tr class="even dc 43"><td class="dateTime"><span class="date"> </span><span class="time">16:08:44</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">102 %

        </td><td class="mw">41,660 mWh

        </td></tr><tr class="odd dc 44"><td class="dateTime"><span class="date"> </span><span class="time">16:17:02</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">102 %

        </td><td class="mw">41,660 mWh

        </td></tr><tr class="even dc 45"><td class="dateTime"><span class="date"> </span><span class="time">16:33:11</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">96 %

        </td><td class="mw">39,250 mWh

        </td></tr><tr class="odd dc 46"><td class="dateTime"><span class="date"> </span><span class="time">16:40:33</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">95 %

        </td><td class="mw">38,970 mWh

        </td></tr><tr class="even dc 47"><td class="dateTime"><span class="date"> </span><span class="time">16:41:25</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">95 %

        </td><td class="mw">38,860 mWh

        </td></tr><tr class="odd dc 48"><td class="dateTime"><span class="date"> </span><span class="time">16:45:56</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">95 %

        </td><td class="mw">38,690 mWh

        </td></tr><tr class="even dc 49"><td class="dateTime"><span class="date"> </span><span class="time">17:11:09</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">87 %

        </td><td class="mw">35,720 mWh

        </td></tr><tr class="odd dc 50"><td class="dateTime"><span class="date"> </span><span class="time">17:12:34</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">87 %

        </td><td class="mw">35,650 mWh

        </td></tr><tr class="even dc 51"><td class="dateTime"><span class="date"> </span><span class="time">17:13:36</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">87 %

        </td><td class="mw">35,520 mWh

        </td></tr><tr class="odd dc 52"><td class="dateTime"><span class="date"> </span><span class="time">17:23:02</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">86 %

        </td><td class="mw">35,170 mWh

        </td></tr><tr class="even dc 53"><td class="dateTime"><span class="date"> </span><span class="time">17:28:10</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">85 %

        </td><td class="mw">34,690 mWh

        </td></tr><tr class="odd dc 54"><td class="dateTime"><span class="date"> </span><span class="time">17:31:23</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">84 %

        </td><td class="mw">34,570 mWh

        </td></tr><tr class="even dc 55"><td class="dateTime"><span class="date"> </span><span class="time">17:36:27</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">83 %

        </td><td class="mw">34,070 mWh

        </td></tr><tr class="odd dc 56"><td class="dateTime"><span class="date"> </span><span class="time">17:45:21</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">82 %

        </td><td class="mw">33,770 mWh

        </td></tr><tr class="even dc 57"><td class="dateTime"><span class="date"> </span><span class="time">17:52:02</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">81 %

        </td><td class="mw">33,100 mWh

        </td></tr><tr class="odd suspend 58"><td class="dateTime"><span class="date"> </span><span class="time">23:52:02</span></td><td class="state">

        Suspended

      </td><td class="acdc"></td><td class="percent">78 %

        </td><td class="mw">31,930 mWh

        </td></tr><tr class="even dc 59"><td class="dateTime"><span class="date">2019-07-02 </span><span class="time">11:27:14</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">78 %

        </td><td class="mw">31,890 mWh

        </td></tr><tr class="odd dc 60"><td class="dateTime"><span class="date"> </span><span class="time">11:38:44</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">73 %

        </td><td class="mw">30,070 mWh

        </td></tr><tr class="even dc 61"><td class="dateTime"><span class="date"> </span><span class="time">15:23:50</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">72 %

        </td><td class="mw">29,570 mWh

        </td></tr><tr class="odd dc 62"><td class="dateTime"><span class="date"> </span><span class="time">15:43:33</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">67 %

        </td><td class="mw">27,560 mWh

        </td></tr><tr class="even suspend 63"><td class="dateTime"><span class="date"> </span><span class="time">22:03:08</span></td><td class="state">

        Suspended

      </td><td class="acdc"></td><td class="percent">64 %

        </td><td class="mw">26,050 mWh

        </td></tr><tr class="odd dc 64"><td class="dateTime"><span class="date">2019-07-03 </span><span class="time">10:07:56</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">64 %

        </td><td class="mw">26,020 mWh

        </td></tr><tr class="even  65"><td class="dateTime"><span class="date"> </span><span class="time">12:35:53</span></td><td class="state">

        Active

      </td><td class="acdc">

        AC

      </td><td class="percent">10 %

        </td><td class="mw">4,260 mWh

        </td></tr><tr class="odd dc 66"><td class="dateTime"><span class="date"> </span><span class="time">12:36:01</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">10 %

        </td><td class="mw">4,290 mWh

        </td></tr><tr class="even dc 67"><td class="dateTime"><span class="date"> </span><span class="time">12:36:03</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">10 %

        </td><td class="mw">4,290 mWh

        </td></tr><tr class="odd  68"><td class="dateTime"><span class="date"> </span><span class="time">12:36:03</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        AC

      </td><td class="percent">10 %

        </td><td class="mw">4,290 mWh

        </td></tr><tr class="even dc 69"><td class="dateTime"><span class="date"> </span><span class="time">12:37:20</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">12 %

        </td><td class="mw">4,710 mWh

        </td></tr><tr class="odd  70"><td class="dateTime"><span class="date"> </span><span class="time">12:37:45</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        AC

      </td><td class="percent">12 %

        </td><td class="mw">4,720 mWh

        </td></tr><tr class="even dc 71"><td class="dateTime"><span class="date"> </span><span class="time">12:37:46</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">12 %

        </td><td class="mw">4,720 mWh

        </td></tr><tr class="odd  72"><td class="dateTime"><span class="date"> </span><span class="time">12:37:54</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        AC

      </td><td class="percent">12 %

        </td><td class="mw">4,720 mWh

        </td></tr><tr class="even dc 73"><td class="dateTime"><span class="date"> </span><span class="time">12:37:55</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">12 %

        </td><td class="mw">4,720 mWh

        </td></tr><tr class="odd  74"><td class="dateTime"><span class="date"> </span><span class="time">12:37:56</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        AC

      </td><td class="percent">12 %

        </td><td class="mw">4,720 mWh

        </td></tr><tr class="even dc 75"><td class="dateTime"><span class="date"> </span><span class="time">12:37:57</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">12 %

        </td><td class="mw">4,720 mWh

        </td></tr><tr class="odd  76"><td class="dateTime"><span class="date"> </span><span class="time">12:38:10</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        AC

      </td><td class="percent">12 %

        </td><td class="mw">4,720 mWh

        </td></tr><tr class="even dc 77"><td class="dateTime"><span class="date"> </span><span class="time">12:38:48</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">12 %

        </td><td class="mw">4,890 mWh

        </td></tr><tr class="odd dc 78"><td class="dateTime"><span class="date"> </span><span class="time">12:38:49</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">12 %

        </td><td class="mw">4,890 mWh

        </td></tr><tr class="even dc 79"><td class="dateTime"><span class="date"> </span><span class="time">12:38:55</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">12 %

        </td><td class="mw">4,900 mWh

        </td></tr><tr class="odd  80"><td class="dateTime"><span class="date"> </span><span class="time">12:39:01</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        AC

      </td><td class="percent">12 %

        </td><td class="mw">4,900 mWh

        </td></tr><tr class="even  81"><td class="dateTime"><span class="date"> </span><span class="time">12:39:01</span></td><td class="state">

        Active

      </td><td class="acdc">

        AC

      </td><td class="percent">12 %

        </td><td class="mw">4,900 mWh

        </td></tr><tr class="odd  82"><td class="dateTime"><span class="date"> </span><span class="time">12:39:07</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        AC

      </td><td class="percent">12 %

        </td><td class="mw">4,860 mWh

        </td></tr><tr class="even  83"><td class="dateTime"><span class="date"> </span><span class="time">12:39:15</span></td><td class="state">

        Active

      </td><td class="acdc">

        AC

      </td><td class="percent">12 %

        </td><td class="mw">4,900 mWh

        </td></tr><tr class="odd dc 84"><td class="dateTime"><span class="date"> </span><span class="time">12:41:22</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">13 %

        </td><td class="mw">5,460 mWh

        </td></tr><tr class="even  85"><td class="dateTime"><span class="date"> </span><span class="time">12:41:23</span></td><td class="state">

        Active

      </td><td class="acdc">

        AC

      </td><td class="percent">13 %

        </td><td class="mw">5,470 mWh

        </td></tr><tr class="odd dc 86"><td class="dateTime"><span class="date"> </span><span class="time">12:45:10</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">16 %

        </td><td class="mw">6,660 mWh

        </td></tr><tr class="even dc 87"><td class="dateTime"><span class="date"> </span><span class="time">12:53:35</span></td><td class="state">

            Connected standby

          </td><td class="acdc">

        Battery

      </td><td class="percent">14 %

        </td><td class="mw">5,930 mWh

        </td></tr><tr class="odd dc 88"><td class="dateTime"><span class="date"> </span><span class="time">13:36:02</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">11 %

        </td><td class="mw">4,510 mWh

        </td></tr><tr class="even  89"><td class="dateTime"><span class="date"> </span><span class="time">13:40:49</span></td><td class="state">

        Active

      </td><td class="acdc">

        AC

      </td><td class="percent">10 %

        </td><td class="mw">4,090 mWh

        </td></tr><tr class="odd dc 90"><td class="dateTime"><span class="date"> </span><span class="time">13:40:50</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">10 %

        </td><td class="mw">4,090 mWh

        </td></tr><tr class="even  91"><td class="dateTime"><span class="date"> </span><span class="time">13:40:51</span></td><td class="state">

        Active

      </td><td class="acdc">

        AC

      </td><td class="percent">10 %

        </td><td class="mw">4,090 mWh

        </td></tr><tr class="odd dc 92"><td class="dateTime"><span class="date"> </span><span class="time">13:40:52</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">10 %

        </td><td class="mw">4,090 mWh

        </td></tr><tr class="even  93"><td class="dateTime"><span class="date"> </span><span class="time">13:41:13</span></td><td class="state">

        Active

      </td><td class="acdc">

        AC

      </td><td class="percent">10 %

        </td><td class="mw">4,090 mWh

        </td></tr><tr class="odd dc 94"><td class="dateTime"><span class="date"> </span><span class="time">13:41:14</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">10 %

        </td><td class="mw">4,090 mWh

        </td></tr><tr class="even  95"><td class="dateTime"><span class="date"> </span><span class="time">13:41:14</span></td><td class="state">

        Active

      </td><td class="acdc">

        AC

      </td><td class="percent">10 %

        </td><td class="mw">4,090 mWh

        </td></tr><tr class="odd dc 96"><td class="dateTime"><span class="date"> </span><span class="time">13:41:15</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">10 %

        </td><td class="mw">4,010 mWh

        </td></tr><tr class="even  97"><td class="dateTime"><span class="date"> </span><span class="time">13:41:18</span></td><td class="state">

        Active

      </td><td class="acdc">

        AC

      </td><td class="percent">10 %

        </td><td class="mw">4,010 mWh

        </td></tr><tr class="odd dc 98"><td class="dateTime"><span class="date"> </span><span class="time">15:15:06</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">85 %

        </td><td class="mw">34,730 mWh

        </td></tr><tr class="even  99"><td class="dateTime"><span class="date"> </span><span class="time">15:15:21</span></td><td class="state">

        Active

      </td><td class="acdc">

        AC

      </td><td class="percent">85 %

        </td><td class="mw">34,730 mWh

        </td></tr><tr class="odd dc 100"><td class="dateTime"><span class="date"> </span><span class="time">15:15:22</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">85 %

        </td><td class="mw">34,730 mWh

        </td></tr><tr class="even  101"><td class="dateTime"><span class="date"> </span><span class="time">15:15:23</span></td><td class="state">

        Active

      </td><td class="acdc">

        AC

      </td><td class="percent">85 %

        </td><td class="mw">34,730 mWh

        </td></tr><tr class="odd dc 102"><td class="dateTime"><span class="date"> </span><span class="time">16:11:29</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">95 %

        </td><td class="mw">38,950 mWh

        </td></tr><tr class="even  103"><td class="dateTime"><span class="date"> </span><span class="time">16:11:30</span></td><td class="state">

        Active

      </td><td class="acdc">

        AC

      </td><td class="percent">95 %

        </td><td class="mw">38,950 mWh

        </td></tr><tr class="odd dc 104"><td class="dateTime"><span class="date"> </span><span class="time">16:11:33</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">96 %

        </td><td class="mw">39,480 mWh

        </td></tr><tr class="even  105"><td class="dateTime"><span class="date"> </span><span class="time">16:11:34</span></td><td class="state">

        Active

      </td><td class="acdc">

        AC

      </td><td class="percent">96 %

        </td><td class="mw">39,480 mWh

        </td></tr><tr class="odd dc 106"><td class="dateTime"><span class="date"> </span><span class="time">16:11:37</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">96 %

        </td><td class="mw">39,490 mWh

        </td></tr><tr class="even  107"><td class="dateTime"><span class="date"> </span><span class="time">16:11:38</span></td><td class="state">

        Active

      </td><td class="acdc">

        AC

      </td><td class="percent">96 %

        </td><td class="mw">39,490 mWh

        </td></tr><tr class="odd dc 108"><td class="dateTime"><span class="date"> </span><span class="time">16:25:43</span></td><td class="state">

        Active

      </td><td class="acdc">

        Battery

      </td><td class="percent">97 %

        </td><td class="mw">39,910 mWh

        </td></tr><tr class="even  109"><td class="dateTime"><span class="date"> </span><span class="time">16:31:52</span></td><td class="state">

        Active

      </td><td class="acdc">

        AC

      </td><td class="percent">100 %

        </td><td class="mw">41,050 mWh

        </td></tr><tr class="odd  110"><td class="dateTime"><span class="date"> </span><span class="time">17:36:16</span></td><td class="state">

        Report generated

      </td><td class="acdc">

        AC

      </td><td class="percent">100 %

        </td><td class="mw">41,050 mWh

        </td></tr></table><h2>Battery usage</h2><div class="explanation">

      Battery drains over the last 3 days

    </div><canvas id="drain-graph" width="864" height="400"></canvas><table><colgroup><col/><col class="col2"/><col style="width: 10em;"/><col class="percent"/><col style="width: 11em;"/></colgroup><thead><tr><td>

            START TIME

          </td><td class="centered">

            STATE

          </td><td class="centered">

            DURATION

          </td><td class="centered" colspan="2">

            ENERGY DRAINED

          </td></tr></thead><tr class="even dc 1"><td class="dateTime"><span class="date">2019-06-30 </span><span class="time">17:57:49</span></td><td class="state">

        Active

      </td><td class="hms">0:02:44</td><td class="percent">1 %

        </td><td class="mw">230 mWh

        </td></tr><tr class="odd dc 2"><td class="dateTime"><span class="date"> </span><span class="time">18:00:34</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:00:29</td><td class="nullValue">-</td><td class="mw">30 mWh

        </td></tr><tr class="even dc 3"><td class="dateTime"><span class="date"> </span><span class="time">18:01:03</span></td><td class="state">

        Active

      </td><td class="hms">0:54:01</td><td class="percent">15 %

        </td><td class="mw">6,290 mWh

        </td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="odd dc 4"><td class="dateTime"><span class="date"> </span><span class="time">19:47:11</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:00:01</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="even dc 5"><td class="dateTime"><span class="date"> </span><span class="time">19:47:04</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:00:02</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="odd dc 6"><td class="dateTime"><span class="date"> </span><span class="time">19:47:06</span></td><td class="state">

        Active

      </td><td class="hms">0:00:30</td><td class="nullValue">-</td><td class="mw">80 mWh

        </td></tr><tr class="even dc 7"><td class="dateTime"><span class="date"> </span><span class="time">19:47:37</span></td><td class="state">

            Connected standby

          </td><td class="hms">13:36:13</td><td class="percent">1 %

        </td><td class="mw">550 mWh

        </td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="odd dc 8"><td class="dateTime"><span class="date"> </span><span class="time">09:24:25</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:00:00</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="even dc 9"><td class="dateTime"><span class="date"> </span><span class="time">09:24:25</span></td><td class="state">

        Active

      </td><td class="hms">0:40:00</td><td class="percent">12 %

        </td><td class="mw">4,730 mWh

        </td></tr><tr class="odd dc 10"><td class="dateTime"><span class="date"> </span><span class="time">10:04:26</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:20:56</td><td class="percent">1 %

        </td><td class="mw">420 mWh

        </td></tr><tr class="even dc 11"><td class="dateTime"><span class="date"> </span><span class="time">10:25:22</span></td><td class="state">

        Active

      </td><td class="hms">0:05:07</td><td class="percent">1 %

        </td><td class="mw">490 mWh

        </td></tr><tr class="odd dc 12"><td class="dateTime"><span class="date"> </span><span class="time">10:30:30</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:18:40</td><td class="percent">1 %

        </td><td class="mw">360 mWh

        </td></tr><tr class="even dc 13"><td class="dateTime"><span class="date"> </span><span class="time">10:49:10</span></td><td class="state">

        Active

      </td><td class="hms">0:43:28</td><td class="percent">14 %

        </td><td class="mw">5,550 mWh

        </td></tr><tr class="odd dc 14"><td class="dateTime"><span class="date"> </span><span class="time">11:32:39</span></td><td class="state">

            Connected standby

          </td><td class="hms">2:22:16</td><td class="percent">1 %

        </td><td class="mw">320 mWh

        </td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="even dc 15"><td class="dateTime"><span class="date"> </span><span class="time">13:54:56</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:00:24</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="odd dc 16"><td class="dateTime"><span class="date"> </span><span class="time">13:55:22</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:00:01</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="even dc 17"><td class="dateTime"><span class="date"> </span><span class="time">13:55:24</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:00:19</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="odd dc 18"><td class="dateTime"><span class="date"> </span><span class="time">13:55:44</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:00:17</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="even dc 19"><td class="dateTime"><span class="date"> </span><span class="time">13:56:03</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:00:01</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="odd dc 20"><td class="dateTime"><span class="date"> </span><span class="time">13:56:05</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:00:12</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="even dc 21"><td class="dateTime"><span class="date"> </span><span class="time">13:56:18</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:00:01</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="odd dc 22"><td class="dateTime"><span class="date"> </span><span class="time">13:56:22</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:00:11</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="even dc 23"><td class="dateTime"><span class="date"> </span><span class="time">13:56:35</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:00:00</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="odd dc 24"><td class="dateTime"><span class="date"> </span><span class="time">13:56:37</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:00:03</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="even dc 25"><td class="dateTime"><span class="date"> </span><span class="time">15:53:54</span></td><td class="state">

        Active

      </td><td class="hms">0:14:50</td><td class="nullValue">-</td><td class="mw">-1,250 mWh

        </td></tr><tr class="odd dc 26"><td class="dateTime"><span class="date"> </span><span class="time">16:08:44</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:08:17</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="even dc 27"><td class="dateTime"><span class="date"> </span><span class="time">16:17:02</span></td><td class="state">

        Active

      </td><td class="hms">0:16:09</td><td class="percent">6 %

        </td><td class="mw">2,410 mWh

        </td></tr><tr class="odd dc 28"><td class="dateTime"><span class="date"> </span><span class="time">16:33:11</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:07:22</td><td class="percent">1 %

        </td><td class="mw">280 mWh

        </td></tr><tr class="even dc 29"><td class="dateTime"><span class="date"> </span><span class="time">16:40:33</span></td><td class="state">

        Active

      </td><td class="hms">0:00:52</td><td class="nullValue">-</td><td class="mw">110 mWh

        </td></tr><tr class="odd dc 30"><td class="dateTime"><span class="date"> </span><span class="time">16:41:25</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:04:30</td><td class="nullValue">-</td><td class="mw">170 mWh

        </td></tr><tr class="even dc 31"><td class="dateTime"><span class="date"> </span><span class="time">16:45:56</span></td><td class="state">

        Active

      </td><td class="hms">0:25:13</td><td class="percent">7 %

        </td><td class="mw">2,970 mWh

        </td></tr><tr class="odd dc 32"><td class="dateTime"><span class="date"> </span><span class="time">17:11:09</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:01:24</td><td class="nullValue">-</td><td class="mw">70 mWh

        </td></tr><tr class="even dc 33"><td class="dateTime"><span class="date"> </span><span class="time">17:12:34</span></td><td class="state">

        Active

      </td><td class="hms">0:01:01</td><td class="nullValue">-</td><td class="mw">130 mWh

        </td></tr><tr class="odd dc 34"><td class="dateTime"><span class="date"> </span><span class="time">17:13:36</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:09:26</td><td class="percent">1 %

        </td><td class="mw">350 mWh

        </td></tr><tr class="even dc 35"><td class="dateTime"><span class="date"> </span><span class="time">17:23:02</span></td><td class="state">

        Active

      </td><td class="hms">0:05:07</td><td class="percent">1 %

        </td><td class="mw">480 mWh

        </td></tr><tr class="odd dc 36"><td class="dateTime"><span class="date"> </span><span class="time">17:28:10</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:03:12</td><td class="nullValue">-</td><td class="mw">120 mWh

        </td></tr><tr class="even dc 37"><td class="dateTime"><span class="date"> </span><span class="time">17:31:23</span></td><td class="state">

        Active

      </td><td class="hms">0:05:04</td><td class="percent">1 %

        </td><td class="mw">500 mWh

        </td></tr><tr class="odd dc 38"><td class="dateTime"><span class="date"> </span><span class="time">17:36:27</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:08:53</td><td class="percent">1 %

        </td><td class="mw">300 mWh

        </td></tr><tr class="even dc 39"><td class="dateTime"><span class="date"> </span><span class="time">17:45:21</span></td><td class="state">

        Active

      </td><td class="hms">0:06:40</td><td class="percent">2 %

        </td><td class="mw">670 mWh

        </td></tr><tr class="odd dc 40"><td class="dateTime"><span class="date"> </span><span class="time">17:52:02</span></td><td class="state">

            Connected standby

          </td><td class="hms">5:59:59</td><td class="percent">3 %

        </td><td class="mw">1,170 mWh

        </td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="even dc 41"><td class="dateTime"><span class="date">2019-07-02 </span><span class="time">11:27:14</span></td><td class="state">

        Active

      </td><td class="hms">0:11:30</td><td class="percent">4 %

        </td><td class="mw">1,820 mWh

        </td></tr><tr class="odd dc 42"><td class="dateTime"><span class="date"> </span><span class="time">11:38:44</span></td><td class="state">

            Connected standby

          </td><td class="hms">3:45:06</td><td class="percent">1 %

        </td><td class="mw">500 mWh

        </td></tr><tr class="even dc 43"><td class="dateTime"><span class="date"> </span><span class="time">15:23:50</span></td><td class="state">

        Active

      </td><td class="hms">0:19:43</td><td class="percent">5 %

        </td><td class="mw">2,010 mWh

        </td></tr><tr class="odd dc 44"><td class="dateTime"><span class="date"> </span><span class="time">15:43:33</span></td><td class="state">

            Connected standby

          </td><td class="hms">6:19:34</td><td class="percent">4 %

        </td><td class="mw">1,510 mWh

        </td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="even dc 45"><td class="dateTime"><span class="date">2019-07-03 </span><span class="time">10:07:56</span></td><td class="state">

        Active

      </td><td class="hms">2:27:56</td><td class="percent">53 %

        </td><td class="mw">21,760 mWh

        </td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="odd dc 46"><td class="dateTime"><span class="date"> </span><span class="time">12:36:01</span></td><td class="state">

        Active

      </td><td class="hms">0:00:01</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="even dc 47"><td class="dateTime"><span class="date"> </span><span class="time">12:36:03</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:00:00</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="odd dc 48"><td class="dateTime"><span class="date"> </span><span class="time">12:37:20</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:00:25</td><td class="nullValue">-</td><td class="mw">-10 mWh

        </td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="even dc 49"><td class="dateTime"><span class="date"> </span><span class="time">12:37:46</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:00:08</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="odd dc 50"><td class="dateTime"><span class="date"> </span><span class="time">12:37:55</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:00:01</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="even dc 51"><td class="dateTime"><span class="date"> </span><span class="time">12:37:57</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:00:12</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="odd dc 52"><td class="dateTime"><span class="date"> </span><span class="time">12:38:48</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:00:01</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="even dc 53"><td class="dateTime"><span class="date"> </span><span class="time">12:38:49</span></td><td class="state">

        Active

      </td><td class="hms">0:00:05</td><td class="nullValue">-</td><td class="mw">-10 mWh

        </td></tr><tr class="odd dc 54"><td class="dateTime"><span class="date"> </span><span class="time">12:38:55</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:00:05</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="even dc 55"><td class="dateTime"><span class="date"> </span><span class="time">12:41:22</span></td><td class="state">

        Active

      </td><td class="hms">0:00:00</td><td class="nullValue">-</td><td class="mw">-10 mWh

        </td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="odd dc 56"><td class="dateTime"><span class="date"> </span><span class="time">12:45:10</span></td><td class="state">

        Active

      </td><td class="hms">0:08:24</td><td class="percent">2 %

        </td><td class="mw">730 mWh

        </td></tr><tr class="even dc 57"><td class="dateTime"><span class="date"> </span><span class="time">12:53:35</span></td><td class="state">

            Connected standby

          </td><td class="hms">0:42:26</td><td class="percent">3 %

        </td><td class="mw">1,420 mWh

        </td></tr><tr class="odd dc 58"><td class="dateTime"><span class="date"> </span><span class="time">13:36:02</span></td><td class="state">

        Active

      </td><td class="hms">0:04:47</td><td class="percent">1 %

        </td><td class="mw">420 mWh

        </td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="even dc 59"><td class="dateTime"><span class="date"> </span><span class="time">13:40:50</span></td><td class="state">

        Active

      </td><td class="hms">0:00:00</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="odd dc 60"><td class="dateTime"><span class="date"> </span><span class="time">13:40:52</span></td><td class="state">

        Active

      </td><td class="hms">0:00:20</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="even dc 61"><td class="dateTime"><span class="date"> </span><span class="time">13:41:14</span></td><td class="state">

        Active

      </td><td class="hms">0:00:00</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="odd dc 62"><td class="dateTime"><span class="date"> </span><span class="time">13:41:15</span></td><td class="state">

        Active

      </td><td class="hms">0:00:02</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="even dc 63"><td class="dateTime"><span class="date"> </span><span class="time">15:15:06</span></td><td class="state">

        Active

      </td><td class="hms">0:00:14</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="odd dc 64"><td class="dateTime"><span class="date"> </span><span class="time">15:15:22</span></td><td class="state">

        Active

      </td><td class="hms">0:00:01</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="even dc 65"><td class="dateTime"><span class="date"> </span><span class="time">16:11:29</span></td><td class="state">

        Active

      </td><td class="hms">0:00:00</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="odd dc 66"><td class="dateTime"><span class="date"> </span><span class="time">16:11:33</span></td><td class="state">

        Active

      </td><td class="hms">0:00:00</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="even dc 67"><td class="dateTime"><span class="date"> </span><span class="time">16:11:37</span></td><td class="state">

        Active

      </td><td class="hms">0:00:01</td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="noncontigbreak"><td colspan="5"> </td></tr><tr class="odd dc 68"><td class="dateTime"><span class="date"> </span><span class="time">16:25:43</span></td><td class="state">

        Active

      </td><td class="hms">0:06:09</td><td class="nullValue">-</td><td class="mw">-1,140 mWh

        </td></tr></table><h2>

      Usage history

    </h2><div class="explanation2">

      History of system usage on AC and battery

    </div><table><colgroup><col/><col class="col2"/><col style="width: 10em;"/><col style=""/><col style="width: 10em;"/><col style="width: 10em;"/><col style=""/></colgroup><thead><tr><td> </td><td colspan="2" class="centered">

            BATTERY DURATION

          </td><td class="colBreak"> </td><td colspan="3" class="centered">

            AC DURATION

          </td></tr><tr><td>

            PERIOD

          </td><td class="centered">

            ACTIVE

          </td><td class="centered">

            CONNECTED STANDBY

          </td><td class="colBreak"> </td><td class="centered">

            ACTIVE

          </td><td class="centered">

            CONNECTED STANDBY

          </td></tr></thead><tr class="even  1"><td class="dateTime">2019-05-05

      - 2019-05-12</td><td class="hms">22:37:29</td><td class="hms">69:13:10</td><td class="colBreak"> </td><td class="hms">5:39:59</td><td class="hms">592649:41:26</td></tr><tr class="odd  2"><td class="dateTime">2019-05-12

      - 2019-05-19</td><td class="hms">4:35:01</td><td class="hms">30:04:07</td><td class="colBreak"> </td><td class="hms">0:14:55</td><td class="hms">3:48:03</td></tr><tr class="even  3"><td class="dateTime">2019-05-19

      - 2019-05-26</td><td class="hms">1:45:06</td><td class="hms">20:04:22</td><td class="colBreak"> </td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="odd  4"><td class="dateTime">2019-05-26

      - 2019-06-02</td><td class="hms">1:26:27</td><td class="hms">113:27:30</td><td class="colBreak"> </td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="even  5"><td class="dateTime">2019-06-02

      - 2019-06-09</td><td class="hms">8:22:45</td><td class="hms">41:38:43</td><td class="colBreak"> </td><td class="hms">0:02:50</td><td class="hms">12:36:44</td></tr><tr class="odd  6"><td class="dateTime">2019-06-09

      - 2019-06-16</td><td class="hms">17:01:11</td><td class="hms">47:07:55</td><td class="colBreak"> </td><td class="hms">2:41:36</td><td class="hms">11:16:42</td></tr><tr class="even  7"><td class="dateTime">2019-06-16

      - 2019-06-23</td><td class="hms">32:34:17</td><td class="hms">50:37:42</td><td class="colBreak"> </td><td class="hms">3:27:12</td><td class="hms">16:43:40</td></tr><tr class="odd  8"><td class="dateTime">2019-06-23</td><td class="hms">4:06:13</td><td class="hms">6:58:47</td><td class="colBreak"> </td><td class="hms">0:12:24</td><td class="hms">4:45:58</td></tr><tr class="even  9"><td class="dateTime">2019-06-24</td><td class="hms">4:56:05</td><td class="hms">11:02:46</td><td class="colBreak"> </td><td class="hms">1:03:38</td><td class="hms">1:29:10</td></tr><tr class="odd  10"><td class="dateTime">2019-06-25</td><td class="hms">2:15:01</td><td class="hms">7:54:57</td><td class="colBreak"> </td><td class="nullValue">-</td><td class="nullValue">-</td></tr><tr class="even  11"><td class="dateTime">2019-06-26</td><td class="hms">2:01:05</td><td class="hms">1:26:42</td><td class="colBreak"> </td><td class="hms">2:52:01</td><td class="hms">0:04:30</td></tr><tr class="odd  12"><td class="dateTime">2019-06-27</td><td class="hms">5:06:50</td><td class="hms">4:18:16</td><td class="colBreak"> </td><td class="hms">0:21:05</td><td class="hms">6:23:58</td></tr><tr class="even  13"><td class="dateTime">2019-06-28</td><td class="hms">1:51:58</td><td class="hms">10:26:21</td><td class="colBreak"> </td><td class="nullValue">-</td><td class="hms">1:35:16</td></tr><tr class="odd  14"><td class="dateTime">2019-06-29</td><td class="hms">3:00:14</td><td class="hms">17:35:05</td><td class="colBreak"> </td><td class="hms">3:19:13</td><td class="nullValue">-</td></tr><tr class="even  15"><td class="dateTime">2019-06-30</td><td class="hms">4:54:03</td><td class="hms">14:42:12</td><td class="colBreak"> </td><td class="hms">2:54:39</td><td class="hms">1:18:21</td></tr><tr class="odd  16"><td class="dateTime">2019-07-01</td><td class="hms">2:43:27</td><td class="hms">19:10:12</td><td class="colBreak"> </td><td class="hms">1:55:35</td><td class="hms">0:01:40</td></tr><tr class="even  17"><td class="dateTime">2019-07-02</td><td class="hms">0:31:10</td><td class="hms">10:04:38</td><td class="colBreak"> </td><td class="nullValue">-</td><td class="nullValue">-</td></tr></table><h2>

      Battery capacity history

    </h2><div class="explanation">

      Charge capacity history of the system's batteries

    </div><table><colgroup><col/><col class="col2"/><col style="width: 10em;"/></colgroup><thead><tr><td><span>PERIOD</span></td><td class="centered">

            FULL CHARGE CAPACITY

          </td><td class="centered">

            DESIGN CAPACITY

          </td></tr></thead><tr class="even  1"><td class="dateTime">2019-05-05

      - 2019-05-12</td><td class="mw">42,239 mWh

        </td><td class="mw">45,000 mWh

        </td></tr><tr class="odd  2"><td class="dateTime">2019-05-12

      - 2019-05-19</td><td class="mw">42,118 mWh

        </td><td class="mw">45,000 mWh

        </td></tr><tr class="even  3"><td class="dateTime">2019-05-19

      - 2019-05-26</td><td class="mw">41,922 mWh

        </td><td class="mw">45,000 mWh

        </td></tr><tr class="odd  4"><td class="dateTime">2019-05-26

      - 2019-06-02</td><td class="mw">41,630 mWh

        </td><td class="mw">45,000 mWh

        </td></tr><tr class="even  5"><td class="dateTime">2019-06-02

      - 2019-06-09</td><td class="mw">42,621 mWh

        </td><td class="mw">45,000 mWh

        </td></tr><tr class="odd  6"><td class="dateTime">2019-06-09

      - 2019-06-16</td><td class="mw">43,099 mWh

        </td><td class="mw">45,000 mWh

        </td></tr><tr class="even  7"><td class="dateTime">2019-06-16

      - 2019-06-23</td><td class="mw">42,510 mWh

        </td><td class="mw">45,000 mWh

        </td></tr><tr class="odd  8"><td class="dateTime">2019-06-23</td><td class="mw">42,510 mWh

        </td><td class="mw">45,000 mWh

        </td></tr><tr class="even  9"><td class="dateTime">2019-06-24</td><td class="mw">42,302 mWh

        </td><td class="mw">45,000 mWh

        </td></tr><tr class="odd  10"><td class="dateTime">2019-06-25</td><td class="mw">41,721 mWh

        </td><td class="mw">45,000 mWh

        </td></tr><tr class="even  11"><td class="dateTime">2019-06-26</td><td class="mw">41,718 mWh

        </td><td class="mw">45,000 mWh

        </td></tr><tr class="odd  12"><td class="dateTime">2019-06-27</td><td class="mw">41,740 mWh

        </td><td class="mw">45,000 mWh

        </td></tr><tr class="even  13"><td class="dateTime">2019-06-28</td><td class="mw">41,760 mWh

        </td><td class="mw">45,000 mWh

        </td></tr><tr class="odd  14"><td class="dateTime">2019-06-29</td><td class="mw">41,760 mWh

        </td><td class="mw">45,000 mWh

        </td></tr><tr class="even  15"><td class="dateTime">2019-06-30</td><td class="mw">41,418 mWh

        </td><td class="mw">45,000 mWh

        </td></tr><tr class="odd  16"><td class="dateTime">2019-07-01</td><td class="mw">40,940 mWh

        </td><td class="mw">45,000 mWh

        </td></tr><tr class="even  17"><td class="dateTime">2019-07-02</td><td class="mw">40,940 mWh

        </td><td class="mw">45,000 mWh

        </td></tr></table><h2>

      Battery life estimates

    </h2><div class="explanation2">

      Battery life estimates based on observed drains

    </div><table><colgroup><col/><col class="col2"/><col style="width: 10em;"/><col style=""/><col style="width: 10em;"/><col style="width: 10em;"/><col style="width: 10em;"/></colgroup><thead><tr class="rowHeader"><td> </td><td colspan="2" class="centered">

            AT FULL CHARGE

          </td><td class="colBreak"> </td><td colspan="2" class="centered">

            AT DESIGN CAPACITY

          </td></tr><tr class="rowHeader"><td>

            PERIOD

          </td><td class="centered"><span>ACTIVE</span></td><td class="centered"><span>CONNECTED STANDBY</span></td><td class="colBreak"> </td><td class="centered"><span>ACTIVE</span></td><td class="centered"><span>CONNECTED STANDBY</span></td></tr></thead><tr style="vertical-align:top" class="even  1"><td class="dateTime">2019-05-05

      - 2019-05-12</td><td class="hms">4:33:07</td><td class="hms"><div style="height:1em;">151:29:24</div><span style="font-size:9pt; ">11 %

      

              / 16 h

            </span></td><td class="colBreak"> </td><td class="hms">4:50:58</td><td class="hms"><div style="height:1em;">161:23:32</div><span style="font-size:9pt; ">10 %

      

              / 16 h

            </span></td></tr><tr style="vertical-align:top" class="odd  2"><td class="dateTime">2019-05-12

      - 2019-05-19</td><td class="hms">6:25:58</td><td class="hms"><div style="height:1em;">216:51:15</div><span style="font-size:9pt; ">7 %

      

              / 16 h

            </span></td><td class="colBreak"> </td><td class="hms">6:52:23</td><td class="hms"><div style="height:1em;">231:41:35</div><span style="font-size:9pt; ">7 %

      

              / 16 h

            </span></td></tr><tr style="vertical-align:top" class="even  3"><td class="dateTime">2019-05-19

      - 2019-05-26</td><td class="hms">6:43:50</td><td class="hms"><div style="height:1em;">289:10:19</div><span style="font-size:9pt; ">6 %

      

              / 16 h

            </span></td><td class="colBreak"> </td><td class="hms">7:13:30</td><td class="hms"><div style="height:1em;">310:24:13</div><span style="font-size:9pt; ">5 %

      

              / 16 h

            </span></td></tr><tr style="vertical-align:top" class="odd  4"><td class="dateTime">2019-05-26

      - 2019-06-02</td><td class="hms">5:22:11</td><td class="hms"><div style="height:1em;">7113:21:32</div><span style="font-size:9pt; ">-

              / 16 h

            </span></td><td class="colBreak"> </td><td class="hms">5:48:16</td><td class="hms"><div style="height:1em;">7689:11:39</div><span style="font-size:9pt; ">-

              / 16 h

            </span></td></tr><tr style="vertical-align:top" class="even  5"><td class="dateTime">2019-06-02

      - 2019-06-09</td><td class="hms">7:03:33</td><td class="hms"><div style="height:1em;">0:00:01</div><span style="font-size:9pt; ">5760000 %

      

              / 16 h

            </span></td><td class="colBreak"> </td><td class="hms">7:27:11</td><td class="hms"><div style="height:1em;">0:00:01</div><span style="font-size:9pt; ">5760000 %

      

              / 16 h

            </span></td></tr><tr style="vertical-align:top" class="odd  6"><td class="dateTime">2019-06-09

      - 2019-06-16</td><td class="hms">7:07:10</td><td class="hms"><div style="height:1em;">117:25:06</div><span style="font-size:9pt; ">14 %

      

              / 16 h

            </span></td><td class="colBreak"> </td><td class="hms">7:26:01</td><td class="hms"><div style="height:1em;">122:35:51</div><span style="font-size:9pt; ">13 %

      

              / 16 h

            </span></td></tr><tr style="vertical-align:top" class="even  7"><td class="dateTime">2019-06-16

      - 2019-06-23</td><td class="hms">7:07:01</td><td class="hms"><div style="height:1em;">106:48:34</div><span style="font-size:9pt; ">15 %

      

              / 16 h

            </span></td><td class="colBreak"> </td><td class="hms">7:32:01</td><td class="hms"><div style="height:1em;">113:03:56</div><span style="font-size:9pt; ">14 %

      

              / 16 h

            </span></td></tr><tr style="vertical-align:top" class="odd  8"><td class="dateTime">2019-06-23</td><td class="hms">6:36:54</td><td class="hms"><div style="height:1em;">128:00:06</div><span style="font-size:9pt; ">12 %

      

              / 16 h

            </span></td><td class="colBreak"> </td><td class="hms">7:00:09</td><td class="hms"><div style="height:1em;">135:29:57</div><span style="font-size:9pt; ">12 %

      

              / 16 h

            </span></td></tr><tr style="vertical-align:top" class="even  9"><td class="dateTime">2019-06-24</td><td class="hms">6:38:14</td><td class="hms"><div style="height:1em;">72:16:38</div><span style="font-size:9pt; ">22 %

      

              / 16 h

            </span></td><td class="colBreak"> </td><td class="hms">7:03:38</td><td class="hms"><div style="height:1em;">76:53:13</div><span style="font-size:9pt; ">21 %

      

              / 16 h

            </span></td></tr><tr style="vertical-align:top" class="odd  10"><td class="dateTime">2019-06-25</td><td class="hms">5:46:26</td><td class="hms"><div style="height:1em;">286:40:51</div><span style="font-size:9pt; ">6 %

      

              / 16 h

            </span></td><td class="colBreak"> </td><td class="hms">6:13:39</td><td class="hms"><div style="height:1em;">309:12:44</div><span style="font-size:9pt; ">5 %

      

              / 16 h

            </span></td></tr><tr style="vertical-align:top" class="even  11"><td class="dateTime">2019-06-26</td><td class="hms">4:23:54</td><td class="hms"><div style="height:1em;">34:56:46</div><span style="font-size:9pt; ">46 %

      

              / 16 h

            </span></td><td class="colBreak"> </td><td class="hms">4:44:40</td><td class="hms"><div style="height:1em;">37:41:44</div><span style="font-size:9pt; ">42 %

      

              / 16 h

            </span></td></tr><tr style="vertical-align:top" class="odd  12"><td class="dateTime">2019-06-27</td><td class="hms">5:56:32</td><td class="hms"><div style="height:1em;">926:07:16</div><span style="font-size:9pt; ">2 %

      

              / 16 h

            </span></td><td class="colBreak"> </td><td class="hms">6:24:23</td><td class="hms"><div style="height:1em;">998:27:12</div><span style="font-size:9pt; ">2 %

      

              / 16 h

            </span></td></tr><tr style="vertical-align:top" class="even  13"><td class="dateTime">2019-06-28</td><td class="hms">6:16:09</td><td class="hms"><div style="height:1em;">155:51:34</div><span style="font-size:9pt; ">10 %

      

              / 16 h

            </span></td><td class="colBreak"> </td><td class="hms">6:45:20</td><td class="hms"><div style="height:1em;">167:57:08</div><span style="font-size:9pt; ">10 %

      

              / 16 h

            </span></td></tr><tr style="vertical-align:top" class="odd  14"><td class="dateTime">2019-06-29</td><td class="hms">7:15:18</td><td class="hms"><div style="height:1em;">225:11:16</div><span style="font-size:9pt; ">7 %

      

              / 16 h

            </span></td><td class="colBreak"> </td><td class="hms">7:49:05</td><td class="hms"><div style="height:1em;">242:39:34</div><span style="font-size:9pt; ">7 %

      

              / 16 h

            </span></td></tr><tr style="vertical-align:top" class="even  15"><td class="dateTime">2019-06-30</td><td class="hms">6:28:06</td><td class="hms"><div style="height:1em;">467:00:40</div><span style="font-size:9pt; ">3 %

      

              / 16 h

            </span></td><td class="colBreak"> </td><td class="hms">7:01:40</td><td class="hms"><div style="height:1em;">507:24:01</div><span style="font-size:9pt; ">3 %

      

              / 16 h

            </span></td></tr><tr style="vertical-align:top" class="odd  16"><td class="dateTime">2019-07-01</td><td class="hms">6:38:32</td><td class="hms"><div style="height:1em;">201:32:45</div><span style="font-size:9pt; ">8 %

      

              / 16 h

            </span></td><td class="colBreak"> </td><td class="hms">7:18:04</td><td class="hms"><div style="height:1em;">221:31:59</div><span style="font-size:9pt; ">7 %

      

              / 16 h

            </span></td></tr><tr style="vertical-align:top" class="even  17"><td class="dateTime">2019-07-02</td><td class="hms">5:33:08</td><td class="hms"><div style="height:1em;">205:15:16</div><span style="font-size:9pt; ">8 %

      

              / 16 h

            </span></td><td class="colBreak"> </td><td class="hms">6:06:11</td><td class="hms"><div style="height:1em;">225:36:34</div><span style="font-size:9pt; ">7 %

      

              / 16 h

            </span></td></tr></table><div class="explanation2" style="margin-top: 1em; margin-bottom: 0.4em;">

      Current estimate of battery life based on all observed drains since OS install

    </div><table><colgroup><col/><col class="col2"/><col style="width: 10em;"/><col style=""/><col style="width: 10em;"/><col style="width: 10em;"/><col style="width: 10em;"/></colgroup><tr class="even" style="vertical-align:top"><td>

          Since OS install

        </td><td class="hms">5:58:26</td><td class="hms"><div style="height:1em;">263:53:21</div><span style="font-size:9pt; ">6 %

      

                / 16 h

              </span></td><td class="colBreak"> </td><td class="hms">6:33:59</td><td class="hms"><div style="height:1em;">290:03:32</div><span style="font-size:9pt; ">6 %

      

                / 16 h

              </span></td></tr></table><br/><br/><br/></body></html>
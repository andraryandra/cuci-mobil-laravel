!(function (i) {
    "use strict";
    var e = function () {};
    (e.prototype.respChart = function (e, r, a, o) {
        var t = e.get(0).getContext("2d"),
            n = i(e).parent();
        function s() {
            e.attr("width", i(n).width());
            switch (r) {
                case "Line":
                    new Chart(t, { type: "line", data: a, options: o });
                    break;
                case "Doughnut":
                    new Chart(t, { type: "doughnut", data: a, options: o });
                    break;
                case "Pie":
                    new Chart(t, { type: "pie", data: a, options: o });
                    break;
                case "Bar":
                    new Chart(t, { type: "bar", data: a, options: o });
                    break;
                case "Radar":
                    new Chart(t, { type: "radar", data: a, options: o });
                    break;
                case "PolarArea":
                    new Chart(t, { data: a, type: "polarArea", options: o });
            }
        }
        i(window).resize(s), s();
    }),
        (e.prototype.init = function () {
            this.respChart(
                i("#lineChart"),
                "Line",
                {
                    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October"],
                    datasets: [
                        { label: "Conversion Rate", fill: !1, backgroundColor: "#4eb7eb", borderColor: "#4eb7eb", data: [44, 60, -33, 58, -4, 57, -89, 60, -33, 58] },
                        { label: "Average Sale Value", fill: !1, backgroundColor: "#e3eaef", borderColor: "#e3eaef", borderDash: [5, 5], data: [-68, 41, 86, -49, 2, 65, -64, 86, -49, 2] },
                    ],
                },
                {
                    responsive: !0,
                    tooltips: { mode: "index", intersect: !1 },
                    hover: { mode: "nearest", intersect: !0 },
                    scales: { xAxes: [{ display: !0, gridLines: { color: "rgba(0,0,0,0.1)" } }], yAxes: [{ gridLines: { color: "rgba(255,255,255,0.05)", fontColor: "#fff" }, ticks: { max: 100, min: -100, stepSize: 20 } }] },
                }
            );
            this.respChart(i("#doughnut"), "Doughnut", {
                labels: ["Bitcoin", "Ethereum", "Litecoin", "Dashcoin"],
                datasets: [{ data: [80, 50, 100, 121], backgroundColor: ["#f7931a", "#627eea", "#e3eaef", "#1c75bc"], hoverBackgroundColor: ["#02c0ce", "#b2c0f5", "#e3eaef", "#9cc2e2"], hoverBorderColor: "#fff" }],
            });
            this.respChart(i("#pie"), "Pie", {
                labels: ["Desktops", "Tablets", "Mobiles", "Mobiles"],
                datasets: [{ data: [80, 50, 100, 121], backgroundColor: ["#98d4ce", "#bac4d0", "#e3eaef", "#44a2d2"], hoverBackgroundColor: ["#98d4ce", "#bac4d0", "#e3eaef", "#44a2d2"], hoverBorderColor: "#fff" }],
            });
            this.respChart(
                i("#bar"),
                "Bar",
                {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [
                        {
                            label: "Sales Analytics",
                            backgroundColor: "rgba(68, 162, 210, 0.4)",
                            borderColor: "#44a2d2",
                            borderWidth: 2,
                            barPercentage: 0.3,
                            categoryPercentage: 0.5,
                            hoverBackgroundColor: "rgba(68, 162, 210, 0.7)",
                            hoverBorderColor: "#44a2d2",
                            data: [65, 59, 80, 81, 56, 55, 40, 20],
                        },
                    ],
                },
                { responsive: !0, scales: { xAxes: [{ barPercentage: 0.8, categoryPercentage: 0.4, display: !0 }] } }
            );
            this.respChart(i("#radar"), "Radar", {
                labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
                datasets: [
                    {
                        label: "Desktops",
                        backgroundColor: "rgba(152,212,206,0.3)",
                        borderColor: "#98d4ce",
                        pointBackgroundColor: "#038660",
                        pointBorderColor: "#fff",
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "rgba(179,181,198,1)",
                        data: [65, 59, 90, 81, 56, 55, 40],
                    },
                    {
                        label: "Tablets",
                        backgroundColor: "rgba(21,128,196,0.2)",
                        borderColor: "#1580c4",
                        pointBackgroundColor: "#095d88",
                        pointBorderColor: "#fff",
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "rgba(255,99,132,1)",
                        data: [28, 48, 40, 19, 96, 27, 100],
                    },
                ],
            });
            this.respChart(i("#polarArea"), "PolarArea", {
                datasets: [{ data: [11, 16, 7, 18], backgroundColor: ["#1580c4", "#162546", "#ebeff2", "#ea3c75"], label: "My dataset", hoverBorderColor: "#fff" }],
                labels: ["Series 1", "Series 2", "Series 3", "Series 4"],
            });
        }),
        (i.ChartJs = new e()),
        (i.ChartJs.Constructor = e);
})(window.jQuery),
    (function (e) {
        "use strict";
        window.jQuery.ChartJs.init();
    })();
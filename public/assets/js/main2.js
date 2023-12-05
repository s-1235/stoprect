AOS.init({
  once: true,
  duration: 750,
})

// Intro Swiper
const introSwiper = new Swiper('.intro__swiper', {
  allowTouchMove: false,
  loop: true,
  direction: "vertical",
  speed: 750,
  autoplay: {
    delay: 4000,
  },
  effect: "cube",
  cubeEffect: {
    shadow: false,
    slideShadows: false,
    shadowOffset: 20,
    shadowScale: 0.94,
  },
});

// Stikcy Header on Scroll
window.onscroll = function() {myFunction()};

const header = document.querySelector(".header");

const sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}

// Change the Plans Prices
const checkbox = document.querySelector("#switch");
const plans = document.querySelectorAll(".plan");
const flashSale = document.querySelector(".plan__flash-sale");
const annualPrices = [49,59,49];
const monthlyPrices = [64,77,89];

checkbox.addEventListener("change", function() {
  plans.forEach((plan, index) => {
    const planPrice = plan.querySelector(".plan__price span");
    if (checkbox.checked) {
      planPrice.innerText = `${monthlyPrices[index]}€`;
      flashSale.querySelector("span").innerText = "89";
      if(index == 2)
      plan.querySelector(".plan__price small").innerText = "260€";
      
    } else {
      planPrice.innerText = `${annualPrices[index]}€`;
      flashSale.querySelector("span").innerText = "79";
      if(index == 2)
      plan.querySelector(".plan__price small").innerText = "200€";

    }
  }) 
})

const sliderSwiper = new Swiper('.slider__swiper', {
  loop: true,
  speed: 1500,
  spaceBetween: 30,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  }, autoplay: {
    delay: 4000,
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true
  },
});

const charts = document.querySelector(".charts");
if (charts) {
  // Gauge Chart Code
  am5.ready(function() {

  var gaugeChart = am5.Root.new("charts__gauge");

  gaugeChart.setThemes([
    am5themes_Animated.new(gaugeChart)
  ]);

  var chart = gaugeChart.container.children.push(am5radar.RadarChart.new(gaugeChart, {
    panX: false,
    panY: false,
    startAngle: 180,
    endAngle: 360
  }));



  var axisRenderer = am5radar.AxisRendererCircular.new(gaugeChart, {
    innerRadius: -20,
    strokeOpacity: 0.1
  });

  axisRenderer.labels.template.set("forceHidden", true);
  axisRenderer.grid.template.set("forceHidden", true);

  var xAxis = chart.xAxes.push(am5xy.ValueAxis.new(gaugeChart, {
    maxDeviation: 0,
    min: 0,
    max: 12,
    strictMinMax: true,
    renderer: axisRenderer
  }));


  var dataItem1 = xAxis.makeDataItem({});
  dataItem1.set("value", 0);
  dataItem1.set("endValue", 2);
  xAxis.createAxisRange(dataItem1);
  dataItem1.get("label").setAll({text: "STRONG BEAR", fontFamily: "Inter", fontSize: "0.6495rem", fontWeight: 500, forceHidden:false});
  dataItem1.get("axisFill").setAll({visible:true, fillOpacity:1, fill: "#FF5656"});

  var dataItem2 = xAxis.makeDataItem({});
  dataItem2.set("value", 2);
  dataItem2.set("endValue", 4);
  xAxis.createAxisRange(dataItem2);
  dataItem2.get("label").setAll({text: "BEAR", fontFamily: "Inter", fontSize: "0.6495rem", fontWeight: 500, forceHidden:false});
  dataItem2.get("axisFill").setAll({visible:true, fillOpacity:1, fill: "#F88"});

  var dataItem3 = xAxis.makeDataItem({});
  dataItem3.set("value", 4);
  dataItem3.set("endValue", 6);
  xAxis.createAxisRange(dataItem3);
  dataItem3.get("label").setAll({text: "BEARISH", fontFamily: "Inter", fontSize: "0.6495rem", fontWeight: 500, forceHidden:false});
  dataItem3.get("axisFill").setAll({visible:true, fillOpacity:1, fill: "#FEE114"});

  var dataItem4 = xAxis.makeDataItem({});
  dataItem4.set("value", 6);
  dataItem4.set("endValue", 8);
  xAxis.createAxisRange(dataItem4);
  dataItem4.get("label").setAll({text: "BULLISH", fontFamily: "Inter", fontSize: "0.6495rem", fontWeight: 500, forceHidden:false});
  dataItem4.get("axisFill").setAll({visible:true, fillOpacity:1, fill: "#D1D80F"});

  var dataItem5 = xAxis.makeDataItem({});
  dataItem5.set("value", 8);
  dataItem5.set("endValue", 10);
  xAxis.createAxisRange(dataItem5);
  dataItem5.get("label").setAll({text: "BULL", fontFamily: "Inter", fontSize: "0.6495rem", fontWeight: 500, forceHidden:false});
  dataItem5.get("axisFill").setAll({visible:true, fillOpacity:1, fill: "#84BD32"});

  var dataItem6 = xAxis.makeDataItem({});
  dataItem6.set("value", 10);
  dataItem6.set("endValue", 12);
  xAxis.createAxisRange(dataItem6);
  dataItem6.get("label").setAll({text: "STONG BULL", fontFamily: "Inter", fontSize: "0.6495rem", fontWeight: 500, forceHidden:false});
  dataItem6.get("axisFill").setAll({visible:true, fillOpacity:1, fill: "#30AD43"});

  var axisDataItem = xAxis.makeDataItem({});
  axisDataItem.set("value", 7);

  var bullet = axisDataItem.set("bullet", am5xy.AxisBullet.new(gaugeChart, {
    sprite: am5radar.ClockHand.new(gaugeChart, {
      radius: am5.percent(99)
    })
  }));
  xAxis.createAxisRange(axisDataItem);
  axisDataItem.get("grid").set("visible", false);
  }); 

  // Graph Chart Code
  const ctx = document.getElementById('charts__graph');

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      datasets: [
        {
          label: "Statistic",
          pointRadius: 0,
          fill: true,
          lineTension: 0.5,
          backgroundColor: "rgba(228, 106, 17, 0.05)",
          borderColor: "rgb(228, 106, 17)",
          data: [800, 780, 685, 790, 900, 650, 400, 390, 450, 930, 1150, 1360],
        },
        {
          label: "Statistic",
          pointRadius: 0,
          fill: true,
          lineTension: 0.5,
          backgroundColor: "rgba(92, 89, 232, 0.05)",
          borderColor: "rgb(92, 89, 232)",
          data: [1360, 1150, 930, 450, 390, 400, 350, 500, 450, 685, 780, 800],
        }
      ]
    },
    options: {
      plugins: {
        legend: {
          display: false
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
                callback: function(value, index, ticks) {
                    return value >= 1000 ? `$${value / 1000}K` : `$${value}`
                }
          }
        },
      },
    }
  });
}



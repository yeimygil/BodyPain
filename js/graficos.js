const d = document;
d.addEventListener("DOMContentLoaded", (e) => {
  console.log("holi");
  /* d.addEventListener("click", (e) => {
    console.log(e.target);
    if (e.target.matches(".botoncito")) {
      crearGrafico([
        { x: "hola", y: 20 },
        { x: "como", y: 10 },
      ]);
    }
  }); */
});

const crearGrafico = (dataPoints) => {
  var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light2", // "light1", "light2", "dark1", "dark2"
    title: {
      text: "Top 10 Google Play Categories - till 2017",
    },
    axisY: {
      title: "Number of Apps",
    },
    data: [
      {
        type: "column",
        dataPoints: dataPoints,
      },
    ],
  });
  chart.render();
};

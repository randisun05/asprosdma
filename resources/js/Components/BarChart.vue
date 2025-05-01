<template>
    <div>
      <canvas ref="canvas"></canvas>
    </div>
  </template>

  <script>
  import { defineComponent, ref, onMounted } from 'vue';
  import { Chart, BarController, BarElement, CategoryScale, LinearScale, Title, Tooltip, Legend } from 'chart.js';
  import ChartDataLabels from 'chartjs-plugin-datalabels';

  Chart.register(BarController, BarElement, CategoryScale, LinearScale, Title, Tooltip, Legend, ChartDataLabels);

  export default defineComponent({
    name: 'BarChart',
    props: {
      chartData: {
        type: Object,
        required: true,
      },
      chartOptions: {
        type: Object,
        required: true,
      }
    },
    setup(props) {
      const canvas = ref(null);
      let chartInstance = null;

      onMounted(() => {
        if (canvas.value) {
          chartInstance = new Chart(canvas.value, {
            type: 'bar',
            data: props.chartData,
            options: props.chartOptions,
          });
        }
      });

      return {
        canvas
      };
    }
  });
  </script>

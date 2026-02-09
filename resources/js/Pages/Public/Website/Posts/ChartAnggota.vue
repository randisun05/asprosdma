                <template>
                    <section id="chart-anggota">
                        <div class="container-fluid">
                            <div class="row mt-1">
                                <div class="col-md-12">
                                    <div class="card border-0 shadow">
                                        <div ref="reportContent">
                                            <BarChart :chartData="chartDataByMonth" :chartOptions="chartOptions" />
                                            <BarChart :chartData="chartDataByPosition" :chartOptions="chartOptions" />
                                            <BarChart :chartData="chartDataByLevel" :chartOptions="chartOptions" />
                                            <BarChart :chartData="chartDataAccumulated" :chartOptions="chartOptions" />
                                            <BarChart :chartData="accumulatedCountsByPosition" :chartOptions="chartOptions" />
                                            <BarChart :chartData="chartDataByGender" :chartOptions="chartOptions" />
                                            <BarChart :chartData="chartDataByType" :chartOptions="chartOptions" />
                                            <BarChart :chartData="chartDataByRegion" :chartOptions="chartOptions" />

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--Testimonials Ends-->
                </template>

        <script>

        import BarChart from '../../../../Components/BarChart.vue';
        //import reactive
        import {
            reactive, ref
        } from 'vue'

        export default {
            //register component
            components: {
                BarChart
            },

            //props
            props: {

                countsPerMonth: {
                    type: Object,
                    required: true,
                    default: () => ({})
                },
                errors: Object,
                dataCountsByPosition: {
                    type: Object,
                    required: true,
                    default: () => ({})
                },
                dataCountsByLevel: {
                    type: Object,
                    required: true,
                    default: () => ({})
                },
                accumulatedCounts: {
                    type: Object,
                    required: true,
                    default: () => ({})
                },
                accumulatedCountsByPosition: {
                    type: Object,
                    required: true,
                    default: () => ({})
                },
                dataCountsByGender: {
                    type: Object,
                    required: false,
                    default: () => ({})
                },
                dataCountsByType: {
                    type: Object,
                    required: false,
                    default: () => ({})
                },
                dataCountsByRegion: {
                    type: Object,
                    required: false,
                    default: () => ({})
                },
            },

            setup(props) {
                const reportContent = ref(null);
                const chartOptions = reactive({
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        datalabels: {
                            color: '#000', // You can customize the label color
                            anchor: 'end',
                            align: 'end',
                            font: {
                                weight: 'bold',
                                size: 12
                            },
                            formatter(value) {
                                return value; // Show the value directly
                            }
                        }
                    }
                });

                const chartDataByMonth = reactive({
                    labels: Object.keys(props.countsPerMonth).map(key => `${key}`),
                    datasets: [
                        {
                            label: 'Counts By Month',
                            backgroundColor: getRandomColor(),
                            data: Object.values(props.countsPerMonth)
                        }
                    ]
                });

                const chartDataByPosition = reactive({
                    labels: Object.keys(props.dataCountsByPosition).map(key => `${key}`),
                    datasets: [
                        {
                            label: 'Counts By Jabatan',
                            backgroundColor: getRandomColor(),
                            data: Object.values(props.dataCountsByPosition)
                        }
                    ]
                });

                const chartDataByLevel = reactive({
                    labels: Object.keys(props.dataCountsByLevel).map(key => `${key}`),
                    datasets: [
                        {
                            label: 'Counts By Jenjang',
                            backgroundColor: getRandomColor(),
                            data: Object.values(props.dataCountsByLevel)
                        }
                    ]
                });

                const chartDataByGender = reactive({
                    labels: Object.keys(props.dataCountsByGender).map(key => `${key}`),
                    datasets: [
                        {
                            label: 'Counts By Gender',
                            backgroundColor: getRandomColor(),
                            data: Object.values(props.dataCountsByGender)
                        }
                    ]
                });

                const chartDataByType = reactive({
                    labels: Object.keys(props.dataCountsByType).map(key => `${key}`),
                    datasets: [
                        {
                            label: 'Counts By Jenis Instansi',
                            backgroundColor: getRandomColor(),
                            data: Object.values(props.dataCountsByType)
                        }
                    ]
                });

                const chartDataByRegion = reactive({
                    labels: Object.keys(props.dataCountsByRegion).map(key => `${key}`),
                    datasets: [
                        {
                            label: 'Counts By Wilayah',
                            backgroundColor: getRandomColor(),
                            data: Object.values(props.dataCountsByRegion)
                        }
                    ]
                });

                const chartDataAccumulated = reactive({
                    labels: Object.keys(props.accumulatedCounts).map(key => `${key}`),
                    datasets: [
                        {
                            label: 'Accumulation by Month',
                            backgroundColor: getRandomColor(),
                            data: Object.values(props.accumulatedCounts)
                        }
                    ]
                });

                const allMonths = Object.values(props.accumulatedCountsByPosition || {})
                .flatMap(data => Object.keys(data))
                .filter((value, index, self) => self.indexOf(value) === index)
                .sort(); // sort for chronological order


                const accumulatedCountsByPosition = reactive({
                labels: allMonths,
                datasets: Object.entries(props.accumulatedCountsByPosition || {}).map(([position, data]) => ({
                    label: `Monthly ${position} Increase`,                backgroundColor: getRandomColor(), // or choose static colors per position
                    data: allMonths.map(month => data[month] || 0)
                }))
            });

            function getRandomColor() {
                const letters = '0123456789ABCDEF';
                let color = '#';
                for (let i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }


                //return
                return {
                    reportContent,
                    chartDataByPosition,
                    chartDataByLevel,
                    chartDataAccumulated,
                    chartOptions,
                    chartDataByMonth,
                    accumulatedCountsByPosition,
                    chartDataByGender,
                    chartDataByType,
                    chartDataByRegion,
                }
            }
        }

        </script>

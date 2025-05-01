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
                }
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
                            backgroundColor: '#FFA500',
                            data: Object.values(props.countsPerMonth)
                        }
                    ]
                });

                const chartDataByPosition = reactive({
                    labels: Object.keys(props.dataCountsByPosition).map(key => `${key}`),
                    datasets: [
                        {
                            label: 'Counts By Jabatan',
                            backgroundColor: '#f87979',
                            data: Object.values(props.dataCountsByPosition)
                        }
                    ]
                });

                const chartDataByLevel = reactive({
                    labels: Object.keys(props.dataCountsByLevel).map(key => `${key}`),
                    datasets: [
                        {
                            label: 'Counts By Jenjang',
                            backgroundColor: '#7acbf9',
                            data: Object.values(props.dataCountsByLevel)
                        }
                    ]
                });

                const chartDataAccumulated = reactive({
                    labels: Object.keys(props.accumulatedCounts).map(key => `${key}`),
                    datasets: [
                        {
                            label: 'Accumulation by Month',
                            backgroundColor: '#79f879',
                            data: Object.values(props.accumulatedCounts)
                        }
                    ]
                });

                //return
                return {

                    reportContent,
                    chartDataByPosition,
                    chartDataByLevel,
                    chartDataAccumulated,
                    chartOptions,
                    chartDataByMonth,
                }
            }
        }

        </script>

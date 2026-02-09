<template>

<!-- Our Blogs -->
<section id="dashboard" class="container-fluid px-5">
    <div class="container-fluid padding">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-12 col-12 mb-2">
            <h3 class="text-center">DATA MONITORING</h3>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-1">
      <div class="col-md-12">
        <div class="card border-0 shadow">
          <div class="card-body" ref="reportContent">
            <BarChart :chartData="chartRegistration" :chartOptions="chartOptions" />
            <BarChart :chartData="chartPublication" :chartOptions="chartOptions" />
            <h3 class="text-center mt-5">DATA ANGGOTA</h3>
            <BarChart :chartData="chartDataByMonth" :chartOptions="chartOptions" />
            <BarChart :chartData="chartDataByPosition" :chartOptions="chartOptions" />
            <BarChart :chartData="chartDataByLevel" :chartOptions="chartOptions" />
            <BarChart :chartData="chartDataByGender" :chartOptions="chartOptions" />
            <BarChart :chartData="chartDataByType" :chartOptions="chartOptions" />
            <BarChart :chartData="chartDataByRegion" :chartOptions="chartOptions" />
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Our Blogs Ends-->

</template>

<script>
    //import layout Admin
    import LayoutAdmin from '../../../Layouts/Admin.vue';

    import { Head, Link } from '@inertiajs/inertia-vue3';
    import { ref, reactive, onMounted } from 'vue';
    import { Inertia } from '@inertiajs/inertia';
    import Swal from 'sweetalert2';
    import BarChart from '../../../Components/BarChart.vue';
    import html2canvas from 'html2canvas';
    import jsPDF from 'jspdf';


    export default {

        //layout
        layout: LayoutAdmin,

        //register components
        components: {
            Head,
            Link,
            BarChart
        },

        //props
        props: {
            registrationData: {
            type: Object,
            required: true,
            default: () => ({})
            },
            publicationData: {
            type: Object,
            required: true,
            default: () => ({})
            },
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
            dataCountsByGender: {
            type: Object,
            required: true,
            default: () => ({})
            },
            dataCountsByType: {
            type: Object,
            required: true,
            default: () => ({})
            },
            dataCountsByRegion: {
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
            const chartRegistration = reactive({
                labels: Object.keys(props.registrationData).map(key => `${key}`),
                datasets: [
                {
                    label: 'Data Registrasi',
                    backgroundColor: '#DC143C',
                    data: Object.values(props.registrationData)
                }
                ]
            });

            const chartPublication = reactive({
                labels: Object.keys(props.publicationData).map(key => `${key}`),
                datasets: [
                {
                    label: 'Data Publikasi',
                    backgroundColor: '#00008B',
                    data: Object.values(props.publicationData)
                }
                ]
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

            const chartDataByGender = reactive({
                labels: Object.keys(props.dataCountsByGender).map(key => `${key}`),
                datasets: [
                {
                    label: 'Counts By Gender',
                    backgroundColor: ['#36A2EB', '#FF6384'],
                    data: Object.values(props.dataCountsByGender)
                }
                ]
            });

            const chartDataByType = reactive({
                labels: Object.keys(props.dataCountsByType).map(key => `${key}`),
                datasets: [
                {
                    label: 'Counts By Type',
                    backgroundColor: '#FFCE56',
                    data: Object.values(props.dataCountsByType)
                }
                ]
            });

            const chartDataByRegion = reactive({
                labels: Object.keys(props.dataCountsByRegion).map(key => `${key}`),
                datasets: [
                {
                    label: 'Counts By Region',
                    backgroundColor: '#4BC0C0',
                    data: Object.values(props.dataCountsByRegion)
                }
                ]
            });

            const exportToPDF = () => {
            if (reportContent.value) {
                html2canvas(reportContent.value, { scale: 2 }).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const pdf = new jsPDF('p', 'mm', 'a4');

                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = pdf.internal.pageSize.getHeight();

                const imgWidth = canvas.width;
                const imgHeight = canvas.height;

                // Rasio tinggi dan lebar dari gambar yang dihasilkan
                const ratio = imgWidth / imgHeight;

                // Menghitung tinggi gambar dalam PDF berdasarkan lebar halaman PDF
                const pdfImgHeight = pdfWidth / ratio;

                let position = 0;
                let heightLeft = pdfImgHeight;

                if (pdfImgHeight > pdfHeight) {
                    // Gambar lebih tinggi dari satu halaman, bagi ke dalam beberapa halaman
                    while (heightLeft > 0) {
                    pdf.addImage(imgData, 'PNG', 0, position, pdfWidth, pdfImgHeight);
                    heightLeft -= pdfHeight;
                    position -= pdfHeight;

                    // Jika ada sisa konten, tambahkan halaman baru
                    if (heightLeft > 0) {
                        pdf.addPage();
                    }
                    }
                } else {
                    // Jika gambar pas di satu halaman
                    pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfImgHeight);
                }

                pdf.save('report.pdf');
                });
            } else {
                console.error('reportContent is not available');
            }
            };


            return {
                reportContent,
                chartDataByPosition,
                chartDataByLevel,
                chartDataAccumulated,
                chartOptions,
                chartDataByMonth,
                chartRegistration,
                chartPublication,
                chartDataByGender,
                chartDataByType,
                chartDataByRegion,
                exportToPDF

            };
            }
        };

</script>

<style>

</style>

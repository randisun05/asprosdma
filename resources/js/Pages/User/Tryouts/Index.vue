<template>

    <Head>
        <title>Tryouts</title>
    </Head>

    <div class="container-fluid px-5 py-4">

        <!-- SEARCH -->
        <div class="row mb-4">

            <div class="col-md-6">

                <form @submit.prevent>

                    <div class="input-group shadow">

                        <input type="text" class="form-control border-0" v-model="search" placeholder="Cari tryout...">

                        <span class="input-group-text border-0 bg-white">
                            <i class="fa fa-search"></i>
                        </span>

                    </div>

                </form>

            </div>

        </div>


        <!-- TABLE -->

        <div class="card border-0 shadow">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered align-middle">

                        <thead class="text-center">

                            <tr>
                                <th width="60">No</th>
                                <th>Tryout</th>
                                <th width="120">Nilai</th>
                                <th width="140">Status</th>
                                <th width="220">Aksi</th>
                            </tr>

                        </thead>

                        <tbody>

                            <tr v-for="(data, index) in filteredEvents" :key="data.id">

                                <td class="text-center">
                                    {{ index + 1 }}
                                </td>

                                <td>
                                    {{ data.event.title }}
                                </td>

                                <td class="text-center">

                                    <span v-if="data.grade">
                                        {{ data.grade }}
                                    </span>

                                    <span v-else>-</span>

                                </td>

                                <td class="text-center">
                                    <span v-if="data.end_at" class="badge bg-success">
                                        Selesai
                                    </span>

                                    <span v-else-if="isRunning(data.event)" class="badge bg-primary">
                                        Berlangsung
                                    </span>

                                    <span v-else-if="isNotStarted(data.event)" class="badge bg-secondary">
                                        Belum Mulai
                                    </span>

                                     <span v-else-if="data.event.status == 'closed'" class="badge bg-primary">
                                        Selesai
                                    </span>

                                    <span v-else class="badge bg-danger">
                                        Terlewat
                                    </span>

                                     <a v-if="data.event.category === 'Tryout'"  :href="`/events/${data.event.slug}/dashboard`" class="badge bg-primary">
                                       Dashboard
                                    </a>

                                </td>


                                <td class="text-center">


                                    <!-- SUDAH SELESAI -->
                                    <button v-if="data.end_at" class="btn btn-danger btn-sm w-100" disabled>
                                        Sudah Dikerjakan
                                    </button>


                                    <!-- UJIAN BERLANGSUNG -->

                                    <template v-else-if="isRunning(data.event)">

                                        <Link v-if="!data.start_at" :href="`/user/tryout-confirmation/${data.id}`"
                                            class="btn btn-success btn-sm w-100">

                                        Kerjakan

                                        </Link>

                                        <Link v-else :href="`/user/tryout/${data.id}/1`"
                                            class="btn btn-info btn-sm w-100">

                                        Lanjutkan

                                        </Link>

                                    </template>


                                    <!-- BELUM MULAI -->

                                    <button v-else-if="isNotStarted(data.event)" class="btn btn-secondary btn-sm w-100"
                                        disabled>

                                        Belum Mulai

                                    </button>


                                    <!-- TERLEWAT -->

                                    <button v-else class="btn btn-dark btn-sm w-100" disabled>

                                        Waktu Terlewat

                                    </button>


                                </td>

                            </tr>

                            <tr v-if="filteredEvents.length == 0">

                                <td colspan="5" class="text-center py-4">

                                    Tidak ada tryout

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</template>


<script>

import LayoutUser from "../../../Layouts/User.vue"
import { Head, Link } from '@inertiajs/inertia-vue3'
import { ref, computed } from "vue"

export default {

    layout: LayoutUser,

    components: {
        Head,
        Link
    },

    props: {
        detail_events: Array
    },

    setup(props) {

        const search = ref("")


        /*
        FILTER SEARCH
        */

        const filteredEvents = computed(() => {

            if (!search.value) return props.detail_events

            return props.detail_events.filter(e =>
                e.event.title.toLowerCase().includes(search.value.toLowerCase())
            )

        })


        /*
        FORMAT DATETIME MYSQL
        2026-03-10 23:17:39
        */

        const parseDate = (datetime) => {

            return datetime
                ? new Date(datetime.replace(' ', 'T'))
                : null

        }


        const now = () => new Date()


        /*
        UJIAN BERLANGSUNG
        */

        const isRunning = (event) => {

            const start = parseDate(event.start_at)
            const end = parseDate(event.end_at)

            if (!start || !end) return false

            const now = new Date()

            return now >= start && now <= end
        }


        /*
        BELUM MULAI
        */

        const isNotStarted = (event) => {

            const start = parseDate(event.start_at)

            if (!start) return false

            return new Date() < start
        }


        return {

            search,
            filteredEvents,
            isRunning,
            isNotStarted

        }

    }

}

</script>

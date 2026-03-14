<template>

    <Head>
        <title>Soal {{ page }}</title>
    </Head>

    <div class="exam-wrapper">

        <div class="exam-header">

            <h4>{{ detail_event.event.title }}</h4>

            <div class="timer-box">

                <VueCountdown :time="duration" @progress="handleChangeDuration" @end="showModalEndTimeExam = true"
                    v-slot="{ minutes, seconds }">

                    ⏱ {{ minutes }} : {{ seconds }}

                </VueCountdown>

            </div>

        </div>


        <div class="exam-body">

            <div class="exam-question card-exam">

                <h5 class="question-number">
                    Soal {{ page }}
                </h5>

                <div v-if="question_active">

                    <div class="question-text" v-html="question_active.question.text"></div>

                    <div class="answer-list">

                        <div v-for="(answer, index) in answer_order" :key="index" class="answer-item"
                            :class="{ active: answer == question_active.answer }"
                            @click="submitAnswer(question_active.question_id, answer)">

                            <div class="answer-label">
                                {{ options[index] }}
                            </div>

                            <div class="answer-text">
                                {{ question_active.question[optionMap[answer]] }}
                            </div>

                        </div>

                    </div>

                </div>

            </div>


             <div class="exam-navigator card-exam">

               <div class="navigator-grid">
                <div v-for="(q, index) in all_questions" :key="index"
                    class="navigator-btn"
                    :class="{
                        'bg-primary text-white': index + 1 == page,
                        'bg-success text-white': q.answer != 0 && index + 1 != page,
                        'bg-danger text-white': q.answer == 0 && index + 1 != page
                    }"
                    @click="clickQuestion(index)">

                    {{ index + 1 }}

                </div>
            </div>

                <button class="btn-finish" @click="showModalEndExam = true">

                    Selesai Ujian

                </button>

            </div>

        </div>


        <div class="exam-footer">

            <button v-if="page > 1" class="btn-nav" @click="prevPage">

                ← Sebelumnya

            </button>

            <button v-if="page < all_questions.length" class="btn-nav" @click="nextPage">

                Selanjutnya →

            </button>

        </div>

    </div>


    <!-- MODAL -->
    <div v-if="showModalEndExam" class="modal-overlay">

        <div class="modal-box">

            <h4>Akhiri Ujian?</h4>

            <button class="btn-danger" @click="endExam">
                Ya
            </button>

            <button class="btn-secondary" @click="showModalEndExam = false">
                Batal
            </button>

        </div>

    </div>

</template>

<script>

import LayoutUser from "../../../Layouts/Tryout.vue"
import { Head } from "@inertiajs/inertia-vue3"
import { ref } from "vue"
import VueCountdown from "@chenfengyuan/vue-countdown"
import axios from "axios"

export default {


        layout: LayoutUser,
    components: {
        Head,
        VueCountdown
    },

    props: {
        id: Number,
        page: Number,
        detail_event: Object,
        all_questions: Array,
        question_answered: Number,
        question_active: Object,
        answer_order: Array,

    },

    setup(props) {

        let options = ["A", "B", "C", "D", "E"]

        const optionMap = {
        1: 'a',
        2: 'b',
        3: 'c',
        4: 'd',
        5: 'e'
        }

        const counter = ref(0)

        const duration = ref(props.detail_event.duration)

        const showModalEndExam = ref(false)

        const showModalEndTimeExam = ref(false)



        const handleChangeDuration = () => {

            duration.value -= 1000

            counter.value++

            if (duration.value > 0) {

                if (counter.value % 10 == 1) {

                    axios.put(`/user/tryout-duration/update/${props.detail_event.id}`, {

                        duration: duration.value

                    })

                }

            }

        }



        const prevPage = () => {

            Inertia.get(`/user/tryout/${props.id}/${props.page - 1}`)

        }



        const nextPage = () => {

            Inertia.get(`/user/tryout/${props.id}/${props.page + 1}`)

        }



        const clickQuestion = (index) => {

            Inertia.get(`/user/tryout/${props.id}/${index + 1}`)

        }



        const submitAnswer = (question_id, answer) => {

            axios.post("/user/tryout-answer", {

                detail_event_id: props.id,

                question_id: question_id,

                answer: answer,

                duration: duration.value

            })

        }



        const endExam = () => {

            axios.post("/user/tryout-end", {

                detail_event_id: props.id

            })

        }



        return {
            options,
            duration,
            handleChangeDuration,
            prevPage,
            nextPage,
            clickQuestion,
            submitAnswer,
            endExam,
            showModalEndExam,
            showModalEndTimeExam,
            optionMap
        }

    }

}

</script>
<style>

.exam-wrapper{
max-width:1200px;
margin:auto;
padding:20px;
}

.exam-header{
display:flex;
justify-content:space-between;
margin-bottom:20px;
}

.exam-title{
font-size:20px;
font-weight:600;
}

.timer-box{
background:#111827;
color:white;
padding:10px 16px;
border-radius:10px;
}

.exam-body{
display:flex;
gap:20px;
}

.card-exam{
background:white;
border-radius:14px;
padding:20px;
box-shadow:0 10px 30px rgba(0,0,0,.08);
}

.exam-question{
flex:3;
}

.exam-navigator{
flex:1;
}

.question-number{
font-weight:600;
margin-bottom:15px;
}

.question-text{
margin-bottom:20px;
font-size:18px;
}

.answer-list{
display:flex;
flex-direction:column;
gap:12px;
}

.answer-item{
display:flex;
gap:14px;
padding:12px;
border:1px solid #e5e7eb;
border-radius:10px;
cursor:pointer;
}

.answer-item:hover{
background:#eef2ff;
}

.answer-item.active{
background:#6366f1;
color:white;
}

.answer-label{
font-weight:bold;
}

.navigator-title{
font-weight:600;
margin-bottom:10px;
}

.navigator-progress{
font-size:14px;
margin-bottom:15px;
}

.navigator-grid{
display:grid;
grid-template-columns:repeat(5,1fr);
gap:10px;
}

.navigator-btn{
height:38px;
display:flex;
align-items:center;
justify-content:center;
background:#e5e7eb;
border-radius:8px;
cursor:pointer;
}

/* Sudah Dijawab (Hijau) */
.navigator-btn.answered {
    background: #22c55e; /* Warna Hijau */
    color: white;
}

.navigator-btn.active {
    background: #6366f1 !important; /* Warna Biru */
    color: white;
    border: 2px solid #312e81;
}

/* Belum Dijawab (Merah) */
.navigator-btn.unanswered {
    background: #ef4444; /* Warna Merah */
    color: white;
}

/* Tambahan: Efek hover agar lebih interaktif */
.navigator-btn:hover {
    opacity: 0.8;
}

.btn-finish{
margin-top:20px;
width:100%;
background:#ef4444;
color:white;
padding:10px;
border:none;
border-radius:10px;
}

.question-navigation{
margin-top:20px;
display:flex;
justify-content:space-between;
}

.btn-nav{
background:#6366f1;
color:white;
border:none;
padding:10px 16px;
border-radius:10px;
cursor:pointer;
}

.modal-overlay{
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,.5);
display:flex;
align-items:center;
justify-content:center;
}

.modal-box{
background:white;
padding:25px;
border-radius:12px;
text-align:center;
width:300px;
}

.modal-actions{
display:flex;
gap:10px;
margin-top:20px;
}

.btn-danger{
background:#ef4444;
color:white;
border:none;
padding:8px 14px;
border-radius:8px;
}

.btn-secondary{
background:#6b7280;
color:white;
border:none;
padding:8px 14px;
border-radius:8px;
}

.btn-primary{
background:#6366f1;
color:white;
border:none;
padding:8px 14px;
border-radius:8px;
}

</style>

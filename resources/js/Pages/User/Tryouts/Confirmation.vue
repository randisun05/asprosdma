<template>

<Head>
<title>Konfirmasi Tryout</title>
</Head>

<div class="confirm-wrapper">

<!-- BACK -->
<Link
href="/user/tryouts"
class="btn-back"
>
← Kembali
</Link>


<div class="confirm-grid">

<!-- DESKRIPSI -->
<div class="confirm-card">

<h3 class="card-title">
Deskripsi Tryout
</h3>

<div class="card-content">

<div v-html="detail_event.event.body"></div>

</div>

</div>


<!-- DETAIL PESERTA -->
<div class="confirm-card">

<h3 class="card-title">
Detail Peserta
</h3>

<table class="detail-table">

<tr>
<td>Nama</td>
<td>{{ detail_event.member.name }}</td>
</tr>

<tr>
<td>Email</td>
<td>{{ detail_event.member.email }}</td>
</tr>

<tr>
<td>Tryout</td>
<td>{{ detail_event.event.title }}</td>
</tr>

<tr>
<td>Tanggal</td>
<td>{{ detail_event.event.date }}</td>
</tr>

<tr>
<td>Durasi</td>
<td>{{ detail_event.event.duration }} menit</td>
</tr>

</table>


<!-- BUTTON -->

<div class="start-area">

<Link
v-if="!detail_event.start_time"
:href="`/user/tryout-start/${detail_event.id}`"
class="btn-start"
>

Mulai Tryout

</Link>

<button
v-else-if="!detail_event.end_time"
class="btn-continue"
@click="$inertia.visit(`/user/tryout/${detail_event.id}/1`)"
>

Lanjutkan

</button>

<button
v-else
class="btn-finished"
disabled
>

Sudah Dikerjakan

</button>

</div>

</div>

</div>

</div>

</template>

<script>

import LayoutUser from "../../../Layouts/Tryout.vue"
import {Head,Link} from "@inertiajs/inertia-vue3"

export default{

layout:LayoutUser,

components:{
Head,
Link
},

props:{
detail_event:Object
}

}

</script>

<style scoped>

.confirm-wrapper{
max-width:1100px;
margin:auto;
padding:30px;
}

.btn-back{
display:inline-block;
margin-bottom:20px;
padding:8px 14px;
background:#eef2ff;
color:#3730a3;
border-radius:8px;
text-decoration:none;
font-weight:500;
}

.confirm-grid{
display:grid;
grid-template-columns:1fr 1fr;
gap:25px;
}

.confirm-card{
background:white;
border-radius:16px;
padding:25px;
box-shadow:0 10px 30px rgba(0,0,0,.07);
}

.card-title{
font-size:18px;
font-weight:600;
margin-bottom:15px;
}

.card-content{
font-size:14px;
line-height:1.6;
}

.detail-table{
width:100%;
border-collapse:collapse;
margin-top:10px;
}

.detail-table td{
padding:8px 0;
font-size:14px;
}

.detail-table td:first-child{
font-weight:600;
width:130px;
color:#555;
}

.start-area{
margin-top:20px;
}

.btn-start{
display:block;
width:100%;
padding:12px;
border-radius:10px;
background:#16a34a;
color:white;
text-align:center;
font-weight:600;
text-decoration:none;
}

.btn-start:hover{
background:#15803d;
}

.btn-continue{
width:100%;
padding:12px;
border:none;
border-radius:10px;
background:#2563eb;
color:white;
font-weight:600;
}

.btn-finished{
width:100%;
padding:12px;
border:none;
border-radius:10px;
background:#9ca3af;
color:white;
}

@media(max-width:768px){

.confirm-grid{
grid-template-columns:1fr;
}

}

</style>

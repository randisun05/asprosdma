import{L as y}from"./User.018ba52d.js";import{H as w,L as x,u as B,a as _,o as n,c as s,b as h,w as b,d as t,g as a,t as i,e as v,F as C,j as f,k as j}from"./app.bb1afa62.js";import{S as u}from"./sweetalert2.all.6b1362b1.js";import{_ as T}from"./_plugin-vue_export-helper.cdc0426e.js";import"./Footer.90ba14a8.js";const H={layout:y,components:{Head:w,Link:x},props:{title:Object,errors:Object,event:Object,status:Object,detailEvent:Object},setup(){const r=B({document:""});return{getImageUrl:o=>`/storage/${o}`,join:o=>{u.fire({title:"Anda akan mendaftar pada event ini?",text:"",icon:"warning",showCancelButton:!0,confirmButtonColor:"#3085d6",cancelButtonColor:"#d33",confirmButtonText:"Yes, Daftarkan!"}).then(l=>{l.isConfirmed&&f.Inertia.post(`/user/events/${o}/join`,{document:r.document},{onSuccess:()=>{u.fire({title:"Berhasil!",text:"Anda sudah berhasil bergabung sebagai peserta",icon:"success",timer:2e3,showConfirmButton:!1})}})})},updateDocument:o=>{r.document=o.target.files[0]},form:r,absen:o=>{u.fire({title:"Anda akan melakukan absensi pada event ini?",text:"",icon:"warning",showCancelButton:!0,confirmButtonColor:"#3085d6",cancelButtonColor:"#d33",confirmButtonText:"Yes, Tandai Hadir!"}).then(l=>{l.isConfirmed&&f.Inertia.post(`/user/events/${o}/absen`,{document:r.document},{onSuccess:()=>{u.fire({title:"Berhasil!",text:"Anda sudah berhasil melakukan absensi",icon:"success",timer:2e3,showConfirmButton:!1})}})})}}}},L={id:"our-blog"},S={class:"container padding"},A={class:"card shadow mb-4"},D={class:"row"},M={class:"col-md-12"},P={class:"row py-4"},I={class:"col-md-2 col-12 mb-2 ms-4 mb-4"},O=t("i",{class:"fa fa-arrow-left"},null,-1),U=j(" Kembali"),E={class:"row"},F={class:"col-md-6"},N={class:"news_item text-center mt-5 px-2"},V={class:"cbp-item web print graphic"},Y=["src"],p={class:"col-md-6"},K={class:"news_item"},z={class:"news_desc"},G={class:"text-capitalize font-light darkcolor"},J={class:"meta-tags top20 bottom20"},q={class:"darkcolor mb-2"},Q={class:"darkcolor mb-2"},R={class:"darkcolor mb-2"},W={class:"darkcolor mb-2"},X=["innerHTML"],Z={key:0,class:"form-group bottom35 mt-1"},$=t("label",null,"Upload File ( Bentuk File .Pdf Maks 2Mb)",-1),tt={class:"input-group"},et={key:0,class:"alert alert-danger mt-2"},nt={key:1,class:"alert alert-danger mt-2"},st={class:"text-center"},at={key:1,class:"button btnthrid border-0 me-2 mt-4"},ot={key:1,class:"text-center"},it={key:1,class:"button btnthrid border-0 me-2 mt-4"};function ct(r,c,e,d,k,o){const l=_("Head"),g=_("Link");return n(),s(C,null,[h(l,null,{default:b(()=>[t("title",null,i(e.title),1)]),_:1}),t("section",L,[t("div",S,[t("div",A,[t("div",D,[t("div",M,[t("div",P,[t("div",I,[h(g,{href:"/user/events/",class:"btn btn-md btn-primary border-0 shadow w-100",type:"button"},{default:b(()=>[O,U]),_:1})])])])]),t("div",E,[t("div",F,[t("div",N,[t("div",V,[e.event.image?(n(),s("img",{key:0,class:"image",style:{display:"flex","justify-content":"center","align-items":"center",width:"100%"},src:d.getImageUrl(e.event.image),alt:"Gambar"},null,8,Y)):a("",!0)])])]),t("div",p,[t("div",K,[t("div",z,[t("h3",G,i(e.event.title),1),t("ul",J,[t("h5",q,"Tanggal Pelaksanaan : "+i(e.event.date),1),t("h5",Q,"Kuota Peserta : "+i(e.event.participant),1),t("h5",R,"Penutupan Pendaftaran : "+i(e.event.enddate),1),t("h5",W,"Pelaksanaan : "+i(e.event.place),1)]),t("div",{innerHTML:e.event.body,style:{"text-align":"justify","text-justify":""}},null,8,X),e.event.file==="Y"&&e.status!=1?(n(),s("div",Z,[$,t("div",tt,[t("input",{type:"file",class:"form-control",onChange:c[0]||(c[0]=(...m)=>d.updateDocument&&d.updateDocument(...m)),accept:".pdf"},null,32)]),e.errors.document?(n(),s("div",et,i(e.errors.document),1)):a("",!0),e.errors[0]?(n(),s("div",nt,i(e.errors[0]),1)):a("",!0)])):a("",!0),t("div",st,[e.event.status==="active"&&e.status===0?(n(),s("button",{key:0,onClick:c[1]||(c[1]=v(m=>d.join(e.event.id),["prevent"])),class:"button btnprimary border-0 me-2 mt-4"}," Join ")):a("",!0),e.event.status==="active"&&e.status===1?(n(),s("button",at," Anda Sudah Terdaftar ")):a("",!0)]),e.event.absen==="Y"?(n(),s("div",ot,[e.status===1&&e.detailEvent.status==="approved"?(n(),s("button",{key:0,onClick:c[2]||(c[2]=v(m=>d.absen(e.event.id),["prevent"])),class:"button btnprimary border-0 me-2 mt-4"},"Tandai Hadir")):a("",!0),e.detailEvent.status==="hadir"?(n(),s("button",it,"Telah Melakukan Absensi")):a("",!0)])):a("",!0)])])])])])])])],64)}const _t=T(H,[["render",ct]]);export{_t as default};

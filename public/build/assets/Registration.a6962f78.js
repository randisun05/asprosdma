import{L as A}from"./Website.2238837b.js";import{H as w,g,r as S,o as n,c as r,d as j,w as D,a as t,h as x,i as m,v as h,t as c,j as l,F as f,C as P,G as C,I as V,k as N,b as M}from"./app.6c2fc02c.js";import{S as U}from"./sweetalert2.all.2d29f515.js";import{_ as I}from"./_plugin-vue_export-helper.cdc0426e.js";import"./Footer.4b8efebc.js";const J={layout:A,components:{Head:w},props:{errors:Object,session:Object},setup(){const i=g({nip:"",name:"",email:"",contact:"",agency:"",position:"",level:"",document_jab:"",captcha:"",term:""}),o=g([]),a=async()=>{try{const u=await(await fetch("https://api.sheety.co/6be80dfe79437b6dcf36a18e88b21c5b/permintaanNoSertifikat/instansi")).json();if(u&&u.instansi){const v=u.instansi.map(_=>_.namaInstansi.toLowerCase());o.splice(0,o.length,...v.filter(_=>_.includes(i.agency.toLowerCase())))}}catch(d){console.error("Error searching agencies:",d)}},e=d=>{i.agency=d,o.splice(0,o.length)},y=()=>{N.Inertia.post("/registration/store",{nip:i.nip,name:i.name,email:i.email,contact:i.contact,agency:i.agency,position:i.position,level:i.level,document_jab:i.document_jab,code:p.value,captcha:i.captcha,term:i.term},{onSuccess:()=>{U.fire({title:"Success!",text:"Data Registrasi Berhasil Dikirim, Silakan Cek Email Anda.",icon:"success",showConfirmButton:!1,timer:2e3})}})},b=d=>{i.document_jab=d.target.files[0]},p=g({value:s()});function s(){const d="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";let u="";const v=d.length;for(let _=0;_<6;_++)u+=d.charAt(Math.floor(Math.random()*v));return u}return{form:i,submit:y,updateDocument:b,searchResults:o,searchAgencies:a,selectAgency:e,refreshCaptcha:()=>{p.value=s()},code:p}}},L=t("title",null,"Registrasi Keanggotaan Aspro",-1),R=M('<section class="page-header parallaxie padding_top center-block"><div class="container"><div class="row"><div class="col-sm-12"><div class="page-titles text-center"><h2 class="whitecolor font-light bottom30"></h2><ul class="breadcrumb justify-content-center"><li class="breadcrumb-item"><h3> Registrasi Anggota</h3></li></ul></div></div></div></div></section>',1),B={id:"registration",class:"mt-4"},E={class:"container"},H={class:"row d-flex justify-content-center"},K={class:"col-lg-12 col-md-12 col-sm-10"},T={class:"mt-4"},F={class:"row"},z={class:"col-md-6 col-sm-6"},O=t("span",{class:"ms-4"}," NIP ",-1),G={class:"form-group bottom35 mt-1"},W={key:0,class:"alert alert-danger mt-2"},q={class:"col-md-6 col-sm-6"},Q=t("span",{class:"ms-4"}," Nama ",-1),X={class:"form-group bottom35 mt-1"},Y={key:0,class:"alert alert-danger mt-2"},Z={class:"col-md-6 col-sm-6"},$=t("span",{class:"ms-4"}," Email ",-1),tt={class:"form-group bottom35 mt-1"},et={key:0,class:"alert alert-danger mt-2"},ot={class:"col-md-6 col-sm-6"},st=t("span",{class:"ms-4"}," Nomor Kontak ",-1),at={class:"form-group bottom35 mt-1"},nt={key:0,class:"alert alert-danger mt-2"},rt={class:"col-md-6 col-sm-6"},it=t("label",{for:"agency",class:"ms-4"},"Instansi",-1),lt={class:"form-group bottom35 mt-1"},ct={key:0,class:"list-group",style:{position:"absolute",width:"100%","z-index":"999","overflow-y":"auto","max-height":"200px"}},dt={class:"col-md-4 col-sm-4"},mt=["onClick"],ut={key:1,class:"alert alert-danger mt-2"},_t={class:"col-md-3 col-sm-3"},ht=t("span",{class:"ms-4"}," Jabatan ",-1),pt={class:"form-group bottom35 mt-1"},ft=t("option",{value:"",disabled:""},"Pilih Jabatan",-1),vt=t("option",{value:"Analis SDM Aparatur"},"Analis SDM Aparatur",-1),gt=t("option",{value:"Pranata SDM Aparatur"},"Pranata SDM Aparatur",-1),yt=[ft,vt,gt],bt={key:0,class:"alert alert-danger mt-2"},kt={class:"col-md-3 col-sm-3"},xt=t("span",{class:"ms-4"}," Jenjang ",-1),Ct={class:"form-group bottom35 mt-1"},Mt={key:0,value:"",disabled:"",selected:""},At=M('<option value="" disabled>Pilih Jenjang</option><option value="Pertama">Pertama</option><option value="Muda">Muda</option><option value="Madya">Madya</option><option value="Utama">Utama</option>',5),wt=t("option",{value:"",disabled:""},"Pilih Jenjang",-1),St=t("option",{value:"Terampil"},"Terampil",-1),jt=t("option",{value:"Mahir"},"Mahir",-1),Dt=t("option",{value:"Penyelia"},"Penyelia",-1),Pt={key:0,class:"alert alert-danger mt-2"},Vt={class:"col-md-6 col-sm-6"},Nt=t("span",{class:"ms-4"}," SK Jabatan ( Bentuk File .Pdf ) ",-1),Ut={class:"form-group bottom35 mt-1"},It={class:"input-group"},Jt={key:0,class:"alert alert-danger mt-2"},Lt={key:1,class:"alert alert-danger mt-2"},Rt={class:"col-md-3 col-sm-3 mt-2"},Bt={class:"form-group bottom35 mt-1"},Et={class:"form-group mb-4 ms-4"},Ht={class:"input-group"},Kt={class:"text px-5",id:"generated-captcha"},Tt=t("i",{class:"fa fa-undo"},null,-1),Ft=[Tt],zt={class:"col-md-3 col-sm-3 mt-4"},Ot={class:"form-group mb-4 ms-4"},Gt={class:"input-group"},Wt={key:0,class:"alert alert-danger mt-2"},qt={class:"ms-2 mb-4"},Qt=t("label",{class:"form-check-label ms-2",for:"agreeTerms"}," Saya menyetujui peraturan organisasi. ",-1),Xt={key:0,class:"col-md-4 alert-danger mt-2"},Yt=t("div",{class:"row d-flex justify-content-center"},[t("button",{type:"submit",class:"button btnprimary",style:{width:"300px"}},"Submit"),t("a",{href:"/registration/group",class:"text-center mt-4"},[t("u",null,"Klik untuk mengajukan registrasi secara kolektif")])],-1);function Zt(i,o,a,e,y,b){const p=S("Head");return n(),r(f,null,[j(p,null,{default:D(()=>[L]),_:1}),R,t("section",B,[t("div",E,[t("div",H,[t("div",K,[t("div",T,[t("form",{onSubmit:o[12]||(o[12]=x((...s)=>e.submit&&e.submit(...s),["prevent"])),class:"getin_form border-form",id:"post",enctype:"multipart/form-data"},[t("div",F,[t("div",z,[O,t("div",G,[m(t("input",{type:"text",class:"form-control","onUpdate:modelValue":o[0]||(o[0]=s=>e.form.nip=s),placeholder:"Masukan NIP",maxlength:"18",onkeypress:"return event.charCode >= 48 && event.charCode <= 57"},null,512),[[h,e.form.nip]]),a.errors.nip?(n(),r("div",W,c(a.errors.nip),1)):l("",!0)])]),t("div",q,[Q,t("div",X,[m(t("input",{type:"text",class:"form-control","onUpdate:modelValue":o[1]||(o[1]=s=>e.form.name=s),placeholder:"Masukan Nama Lengkap"},null,512),[[h,e.form.name]]),a.errors.name?(n(),r("div",Y,c(a.errors.name),1)):l("",!0)])]),t("div",Z,[$,t("div",tt,[m(t("input",{type:"email",class:"form-control","onUpdate:modelValue":o[2]||(o[2]=s=>e.form.email=s),placeholder:"Masukan Alamat Email Aktif"},null,512),[[h,e.form.email]]),a.errors.email?(n(),r("div",et,c(a.errors.email),1)):l("",!0)])]),t("div",ot,[st,t("div",at,[m(t("input",{type:"text",class:"form-control","onUpdate:modelValue":o[3]||(o[3]=s=>e.form.contact=s),placeholder:"Masukan Nomor Kontak Aktif",maxlength:"13",onkeypress:"return event.charCode >= 48 && event.charCode <= 57"},null,512),[[h,e.form.contact]]),a.errors.contact?(n(),r("div",nt,c(a.errors.contact),1)):l("",!0)])]),t("div",rt,[it,t("div",lt,[m(t("input",{type:"text",class:"form-control","onUpdate:modelValue":o[4]||(o[4]=s=>e.form.agency=s),onInput:o[5]||(o[5]=(...s)=>e.searchAgencies&&e.searchAgencies(...s)),placeholder:"Masukkan nama instansi"},null,544),[[h,e.form.agency]]),e.form.agency&&e.searchResults.length?(n(),r("ul",ct,[t("div",dt,[(n(!0),r(f,null,P(e.searchResults,(s,k)=>(n(),r("li",{class:"list-group-item",key:k,onClick:d=>e.selectAgency(s)},c(s),9,mt))),128))])])):l("",!0),a.errors.agency?(n(),r("div",ut,c(a.errors.agency),1)):l("",!0)])]),t("div",_t,[ht,t("div",pt,[m(t("select",{type:"form-select",class:"form-control","onUpdate:modelValue":o[6]||(o[6]=s=>e.form.position=s)},yt,512),[[C,e.form.position]]),a.errors.position?(n(),r("div",bt,c(a.errors.position),1)):l("",!0)])]),t("div",kt,[xt,t("div",Ct,[m(t("select",{type:"form-select",class:"form-control","onUpdate:modelValue":o[7]||(o[7]=s=>e.form.level=s)},[e.form.position===""?(n(),r("option",Mt,"Jabatan Harus Dipilih")):l("",!0),e.form.position==="Analis SDM Aparatur"?(n(),r(f,{key:1},[At],64)):l("",!0),e.form.position==="Pranata SDM Aparatur"?(n(),r(f,{key:2},[wt,St,jt,Dt],64)):l("",!0)],512),[[C,e.form.level]]),a.errors.level?(n(),r("div",Pt,c(a.errors.level),1)):l("",!0)])]),t("div",Vt,[Nt,t("div",Ut,[t("div",It,[t("input",{type:"file",class:"form-control",onChange:o[8]||(o[8]=(...s)=>e.updateDocument&&e.updateDocument(...s)),accept:".pdf"},null,32)]),a.errors.document_jab?(n(),r("div",Jt,c(a.errors.document_jab),1)):l("",!0),a.errors[0]?(n(),r("div",Lt,c(a.errors[0]),1)):l("",!0)])]),t("div",Rt,[t("div",Bt,[t("div",Et,[t("div",Ht,[t("span",Kt,c(e.code.value),1),t("button",{class:"btn btn btn-outline-primary no-border ms-2",style:{"border-color":"white"},onClick:o[9]||(o[9]=x((...s)=>e.refreshCaptcha&&e.refreshCaptcha(...s),["prevent"]))},Ft)])])])]),t("div",zt,[t("div",Ot,[t("div",Gt,[m(t("input",{type:"text",class:"form-control me-3",id:"captcha","onUpdate:modelValue":o[10]||(o[10]=s=>e.form.captcha=s),placeholder:"Enter Captcha",size:"6"},null,512),[[h,e.form.captcha]])]),a.errors.captcha?(n(),r("div",Wt,c(a.errors.captcha),1)):l("",!0)])]),t("div",qt,[m(t("input",{class:"form-check-input",type:"checkbox",id:"agreeTerms","onUpdate:modelValue":o[11]||(o[11]=s=>e.form.term=s),"true-value":"1","false-value":"0"},null,512),[[V,e.form.term]]),Qt,a.errors.term?(n(),r("div",Xt,c(a.errors.term),1)):l("",!0)]),Yt])],32)])])])])])],64)}const ae=I(J,[["render",Zt]]);export{ae as default};
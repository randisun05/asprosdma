import{L as p}from"./Website.2238837b.js";import{H as b,g as y,r as k,o as n,c as i,d as M,w as x,a as t,h as S,i as d,v as m,t as l,j as r,G as f,F as u,k as j,b as v}from"./app.6c2fc02c.js";import{S as A}from"./sweetalert2.all.2d29f515.js";import{_ as D}from"./_plugin-vue_export-helper.cdc0426e.js";import"./Footer.4b8efebc.js";const P={layout:p,components:{Head:b},props:{errors:Object,session:Object,register:Object},setup(c){const o=y({nip:c.register.nip,name:c.register.name,email:c.register.email,contact:c.register.contact,agency:c.register.agency,position:c.register.position,level:c.register.level,document_jab:null,paid:null,info:c.register.info});return{form:o,submit:()=>{j.Inertia.post(`/registration/confirm/${c.register.id}`,{nip:o.nip,name:o.name,email:o.email,contact:o.contact,agency:o.agency,position:o.position,level:o.level,document_jab:o.document_jab,paid:o.paid},{onSuccess:()=>{A.fire({title:"Success!",text:"Data Registrasi Berhasil Dikirim, Silakan Cek Email Anda.",icon:"success",showConfirmButton:!1,timer:2e3})}})},updateDocument:_=>{o.document_jab=_.target.files[0]},updateImage:_=>{o.paid=_.target.files[0]}}}},w=t("title",null,"Registrasi Keanggotaan Aspro",-1),V=v('<section class="page-header parallaxie padding_top center-block"><div class="container"><div class="row"><div class="col-sm-12"><div class="page-titles text-center"><h2 class="whitecolor font-light bottom30"></h2><ul class="breadcrumb justify-content-center"><li class="breadcrumb-item"><h3> Konfirmasi Registrasi Anggota</h3></li><li class="breadcrumb-item active" aria-current="page"></li></ul></div></div></div></div></section>',1),C={id:"registration",class:""},I={class:"container"},N={class:"row d-flex justify-content-center"},U={class:"col-lg-12 col-md-12 col-sm-10"},B={class:"logincontainer"},J={class:"row"},E={class:"col-md-6 col-sm-6"},H=t("span",{class:"ms-4"}," NIP ",-1),K={class:"form-group bottom35 mt-1"},F={key:0,class:"alert alert-danger mt-2"},T={class:"col-md-6 col-sm-6"},L=t("span",{class:"ms-4"}," Nama ",-1),O={class:"form-group bottom35 mt-1"},R={key:0,class:"alert alert-danger mt-2"},G={class:"col-md-6 col-sm-6"},W=t("span",{class:"ms-4"}," Email ",-1),q={class:"form-group bottom35 mt-1"},z={key:0,class:"alert alert-danger mt-2"},Q={class:"col-md-6 col-sm-6"},X=t("span",{class:"ms-4"}," Nomor Kontak ",-1),Y={class:"form-group bottom35 mt-1"},Z={key:0,class:"alert alert-danger mt-2"},$={class:"col-md-6 col-sm-6"},tt=t("span",{class:"ms-4"}," Instansi ",-1),ot={class:"form-group bottom35 mt-1"},et={key:0,class:"alert alert-danger mt-2"},st={class:"col-md-3 col-sm-3"},at=t("span",{class:"ms-4"}," Jabatan ",-1),nt={class:"form-group bottom35 mt-1"},it=t("option",{value:"",disabled:""},"Pilih Jabatan",-1),rt=t("option",{value:"Analis SDM Aparatur"},"Analis SDM Aparatur",-1),lt=t("option",{value:"Pranata SDM Aparatur"},"Pranata SDM Aparatur",-1),ct=[it,rt,lt],dt={key:0,class:"alert alert-danger mt-2"},mt={class:"col-md-3 col-sm-3"},_t=t("span",{class:"ms-4"}," Jenjang ",-1),ut={class:"form-group bottom35 mt-1"},ft={key:0,value:"",disabled:"",selected:""},vt=v('<option value="" disabled>Pilih Jenjang</option><option value="Pertama">Pertama</option><option value="Muda">Muda</option><option value="Madya">Madya</option><option value="Utama">Utama</option>',5),gt=t("option",{value:"",disabled:""},"Pilih Jenjang",-1),ht=t("option",{value:"Terampil"},"Terampil",-1),pt=t("option",{value:"Mahir"},"Mahir",-1),bt=t("option",{value:"Penyelia"},"Penyelia",-1),yt={key:0,class:"alert alert-danger mt-2"},kt={class:"col-md-6 col-sm-6"},Mt=t("span",{class:"ms-4"}," SK Jabatan ( Bentuk File .Pdf ) ",-1),xt={class:"form-group bottom35 mt-1"},St={class:"input-group"},jt={key:0,class:"alert alert-danger mt-2"},At={key:1,class:"alert alert-danger mt-2"},Dt={class:"col-md-6 col-sm-6"},Pt=t("span",{class:"ms-4"}," Bukti Transfer ( Bentuk File Image ) ",-1),wt={class:"form-group bottom35 mt-1"},Vt={key:0,class:"alert alert-danger mt-2"},Ct={key:1,class:"alert alert-danger mt-2"},It={class:"col-md-6 col-sm-6"},Nt=t("span",{class:"ms-4"}," Info ",-1),Ut={class:"form-group bottom35 mt-1"},Bt={key:0,class:"alert alert-danger mt-2"},Jt=t("div",{class:"row d-flex justify-content-center"},[t("button",{type:"submit",class:"button btnprimary",style:{width:"300px"}},"Submit")],-1);function Et(c,o,s,e,g,_){const h=k("Head");return n(),i(u,null,[M(h,null,{default:x(()=>[w]),_:1}),V,t("section",C,[t("div",I,[t("div",N,[t("div",U,[t("div",B,[t("form",{onSubmit:o[10]||(o[10]=S((...a)=>e.submit&&e.submit(...a),["prevent"])),class:"getin_form border-form",id:"login"},[t("div",J,[t("div",E,[H,t("div",K,[d(t("input",{type:"text",class:"form-control","onUpdate:modelValue":o[0]||(o[0]=a=>e.form.nip=a),placeholder:"Masukan NIP",maxlength:"18",onkeypress:"return event.charCode >= 48 && event.charCode <= 57"},null,512),[[m,e.form.nip]]),s.errors.nip?(n(),i("div",F,l(s.errors.nip),1)):r("",!0)])]),t("div",T,[L,t("div",O,[d(t("input",{type:"text",class:"form-control","onUpdate:modelValue":o[1]||(o[1]=a=>e.form.name=a),placeholder:"Masukan Nama Lengkap"},null,512),[[m,e.form.name]]),s.errors.name?(n(),i("div",R,l(s.errors.name),1)):r("",!0)])]),t("div",G,[W,t("div",q,[d(t("input",{type:"email",class:"form-control","onUpdate:modelValue":o[2]||(o[2]=a=>e.form.email=a),placeholder:"Masukan Alamat Email Aktif"},null,512),[[m,e.form.email]]),s.errors.email?(n(),i("div",z,l(s.errors.email),1)):r("",!0)])]),t("div",Q,[X,t("div",Y,[d(t("input",{type:"text",class:"form-control","onUpdate:modelValue":o[3]||(o[3]=a=>e.form.contact=a),placeholder:"Masukan Nomor Kontak Aktif",maxlength:"13",onkeypress:"return event.charCode >= 48 && event.charCode <= 57"},null,512),[[m,e.form.contact]]),s.errors.contact?(n(),i("div",Z,l(s.errors.contact),1)):r("",!0)])]),t("div",$,[tt,t("div",ot,[d(t("input",{type:"text",class:"form-control","onUpdate:modelValue":o[4]||(o[4]=a=>e.form.agency=a),placeholder:"Masukan Instansi"},null,512),[[m,e.form.agency]]),s.errors.agency?(n(),i("div",et,l(s.errors.agency),1)):r("",!0)])]),t("div",st,[at,t("div",nt,[d(t("select",{type:"form-select",class:"form-control","onUpdate:modelValue":o[5]||(o[5]=a=>e.form.position=a)},ct,512),[[f,e.form.position]]),s.errors.position?(n(),i("div",dt,l(s.errors.position),1)):r("",!0)])]),t("div",mt,[_t,t("div",ut,[d(t("select",{type:"form-select",class:"form-control","onUpdate:modelValue":o[6]||(o[6]=a=>e.form.level=a)},[e.form.position===""?(n(),i("option",ft,"Jabatan Harus Dipilih")):r("",!0),e.form.position==="Analis SDM Aparatur"?(n(),i(u,{key:1},[vt],64)):r("",!0),e.form.position==="Pranata SDM Aparatur"?(n(),i(u,{key:2},[gt,ht,pt,bt],64)):r("",!0)],512),[[f,e.form.level]]),s.errors.level?(n(),i("div",yt,l(s.errors.level),1)):r("",!0)])]),t("div",kt,[Mt,t("div",xt,[t("div",St,[t("input",{type:"file",class:"form-control",onChange:o[7]||(o[7]=(...a)=>e.updateDocument&&e.updateDocument(...a)),accept:".pdf"},null,32)]),s.errors.document_jab?(n(),i("div",jt,l(s.errors.document_jab),1)):r("",!0),s.errors[0]?(n(),i("div",At,l(s.errors[0]),1)):r("",!0)])]),t("div",Dt,[Pt,t("div",wt,[t("input",{type:"file",class:"form-control",onChange:o[8]||(o[8]=(...a)=>e.updateImage&&e.updateImage(...a))},null,32),s.errors.paid?(n(),i("div",Vt,l(s.errors.paid),1)):r("",!0),s.errors[0]?(n(),i("div",Ct,l(s.errors[0]),1)):r("",!0)])]),t("div",It,[Nt,t("div",Ut,[d(t("input",{type:"text",class:"form-control","onUpdate:modelValue":o[9]||(o[9]=a=>e.form.info=a),disabled:""},null,512),[[m,e.form.info]]),s.errors.info?(n(),i("div",Bt,l(s.errors.info),1)):r("",!0)])]),Jt])],32)])])])])])],64)}const Ot=D(P,[["render",Et]]);export{Ot as default};
import{L as B}from"./User.c7d99f79.js";import{P as S}from"./Pagination.cc113042.js";import{H as j,L,q as P,r as m,o as e,c as a,d as h,w as r,a as t,h as f,i as A,v as N,F as w,C as T,k,t as n,j as p,E as y,e as V}from"./app.6c2fc02c.js";import{S as _}from"./sweetalert2.all.2d29f515.js";import{_ as D}from"./_plugin-vue_export-helper.cdc0426e.js";import"./Footer.4b8efebc.js";const H={layout:B,components:{Head:j,Link:L,Pagination:S},props:{posts:Object},setup(){const b=P(new URL(document.location).searchParams.get("q"));return{search:b,handleSearch:()=>{k.Inertia.get("/user/posts",{q:b.value})},destroy:l=>{_.fire({title:"Apakah Anda yakin?",text:"Anda tidak akan dapat mengembalikan ini!",icon:"warning",showCancelButton:!0,confirmButtonColor:"#3085d6",cancelButtonColor:"#d33",confirmButtonText:"Yes, delete it!"}).then(c=>{c.isConfirmed&&(k.Inertia.delete(`/user/posts/${l}`),_.fire({title:"Deleted!",text:"Peserta Berhasil Dihapus!.",icon:"success",timer:2e3,showConfirmButton:!1}))})},handleSubmission:l=>{_.fire({title:"Apakah Anda yakin?",text:"Post akan diajukan untuk publish!",icon:"warning",showCancelButton:!0,confirmButtonColor:"#3085d6",cancelButtonColor:"#d33",confirmButtonText:"Yes, Submit it!"}).then(c=>{c.isConfirmed&&(k.Inertia.get(`/user/posts/${l}/submission`),_.fire({title:"Success!",text:"Status Returned!.",icon:"success",timer:2e3,showConfirmButton:!1}))})}}}},I=t("title",null,"Berbagi Cerita",-1),q={class:"container-fluid mb-5 mt-5"},U={class:"row"},E={class:"col-md-12"},F={class:"row"},M={class:"col-md-1 col-12 mb-2"},R=t("i",{class:"fa fa-plus-circle"},null,-1),Y=V(" Tambah"),J={class:"col-md-6 col-12 mb-2"},K={class:"input-group"},O=t("span",{class:"input-group-text border-0 shadow"},[t("i",{class:"fa fa-search"})],-1),z={class:"row mt-1"},G={class:"col-md-12"},Q={class:"card border-0 shadow"},W={class:"card-body"},X={class:"table-responsive"},Z={class:"table table-bordered table-centered table-nowrap mb-0 rounded"},$=t("thead",{class:"thead-dark"},[t("tr",{class:"border-0 text-center"},[t("th",{class:"border-0 rounded-start",style:{width:"5%"}},"No."),t("th",{class:"border-0"},"Judul"),t("th",{class:"border-0"},"Kategori"),t("th",{class:"border-0"},"Status"),t("th",{class:"border-0 rounded-end",style:{width:"12%"}},"Aksi")])],-1),tt=t("div",{class:"mt-2"},null,-1),st={class:"fw-bold text-center"},et={key:0,class:"badge bg-success",title:"disetujui untuk di publish"},at={key:1,class:"badge bg-warning",title:"hanya untuk konsumsi pribadi"},nt={key:2,class:"badge bg-warning",title:"silakan dicek kembali"},ot={key:3,class:"badge bg-danger",title:"ditolak untuk publish"},it={key:4,class:"badge bg-secondary",title:"sedang diajukan, fitur edit nonaktif"},dt={class:"text-center"},rt=t("i",{class:"fa fa-pencil"},null,-1),lt=t("i",{class:"fa fa-eye",title:"lihat detail"},null,-1),ct=t("i",{class:"fa fa-envelope"},null,-1),ut=["onClick"],ht=t("i",{class:"fa fa-trash",title:"hapus"},null,-1),_t=[ht];function bt(b,i,d,o,l,c){const v=m("Head"),u=m("Link"),C=m("Pagination");return e(),a(w,null,[h(v,null,{default:r(()=>[I]),_:1}),t("div",q,[t("div",U,[t("div",E,[t("div",F,[t("div",M,[h(u,{href:"/user/posts/create",class:"btn btn-md btn-primary border-0 shadow w-100",type:"button"},{default:r(()=>[R,Y]),_:1})]),t("div",J,[t("form",{onSubmit:i[1]||(i[1]=f((...s)=>o.handleSearch&&o.handleSearch(...s),["prevent"]))},[t("div",K,[A(t("input",{type:"text",class:"form-control border-0 shadow","onUpdate:modelValue":i[0]||(i[0]=s=>o.search=s),placeholder:"masukkan kata kunci dan enter..."},null,512),[[N,o.search]]),O])],32)])])])]),t("div",z,[t("div",G,[t("div",Q,[t("div",W,[t("div",X,[t("table",Z,[$,tt,t("tbody",null,[(e(!0),a(w,null,T(d.posts.data,(s,g)=>(e(),a("tr",{key:g},[t("td",st,n(++g+(d.posts.current_page-1)*d.posts.per_page),1),t("td",null,n(s.title),1),t("td",null,n(s.category.title),1),t("td",null,[s.status==="approved"?(e(),a("span",et,n(s.status),1)):s.status==="private"?(e(),a("span",at,n(s.status),1)):s.status==="perlu ada perbaikan"?(e(),a("span",nt,n(s.status),1)):s.status==="rejected"?(e(),a("span",ot,n(s.status),1)):s.status==="submission"?(e(),a("span",it,n(s.status),1)):p("",!0)]),t("td",dt,[s.status!=="submission"&&s.status!=="rejected"?(e(),y(u,{key:0,href:`/user/posts/${s.id}/edit`,class:"btn btn-sm btn-warning border-0 shadow me-2",type:"button",title:"edit"},{default:r(()=>[rt]),_:2},1032,["href"])):p("",!0),h(u,{href:`/user/posts/${s.id}`,class:"btn btn-sm btn-info border-0 shadow me-2",type:"button"},{default:r(()=>[lt]),_:2},1032,["href"]),s.status!=="submission"&&s.status!=="rejected"?(e(),y(u,{key:1,onClick:f(x=>o.handleSubmission(s.id),["prevent"]),class:"btn btn-sm btn-success border-0 shadow me-2",type:"button",title:"pengajuan publish"},{default:r(()=>[ct]),_:2},1032,["onClick"])):p("",!0),t("button",{onClick:f(x=>o.destroy(s.id),["prevent"]),class:"btn btn-sm btn-danger border-0 me-2"},_t,8,ut)])]))),128))])])]),h(C,{links:d.posts.links,align:"end"},null,8,["links"])])])])])])],64)}const yt=D(H,[["render",bt]]);export{yt as default};
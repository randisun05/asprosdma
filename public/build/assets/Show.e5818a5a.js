import{L as p}from"./User.c7d99f79.js";import{H as g,L as b,r as c,o,c as a,d as i,w as r,a as t,t as s,j as d,F as f,e as l}from"./app.6c2fc02c.js";import{_ as v}from"./_plugin-vue_export-helper.cdc0426e.js";import"./Footer.4b8efebc.js";const w={layout:p,components:{Head:g,Link:b},props:{errors:Object,post:{type:Object,default:null}},setup(){return{getImageUrl:e=>`/storage/${e}`,getDocumentUrl:e=>`/storage/${e}`}}},y=t("title",null,"Preview Cerita",-1),k={class:"container mb-5 mt-5"},x={class:"row mt-1"},L={class:"col-md-12"},U={class:"card border-0 shadow"},D={class:"card-body"},H={class:"row"},C={class:"col-md-12"},B={class:"row py-4"},N={class:"col-md-2 col-12 mb-2"},V=t("i",{class:"fa fa-arrow-left"},null,-1),j=l(" Kembali"),I=t("h3",{class:"text-center",style:{}},"Preview Cerita/Artikel/Berita",-1),O={class:"row px-5 py-3"},S={class:"text-center"},T={class:"mb-0"},F={class:"image-container"},K=["src"],M=["innerHTML"],P={key:0},A=l("Dokumen dapat didownload "),E=["href"];function G(_,m,e,n,q,z){const h=c("Head"),u=c("Link");return o(),a(f,null,[i(h,null,{default:r(()=>[y]),_:1}),t("div",k,[t("div",x,[t("div",L,[t("div",U,[t("div",D,[t("div",H,[t("div",C,[t("div",B,[t("div",N,[i(u,{href:"/user/posts",class:"btn btn-md btn-primary border-0 shadow w-100",type:"button"},{default:r(()=>[V,j]),_:1})])])])]),I,t("div",O,[t("h3",S,s(e.post.title),1),t("p",T,"Kategori: "+s(e.post.category.title),1),t("p",null,"Oleh: "+s(e.post.member.name)+" - Dipublikasi: "+s(e.post.publish_at),1),t("div",F,[e.post.image?(o(),a("img",{key:0,src:n.getImageUrl(e.post.image),alt:"Gambar"},null,8,K)):d("",!0)]),t("div",{innerHTML:e.post.body,class:"mt-4"},null,8,M),e.post.document?(o(),a("p",P,[A,t("a",{href:n.getDocumentUrl(e.post.document),download:""},"disini.",8,E)])):d("",!0)])])])])])])],64)}const X=v(w,[["render",G]]);export{X as default};
import{L as u,r as o,o as l,c,a,t as b,d as n,w as t,e as v,n as i,f as $}from"./app.6c2fc02c.js";import{_ as d}from"./_plugin-vue_export-helper.cdc0426e.js";const g={components:{Link:u}},x={class:"navbar navbar-expand-lg"},k=a("div",{class:"container"},null,-1),w={class:"dropdown"},y={href:"#",class:"btn",type:"button","data-bs-toggle":"dropdown","aria-expanded":"false",id:"sidemenu_toggle"},L={class:"media d-flex align-items-center"},j=["src"],N={class:"media-body text-dark align-items-center d-none d-lg-block ms-2"},S={class:"mb-0 font-small fw-bold text-gray-900"},W={class:"dropdown-menu","aria-labelledby":"sidemenu_toggle"},B=v(" Logout ");function C(s,r,p,f,_,m){const e=o("Link");return l(),c("nav",x,[k,a("div",w,[a("a",y,[a("div",L,[a("img",{class:"avatar rounded-circle",alt:"Image placeholder",src:`https://ui-avatars.com/api/?name=${s.$page.props.auth.user.name}&background=4e73df&color=ffffff&size=40`},null,8,j),a("div",N,[a("span",S,b(s.$page.props.auth.user.name),1)])])]),a("ul",W,[n(e,{class:"dropdown-item d-flex align-items-center",href:"/logout",method:"POST",as:"button"},{default:t(()=>[B]),_:1})])])])}const V=d(g,[["render",C]]),z={components:{Link:u}},D={class:"navbar navbar-expand-md sidebar-nav"},E={class:"collapse navbar-collapse",id:"xenav"},M={class:"navbar-nav ms-auto"},P=a("span",null,[a("span",{class:"sidebar-icon"},[a("i",{class:"fa fa-tachometer fa-lg","aria-hidden":"true"})]),a("span",{class:"sidebar-text ms-3"},"Dashboard")],-1),T=a("span",null,[a("span",{class:"sidebar-icon"},[a("i",{class:"fa fa-users fa-lg","aria-hidden":"true"})]),a("span",{class:"sidebar-text ms-3"},"Registration")],-1),A=a("span",null,[a("span",{class:"sidebar-icon"},[a("i",{class:"fa fa-bullhorn fa-lg","aria-hidden":"true"})]),a("span",{class:"sidebar-text ms-3"},"Posts")],-1),I=a("span",null,[a("span",{class:"sidebar-icon"},[a("i",{class:"fa fa-calendar fa-lg","aria-hidden":"true"})]),a("span",{class:"sidebar-text ms-3"},"Events")],-1),O=a("span",null,[a("span",{class:"sidebar-icon"},[a("i",{class:"fa fa-photo fa-lg","aria-hidden":"true"})]),a("span",{class:"sidebar-text ms-3"},"Media")],-1),R=a("span",null,[a("span",{class:"sidebar-icon"},[a("i",{class:"fa fa-tags fa-lg","aria-hidden":"true"})]),a("span",{class:"sidebar-text ms-3"},"Merchans")],-1);function q(s,r,p,f,_,m){const e=o("Link");return l(),c("nav",D,[a("div",E,[a("ul",M,[a("li",{class:i(["nav-item",{active:s.$page.url.startsWith("/admin/dashboard")}])},[n(e,{href:"/admin/dashboard",class:"nav-link d-flex justify-content-between"},{default:t(()=>[P]),_:1})],2),a("li",{class:i(["nav-item",{active:s.$page.url.startsWith("/admin/registration")}])},[n(e,{href:"/admin/registration",class:"nav-link d-flex justify-content-between"},{default:t(()=>[T]),_:1})],2),a("li",{class:i(["nav-item",{active:s.$page.url.startsWith("/admin/posts")}])},[n(e,{href:"/admin/posts",class:"nav-link d-flex justify-content-between"},{default:t(()=>[A]),_:1})],2),a("li",{class:i(["nav-item",{active:s.$page.url.startsWith("/admin/events")}])},[n(e,{href:"/admin/events",class:"nav-link d-flex justify-content-between"},{default:t(()=>[I]),_:1})],2),a("li",{class:i(["nav-item",{active:s.$page.url.startsWith("/admin/medias")}])},[n(e,{href:"/admin/medias",class:"nav-link d-flex justify-content-between"},{default:t(()=>[O]),_:1})],2),a("li",{class:i(["nav-item",{active:s.$page.url.startsWith("/admin/merchans")}])},[n(e,{href:"/admin/merchans",class:"nav-link d-flex justify-content-between"},{default:t(()=>[R]),_:1})],2)])])])}const F=d(z,[["render",q]]),G={components:{Navbar:V,Sidebar:F}},H={class:"wrapper"},J={class:"content"};function K(s,r,p,f,_,m){const e=o("Sidebar"),h=o("Navbar");return l(),c("div",H,[n(e),a("main",J,[n(h),$(s.$slots,"default")])])}const X=d(G,[["render",K]]);export{X as L};
import{r as b,z as w,A as x,b as g,o as n,c as u,a as l,h as r,B as c,u as o,m as v,C as y,j as C,g as m,n as p,D as $,f as S,i as B}from"./app-5ac87b3c.js";const E={class:"relative"},A={__name:"Dropdown",props:{align:{type:String,default:"right"},width:{type:String,default:"48"},contentClasses:{type:Array,default:()=>["py-1","bg-gray-800"]}},setup(t){const s=t;let e=b(!1);const d=i=>{e.value&&i.key==="Escape"&&(e.value=!1)};w(()=>document.addEventListener("keydown",d)),x(()=>document.removeEventListener("keydown",d));const h=g(()=>({48:"w-48"})[s.width.toString()]),k=g(()=>s.align==="left"?"origin-top-left left-0":s.align==="right"?"origin-top-right right-0":"origin-top");return(i,a)=>(n(),u("div",E,[l("div",{onClick:a[0]||(a[0]=f=>c(e)?e.value=!o(e):e=!o(e))},[r(i.$slots,"trigger")]),v(l("div",{class:"fixed inset-0 z-40",onClick:a[1]||(a[1]=f=>c(e)?e.value=!1:e=!1)},null,512),[[y,o(e)]]),C($,{"enter-active-class":"transition ease-out duration-200","enter-from-class":"transform opacity-0 scale-95","enter-to-class":"transform opacity-100 scale-100","leave-active-class":"transition ease-in duration-75","leave-from-class":"transform opacity-100 scale-100","leave-to-class":"transform opacity-0 scale-95"},{default:m(()=>[v(l("div",{class:p(["absolute z-50 mt-2 rounded-md shadow-lg",[h.value,k.value]]),style:{display:"none"},onClick:a[2]||(a[2]=f=>c(e)?e.value=!1:e=!1)},[l("div",{class:p(["rounded-md ring-1 ring-black ring-opacity-5",t.contentClasses])},[r(i.$slots,"content")],2)],2),[[y,o(e)]])]),_:3})]))}},z={key:0,type:"submit",class:"block w-full px-4 py-2 text-left text-sm leading-5 text-white hover:bg-gray-600 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"},D=["href"],N={__name:"DropdownLink",props:{href:String,as:String},setup(t){return(s,e)=>(n(),u("div",null,[t.as=="button"?(n(),u("button",z,[r(s.$slots,"default")])):t.as=="a"?(n(),u("a",{key:1,href:t.href,class:"block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"},[r(s.$slots,"default")],8,D)):(n(),S(o(B),{key:2,href:t.href,class:"block px-4 py-2 text-sm leading-5 text-white hover:bg-gray-600 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"},{default:m(()=>[r(s.$slots,"default")]),_:3},8,["href"]))]))}};export{N as _,A as a};

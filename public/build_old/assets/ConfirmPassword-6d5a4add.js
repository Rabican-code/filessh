import{T as m,r as c,o as d,c as u,j as o,u as e,g as r,F as p,Z as f,a,n as _,k as w,e as g}from"./app-5ac87b3c.js";import{A as b}from"./AuthenticationCard-8c6e5820.js";import{_ as h}from"./AuthenticationCardLogo-278a4627.js";import{_ as x,a as v}from"./TextInput-1ec894e2.js";import{_ as y}from"./InputLabel-c769706f.js";import{_ as V}from"./PrimaryButton-4aa545a3.js";import"./_plugin-vue_export-helper-c27b6911.js";const k=a("div",{class:"mb-4 text-sm text-gray-600"}," This is a secure area of the application. Please confirm your password before continuing. ",-1),C=["onSubmit"],$={class:"flex justify-end mt-4"},q={__name:"ConfirmPassword",setup(A){const s=m({password:""}),t=c(null),n=()=>{s.post(route("password.confirm"),{onFinish:()=>{s.reset(),t.value.focus()}})};return(B,i)=>(d(),u(p,null,[o(e(f),{title:"Secure Area"}),o(b,null,{logo:r(()=>[o(h)]),default:r(()=>[k,a("form",{onSubmit:g(n,["prevent"])},[a("div",null,[o(y,{for:"password",value:"Password"}),o(x,{id:"password",ref_key:"passwordInput",ref:t,modelValue:e(s).password,"onUpdate:modelValue":i[0]||(i[0]=l=>e(s).password=l),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"current-password",autofocus:""},null,8,["modelValue"]),o(v,{class:"mt-2",message:e(s).errors.password},null,8,["message"])]),a("div",$,[o(V,{class:_(["ml-4",{"opacity-25":e(s).processing}]),disabled:e(s).processing},{default:r(()=>[w(" Confirm ")]),_:1},8,["class","disabled"])])],40,C)]),_:1})],64))}};export{q as default};

import{o as s,c as e,j as o,a as i,d as r,F as n}from"./app-5ac87b3c.js";import p from"./DeleteUserForm-05c10b9a.js";import c from"./LogoutOtherBrowserSessionsForm-a6015456.js";import{S as a}from"./SectionBorder-1b14778c.js";import u from"./TwoFactorAuthenticationForm-6dcf2ca7.js";import l from"./UpdatePasswordForm-ce99f168.js";import f from"./UpdateProfileInformationForm-a8c9969f.js";import _ from"./Navbar-ca7cc6c1.js";import"./DialogModal-845ab2e1.js";import"./SectionTitle-793117b6.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./DangerButton-431e3e64.js";import"./TextInput-1ec894e2.js";import"./SecondaryButton-8ac29245.js";import"./ActionMessage-9f0cc77a.js";import"./PrimaryButton-4aa545a3.js";import"./InputLabel-c769706f.js";import"./FormSection-91f1ee6e.js";import"./DropdownLink-d8a83ce4.js";const d={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},h={key:0},$={key:1},g={key:2},M={__name:"Show",props:{confirmsTwoFactorAuthentication:Boolean,sessions:Array},setup(m){return(t,k)=>(s(),e(n,null,[o(_),i("div",null,[i("div",d,[t.$page.props.jetstream.canUpdateProfileInformation?(s(),e("div",h,[o(f,{user:t.$page.props.auth.user},null,8,["user"]),o(a)])):r("",!0),t.$page.props.jetstream.canUpdatePassword?(s(),e("div",$,[o(l,{class:"mt-10 sm:mt-0"}),o(a)])):r("",!0),t.$page.props.jetstream.canManageTwoFactorAuthentication?(s(),e("div",g,[o(u,{"requires-confirmation":m.confirmsTwoFactorAuthentication,class:"mt-10 sm:mt-0"},null,8,["requires-confirmation"]),o(a)])):r("",!0),o(c,{sessions:m.sessions,class:"mt-10 sm:mt-0"},null,8,["sessions"]),t.$page.props.jetstream.hasAccountDeletionFeatures?(s(),e(n,{key:3},[o(a),o(p,{class:"mt-10 sm:mt-0"})],64)):r("",!0)])])],64))}};export{M as default};

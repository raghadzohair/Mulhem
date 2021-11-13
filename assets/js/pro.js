
window.addEventListener('load', ()=>{
const params=(new URL(document.location)).searchParams;
const name=params.get('uname');
document.getElementById('pname').innerHTML=name;
document.getElementById('result-name').innerHTML=name;

})
var caroussel = document.getElementById('caroussel');
var p3 = caroussel.getElementsByTagName('p')[1];
console.log(p3);
p3.addEventListener('mousemove',
function (e) {
    caroussel.style.backgroundColor = 'red';//rgb(' + Math.round(Math.random() * 255); + ',' + Math.round(Math.random() * 255); + ',' + Math.round(Math.random() * 255); + ')';
    p3.style.display = 'none';
});
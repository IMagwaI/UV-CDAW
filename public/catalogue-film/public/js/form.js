"use strict";


$(document).ready(function(){
    $('.popup-btn').click(function(){ 
      var popupBlock = $('#'+$(this).data('popup'));
      popupBlock.addClass('active')
        .find('.fade-out').click(function(){
          popupBlock.css('opacity','0').find('.popup-content').css('margin-top','350px');        
          setTimeout(function(){
            $('.popup').removeClass('active');
            popupBlock.css('opacity','').find('.popup-content').css('margin-top','');
          }, 600);
        });
   });
  });
  function submitBday() {
    var Q4A = "Your birthday is: ";
    var Bdate = document.getElementById('bday').value;
    var Bday = +new Date(Bdate);
    Q4A += Bdate + ". You are " + ~~ ((Date.now() - Bday) / (31557600000));
    var theBday = document.getElementById('resultBday');
    /* theBday.innerHTML = Q4A; */
};
function editProfile(){
  var name = document.getElementById('name').value;
  var phone = document.getElementById('phone').value;
  var bday = document.getElementById('bday').value;
  var image = document.getElementById('input-url').value;
  var adress = document.getElementById('adress').value;
  var profilStatut = document.getElementById('statut').value;
  document.getElementById('resultName').innerHTML = name;
  document.getElementById('resultPhone').innerHTML = phone;
  document.getElementById('resultBday').innerHTML = bday;
  document.getElementById('resultImage').src = image;
  document.getElementById('resultAdress').innerHTML = adress;
  document.getElementById('resultStatut').innerHTML = profilStatut;

 /*  var data = $("#test").serializeArray();
  data.push({name: 'id', value: idUser});
  data.push({name: 'name', value: name});
  data.push({name: 'phone', value: phone});
  data.push({name: 'bday', value: bday});
  data.push({name: 'image', value: image});
  data.push({name: 'adress', value: adress});
  data.push({name: 'profilStatut', value: profilStatut}); */

  var jsonData = {
    "id": idUser,
    "name": name,
    "phone": phone,
    "bday": bday,
    "image": image,
    "adress": adress,
    "profilStatut": profilStatut
 }
var DataReady= JSON.stringify(jsonData);

alert(DataReady);
 $.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$.ajax({
    url: 'profil',
    data: DataReady,
    processData: false,
    contentType: false,
    type: 'POST',
    success: function(data){
      if(data){
        alert(data);
      }
    }
  });
 

  document.getElementById('closef').click();

}


var inputUrlElem = document.getElementById('input-url');
var inputDragElem = document.getElementById('input-drag');
var imagePreviewUrlElem = document.getElementById('image-preview');

var preventDefault = function(event) {
  event.preventDefault();
  event.stopPropagation();
  return false;
}
// apres 
var handleDrop = function(event) {
  var dataTransfer = event.dataTransfer;
  var files = dataTransfer.files;

  for (var i = 0; i < files.length; i++) {
    var file = files[i];
    var reader = new FileReader();

    reader.readAsDataURL(file); 
    reader.addEventListener('loadend', function(event, file) {
      imagePreviewUrlElem.src = this.result;
    });
  }
}
//
inputUrlElem.addEventListener('keyup', function(event) {
  preventDefault(event);
  imagePreviewUrlElem.src = event.target.value;
}, false);

inputDragElem.addEventListener('dragover', preventDefault);
inputDragElem.addEventListener('dragenter', preventDefault);
inputDragElem.addEventListener('drop', function(event) {
  preventDefault(event);
  handleDrop(event);
}, false);

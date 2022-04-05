  
  
function seedClick(e1) {
    document.querySelector('#sdImage').click();
  }
  function displaySeed(e1) {
    if (e1.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e1){
        document.querySelector('#sdDisplay').setAttribute('src', e1.target.result);
      }
      reader.readAsDataURL(e1.files[0]);
    }
  }
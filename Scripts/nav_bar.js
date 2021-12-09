function abrir() {
    document.getElementById("mySidenav").style.width = "250px";
  }
  
  function cerrar() {
    document.getElementById("mySidenav").style.width = "0";
  }
  $('ul').on('click',function(){
    var li=this.children; 
    Object.keys(li).forEach(function(key){ if(key >0){   if(li[key].style.display ==="" || li[key].style.display ==="none"){
      li[key].style.display="block";
    }else{
      li[key].style.display="none";
    } }}  
  )});
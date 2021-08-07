var marginY = 4000;
var destination = 0;
var speed = 30;
var scroller = null;

function ScrollFun(element) {
  destination = document.getElementById(element);

  scroller = setTimeout(function () {
    ScrollFun(element);
  }, 7);

  marginY = marginY + speed;

  if (marginY >= destination) {
    clearTimeout(scroller);
  }
  window.scroll(0, marginY);
}

//search
const searFun =  ()=>{
  let filter = document.getElementById('my-input').value.toUpperCase();

  let myTable = document.getElementById('myTable');

  let tr= myTable.getElementsByTagName('tr');

  for(var i = 0 ; i<tr.length; i++){
      let td = tr[i].getElementsByTagName('td')[0];

      if(td){
          let textValue = td.textContent || td.innerHTML;

          if(textValue.toUpperCase().indexOf(filter) > -1){
              tr[i].style.display="";

          }
          else{
              tr[i].style.display="none";
          }

      }
  }
}

var x = 900;
var des = 0;
var sp = 30;
var scrol = null;

function Scroll(e) {
  des = document.getElementById(e);

  scrol = setTimeout(function () {
    Scroll(e);
  }, 7);

  x = x + sp;

  if (x >= des) {
    clearTimeout(scrol);
  }
  window.scroll(0, x);
}


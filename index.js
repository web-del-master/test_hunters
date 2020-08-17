window.onload = function(){        
        let people_serch__submit = document.querySelector('.people_serch__submit'),
            people_serch = document.querySelector('#people_serch'),
            regExp = /[^A-Za-z0-9_А-Яа-я]/;
            
        function sendAjax(send){
                 
          let url = 'http://localhost/hunter/get_user.php?search=' + String(send);
          let XML = new XMLHttpRequest();
  
              XML.open('GET',url);
              XML.send();
  
              XML.onreadystatechange = function(){                
                  if(!XML.readyState == 4){
                    alert('Сервер временно недоступен');
                  }
              };
      }  
        
        

        people_serch__submit.onclick = (event)=>{
            event.preventDefault();
            let date = people_serch.value;
            if(!regExp.test(date)){
              sendAjax(date);
            }else{
              sendAjax('false');
            }
        }    
}
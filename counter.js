let minus=document.getElementById('sub');
 let plus=document.getElementById('add');
 let count=document.getElementById('count');
 let a=1;

 plus.addEventListener('click',() => {

         a++;
         count.innerHTML  = a;

     });

     minus.addEventListener('click',() => {

        a--;
        count.innerHTML  = a;

    });
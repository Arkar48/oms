// var deletebtn=document.querySelector('.delete');
// deletebtn.addEventListener('click',function(){
//     let message=confirm("Are you sure to delete?");
//     if(message){
//         let id = $(this).parent('td').attr('id');
//         $.ajax(
//             {
//                 url:'delete_category.php',
//                 type: 'post',
//                 data: {id:id},
//                 success:function(response){
//                     console.log(response)
//                 },

//                 error:function(){

//                 }
//             }
//         )
//     }
// })

var tbody = document.getElementById('tbody')
tbody.addEventListener('click',function(e){
    console.log(e.target);
    let deletebtn=e.target;
    let tr=deletebtn.parentNode.parentNode
    if(deletebtn.innerText=="Delete"){
        let message = confirm("Are you sure to delete?");
        if(message){
            let id=deletebtn.parentNode.getAttribute('id');
            console.log(id);
            $.ajax(
                {
                    url:'delete_category.php',
                    type: 'post',
                    data: {id:id},
                    success:function(response){
                        console.log(response)
                        if(response==="fail"){
                            alert("You cannot delete this category");
                        }
                        else{
                            tbody.removeChild(tr)
                        }
                    },
    
                    error:function(){
    
                    }
                }
            )
        }
    }
})
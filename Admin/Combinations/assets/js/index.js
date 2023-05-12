
$(document).ready(function(){
    
    let sPageURL = window.location.search.substring(1)

    if(sPageURL.length>0){
        let flag=sPageURL.split('=')[1]
        if(flag=='success'){
            $('#success').css({
                'display':'block'
            })
        $('.btn-close').click(()=>window.location.href='./')
        }else if(flag=='error'){
            $('#error').css({
                'display':'block'
            })
        $('.btn-close').click(()=>window.location.href='./')
    
        }
    }

$.ajax({
method:'POST',
url:'./combinations.php',
data:{'department':true},
success:function(e){
let result=JSON.parse(e)
$("#data").html()
console.table(result)
for(let i=0;i<result.department.length;i++){

$("#data").append(`<tr><td>${i+1}</td><td>${result.department[i]}
<td><span class="btn btn-danger"><a class="text-white" href="./Delete/index.php?id=${result.id[i]}" ><span class="fas fa-trash "></span></span></a></td>
                    
`)
$(`#delete${result.id[i]}`).click(function(){
   $("#firstname").html(result.Firstname[i])
   $("#confirm").attr('href',`./Delete/index.php?id=${result.id[i]}`)
})
}

$('#dataTable').DataTable({
    dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
});

}      
})
})

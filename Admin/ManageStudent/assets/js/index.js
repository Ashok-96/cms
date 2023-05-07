
$(document).ready(function(){
    $.ajax({
        method:'POST',
        url:'./students.php',
        data:{'Combin_list':true},
        success:function(e){
           let result=JSON.parse(e)
           $("#combination_list").html(`<option value="#N/A">---Select Combination---</option>`)
           result.Combin_list.map(e=>$("#combination_list").append(`<option value="${e}">${e}</option>`))
        }

            }) 
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
url:'./students.php',
data:{'Teachers':true},
success:function(e){
let result=JSON.parse(e)
$("#data").html()
for(let i=0;i<result.Firstname.length;i++){

$("#data").append(`<tr><td>${i+1}</td><td>${result.reg_date[i]}</td><td>${result.Firstname[i]}</td><td>${result.Lastname[i]}</td><td>${result.combination[i]}</td><td>${result.semester[i]}</td><td>${result.phone[i]}</td><td><a href="./Edit/index.html?id=${result.id[i]}" class="btn btn-outline-primary "><i class="fa fa-cog">&nbsp;</i></a>&nbsp;<button id="delete${result.id[i]}" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    <i class="fas fa-trash"></i>
                    </button></td></tr>
                    
`)
$(`#delete${result.id[i]}`).click(function(){
   $("#firstname").html(result.Firstname[i])
   $("#confirm").attr('href',`./Delete/index.php?id=${result.id[i]}`)
})
}

$('#dataTable').DataTable();

}      
})
})

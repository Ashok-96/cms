$(document).ready(function(){
    $.ajax({
        method:'POST',
        url:'./Teacher.php',
        data:{'Dept_list':true},
        success:function(e){
           let result=JSON.parse(e)
           $("#Department").html(`<option value="#N/A">---Select Department---</option>`)
           result.Combin_list.map(e=>$("#Department").append(`<option value="${e}">${e}</option>`))
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
        url:'./Teacher.php',
        data:{'Teachers':true},
        success:function(e){
            let result=JSON.parse(e)
            $("#data").html()
            for(let i=0;i<result.Firstname.length;i++){

$("#data").append(`<tr class="text-center">
<td>${result.Firstname[i]}</td><td>${result.Lastname[i]}</td><td>${result.Department[i]}</td><td><a href="./Edit/index.html?id=${result.id[i]}" class="btn btn-outline-primary "><i class="fa fa-cog">&nbsp;</i></a>&nbsp;<a href="./Delete/index.php?id=${result.id[i]}" class="btn btn-outline-danger "><i class="fa fa-trash">&nbsp;</i></a></td></tr>
       
`)
}
    $('#dataTable').DataTable();

    }      
    })
    })

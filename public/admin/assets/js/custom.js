$(document).ready(function(){
    // check admin password is correct or not
    $("#oldPassword").keyup(function(){
        var oldPassword = $("#oldPassword").val();
        // alert(oldPassword);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admin/check-admin-password',
            data:{oldPassword:oldPassword},
            success:function(resp){
                if(resp=="false"){
                    $("#check-password").html("<font color='red'>Password yang anda masukkan salah!</font>");
                }else if(resp=="true"){
                    $("#check-password").html("<font color='green'>Password yang anda masukkan benar</font>");
                }
            },error:function(){
                alert('Error');
            }
        });
    })
});

$(document).ready(function(){
	$(".item_name").keyup(function() {
        var textlen = $(this).val().length;
        //disable the add button at least if there is input
        if(textlen > 1){ 
            $('.add_item_btn').removeAttr("disabled");
        }else{
            $('.add_item_btn').prop("disabled", true);
        }
    });

    //delete 
    $(".trash_item").click(function(e){
    	e.preventDefault();
        //clear alert div
        $("#alerts-holder").html("");
        var item = $(this).attr("item");
        if(item){
            $.post( "services/remove-item.php", { deleteId: item })
            .done(function( data ) {
            	if(data === "success"){
            	    //location.reload();
                    window.location =  "index.php?msg=delete";
                }else{
                 	$("#alerts-holder").html("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Record not deleted, please try again.</div>");                            
            	}
            })
            .fail(function( err ) {
                $("#alerts-holder").html( "ERROR: " + err );
            });
        }
    });

    //done task
    $(".update_status").click(function(){
        $("#alerts-holder").html("");
        var item = $(this).attr("item");
        var status = $(this).attr("data");
        if(status === "check"){ //only update checked
            $.post( "services/task-done.php", { editId: item, status: status })
            .done(function( data ) {
                if(data === "success"){
                    window.location = "index.php?msg=update";
                }else{
                    $("#alerts-holder").html("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Something went wrong, please try again.</div>");
                }
            })
            .fail(function( err ) {
                $("#alerts-holder").html( "ERROR: " + err );
            });
        }
    });
});
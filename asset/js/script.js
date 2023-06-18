$(()=>{
    $('#vegetablesCheck').change(()=>{
        if($('#vegetablesCheck').prop('checked')){
            filter('#vegetablesCheck');
        } else {
            filter();
        }
    })
    $('#fruitsCheck').change(()=>{
        if($('#fruitsCheck').prop('checked')){
            filter('#fruitsCheck');
        }else {
            filter();
        }
    })
    $('#seedsCheck').change(()=>{
        if($('#seedsCheck').prop('checked')){
            filter('#seedsCheck');
        }else {
            filter();
        }
    })
    $('#berriesCheck').change(()=>{
        if($('#berriesCheck').prop('checked')){
            filter('#berriesCheck');
        }else {
            filter();
        }
    })
    $('#clearBtn').click(()=>{
        $('.form-control').each(function(){
            $(this).val("");
        });
    })

    function filter(chekcboxId = ""){
        let category = ""
        if (chekcboxId != "") {
            $('.categoryCheck').each(function(){
                $(this).prop('checked', false);
            });
            $(chekcboxId).prop('checked', true);
            category = $(chekcboxId).val();
        }
        let p = new Promise((ok, no) => {
            $.post("http://localhost/ProjectPemweb/index.php?c=product&m=filterproduct", {
              category: category,
            })
              .then((result) => {
                            ok(result);
                        })
              .catch((error) => {
                            no(error);
                        });
                    }).then(
                        (result) => {
                            
                            $("#productContainer").fadeOut('slow', ()=> {
                                $("#productContainer").html(result);
                                $("#productContainer").fadeIn('slow');
                            });
                    }, (error) => {}
          );
    }
});
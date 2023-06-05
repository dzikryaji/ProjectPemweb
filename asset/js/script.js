$(()=>{
    $('#vegetablesCheck').change(()=>{
        if($('#vegetablesCheck').prop('checked')){
            filter('#vegetablesCheck');
        } else {
            window.location.replace('./');
        }
    })
    $('#fruitsCheck').change(()=>{
        if($('#fruitsCheck').prop('checked')){
            filter('#fruitsCheck');
        }else {
            window.location.replace('./');
        }
    })
    $('#seedsCheck').change(()=>{
        if($('#seedsCheck').prop('checked')){
            filter('#seedsCheck');
        }else {
            window.location.replace('./');
        }
    })
    $('#berriesCheck').change(()=>{
        if($('#berriesCheck').prop('checked')){
            filter('#berriesCheck');
        }else {
            window.location.replace('./');
        }
    })

    function filter(chekcboxId){
        let category = $(chekcboxId).val();
        let redirect = "./index.php?p=" + category;
        window.location.replace(redirect);
    }
});
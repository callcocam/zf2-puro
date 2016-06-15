class Manager extends SIGAMessages {
    constructor() {
        super();
        this.formManger= $(".Manager");
        this.save = $("#save");
        this.save_copy = $("#save_copy");
        this.id = $("#id");
        this.codigo = $("#codigo");
        this.ManagerFormOption = {
            beforeSubmit: null, // pre-submit callback 
            success: null, // post-submit callback 
            type: 'post', // 'get' or 'post', override for form's 'method' attribute 
            dataType: 'json' // 'xml', 'script', or 'json' (expected server response type) 
        };

    }

    showRequest(formData, jqForm, options) {
        $(_Manager.carregando).fadeIn('fast');
        $(_Manager.target).empty().removeClass(_this.classeResult);
        return true;
    }; // post-submit callback 

    showResponse(responseText, statusText, xhr, $form) {
        $(_Manager.carregando).hide('fast');
        _Manager.messageSiga(responseText.msg, responseText.class);
        _Manager.result = responseText.result;
        //console.log(responseText.action);
        if ($(responseText.action).length) {
            if (responseText.result) {
                $(responseText.action).change();
            }
        }
    }

}

$(function()
{
   _Manager=new Manager();
   _Manager.ManagerFormOption.beforeSubmit=_Manager.showRequest;
   _Manager.ManagerFormOption.success=_Manager.showResponse;
   _Manager.formManger.ajaxForm(_Manager.ManagerFormOption);
})
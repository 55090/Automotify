var validator = {
    /**
     * Object containing all fields for the contact form
     */
    form : {
        first      :  $('#first_name'),
        last       :  $('#last_name'),
        street     :  $('#street'),
        zip        :  $('#zip'),
        city       :  $('#city'),
        phone      :  $('#phone'),
        email      :  $('#email'),
        hsn        :  $('#hsn'),
        tsn        :  $('#tsn'),
        regDate    :  $('#registry_date'),
        service    :  $('#topic'),
        insuranceC :  $('#insurance_company'),
        insuranceN :  $('#insurance_company'),
        insuranceD :  $('#insurance_company'),
        appDate    :  $('#appointment_date'),
        appTime    :  $('#appointment_time'),
        message    :  $('#message')
    },

    /**
     * Object containing needed regular expression
     */
    filters : {
        email   :  /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,7}|[0-9]{1,3})(\]?)$/,
        textF   :  /^[A-Za-zÄÁÀÂäáàâÖÓÒÔöóòôÜÚÙÛüúùûéèêíìîß]{3,25}$/,
        street  :  /^([A-Za-zÄÁÀÂäáàâÖÓÒÔöóòôÜÚÙÛüúùûéèêíìîß\s\-]{3,50})+([\s])+([0-9]{1,10})+([A-Za-zÄÁÀÂäáàâÖÓÒÔöóòôÜÚÙÛüúùûéèêíìîß\s\-0-9]{0,20})$/,
        zip     :  /^([0]{1}[1-9]{1}|[1-9]{1}[0-9]{1})[0-9]{3}$/,
        phone   :  /^((\+|00)[1-9]\d{0,3}|0 ?[1-9]|\(00? ?[1-9][\d ]*\))[\d\-\/\s]*$/,
        hsn     :  /^[0-9]{4}$/,
        tsn     :  /^[A-Za-z]{3}$|^[0-9]{3}$/,
        dateA   :  /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/,
        dateB   :  /(^(((0[1-9]|[12][0-8])([\/]|[\.]|[\-])(0[1-9]|1[012]))|((29|30|31)([\/]|[\.]|[\-])(0[13578]|1[02]))|((29|30)([\/]|[\.]|[\-])(0[4,6,9]|11)))([\/]|[\.]|[\-])(19|[2-9][0-9])\d\d$)|(^29([\/]|[\.]|[\-])02([\/]|[\.]|[\-])(19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)/,
        dateC   :  /^\d{1,2}[\.|\-|\/]{1}\d{1,2}[\.|\-|\/]{1}(\d{2}|\d{4})$/
    },

    /**
     * callback when document has finished loading / is ready
     */
    onReady : function(){
        validator.form.first  .keyup(validator.validateText);
        validator.form.first  .focus(validator.validateText);
        validator.form.first  .change(validator.validateText);
        validator.form.last   .keyup(validator.validateText);
        validator.form.last   .focus(validator.validateText);
        validator.form.last   .change(validator.validateText);
        validator.form.street .keyup(validator.validateStreet);
        validator.form.street .focus(validator.validateStreet);
        validator.form.street .change(validator.validateStreet);
        validator.form.zip    .keyup(validator.validateZIP);
        validator.form.zip    .focus(validator.validateZIP);
        validator.form.zip    .change(validator.validateZIP);
        validator.form.city   .keyup(validator.validateText);
        validator.form.city   .focus(validator.validateText);
        validator.form.city   .change(validator.validateText);
        validator.form.phone  .keyup(validator.validateTelephone);
        validator.form.phone  .focus(validator.validateTelephone);
        validator.form.phone  .change(validator.validateTelephone);
        validator.form.email  .keyup(validator.validateEmail);
        validator.form.email  .focus(validator.validateEmail);
        validator.form.email  .change(validator.validateEmail);
        validator.form.hsn    .keyup(validator.validateHSN);
        validator.form.hsn    .focus(validator.validateHSN);
        validator.form.hsn    .change(validator.validateHSN);
        validator.form.tsn    .keyup(validator.validateTSN);
        validator.form.tsn    .focus(validator.validateTSN);
        validator.form.tsn    .change(validator.validateTSN);
        validator.form.regDate.keyup(validator.validateDate);
        validator.form.regDate.focus(validator.validateDate);
        validator.form.regDate.change(validator.validateDate);
        validator.form.appDate.keyup(validator.validateDate);
        validator.form.appDate.focus(validator.validateDate);
        validator.form.appDate.change(validator.validateDate);
    },

    /**
     * callback for events when entering in standard text inputs
     * @param event the corresponding event
     */
    validateText: function(event){
        var element = event.target || event.srcElement;
        if (!validator.filters.textF.test($(element).val())) {
            $(element).css('box-shadow', '0 0 20px #F00');
        } else {
            $(element).css('box-shadow', '0 0 20px #3A2');
        }
    },

    /**
     * callback for events when entering in street and house number text inputs
     * @param event the corresponding event
     */
    validateStreet : function(event){
        var element =  event.target || event.srcElement;
        if (!validator.filters.street.test($(element).val())) {
            $(element).css('box-shadow', '0 0 20px #F00');
        } else {
            $(element).css('box-shadow', '0 0 20px #3A2');
        }
    },
    /**
     * callback for events when entering in zip code text inputs
     * @param event the corresponding event
     */
    validateZIP : function(event){
        var element =  event.target || event.srcElement;
        if (!validator.filters.zip.test($(element).val())) {
            $(element).css('box-shadow', '0 0 20px #F00');
        } else {
            $(element).css('box-shadow', '0 0 20px #3A2');
        }
    },

    /**
     * callback for events when entering in telephone text inputs
     * @param event the corresponding event
     */
    validateTelephone : function(event){
        var element =  event.target || event.srcElement;
        if (!validator.filters.phone.test($(element).val())) {
            $(element).css('box-shadow', '0 0 20px #F00');
        } else {
            $(element).css('box-shadow', '0 0 20px #3A2');
        }
    },

    /**
     * callback for events when entering in email text inputs
     * @param event the corresponing event
     */
    validateEmail : function(event){
        var element =  event.target || event.srcElement;
        if (!validator.filters.email.test($(element).val())) {
            $(element).css('box-shadow', '0 0 20px #F00');
        } else {
            $(element).css('box-shadow', '0 0 20px #3A2');
        }
    },

    /**
     * callback for events when entering in hsn text inputs
     * @param event the corresponding event
     */
    validateHSN : function(event){
        var element =  event.target || event.srcElement;
        if (!validator.filters.hsn.test($(element).val())) {
            $(element).css('box-shadow', '0 0 20px #F00');
        } else {
            $(element).css('box-shadow', '0 0 20px #3A2');
        }
    },

    /**
     * callback for events when entering in tsn text inputs
     * @param event the corresponding event
     */
    validateTSN : function(event){
        var element =  event.target || event.srcElement;
        var s = $(element).val().toUpperCase();
        if (!validator.filters.tsn.test(s)) {
            $(element).css('box-shadow', '0 0 20px #F00');
            $(element).val(s);
        } else {
            $(element).css('box-shadow', '0 0 20px #3A2');
            $(element).val(s);
        }
    },

    /**
     * callback for events when entering in date text inputs
     * @param event the corresponding event
     */
    validateDate : function(event){
        var element =  event.target || event.srcElement;
        //var options = { year: 'numeric', month: '2-digit', day: '2-digit' };

        if ( !validator.filters.dateC.test( $( element ).val() ) ) {
            $( element ).css('box-shadow', '0 0 20px #F00');
        } else {
            $( element ).css('box-shadow', '0 0 20px #3A2');
        }
    }
};

$( document ).ready( validator.onReady );
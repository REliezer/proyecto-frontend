function transformSelectedInputs() {

    var formData = {};

    var selectedInputs = document.getElementsByClassName('obj-enviar');

    for (var i = 0; i < selectedInputs.length; i++) {
        var input = selectedInputs[i];
        formData[input.name] = input.value;
    }

    document.getElementById('formData').value =  formData; //JSON.stringify(formData); // JSON.parse(formData); 

    // Submit the form
    document.getElementById('myForm').submit();
}
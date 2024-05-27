function maskCpf(input) {
    let cpfValue = input.value;

    cpfValue = cpfValue.replace(/\D/g, '');

    if (cpfValue.length <= 11) {
        cpfValue = cpfValue.replace(/(\d{3})(\d)/, '$1.$2');
        cpfValue = cpfValue.replace(/(\d{3})(\d)/, '$1.$2');
        cpfValue = cpfValue.replace(/(\d{3})(\d{1,2})/, '$1-$2');
    }

    input.value = cpfValue;
}

const handlePhone = (event) => {
    let input = event.target;
    input.value = phoneMask(input.value);
}

const phoneMask = (value) => {
    if (!value) return "";
    value = value.replace(/\D/g,'');
    value = value.replace(/(\d{2})(\d)/,"($1) $2");
    value = value.replace(/(\d)(\d{4})$/,"$1-$2");
    return value;
}



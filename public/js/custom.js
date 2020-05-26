let btnAdd = document.querySelector('#add');
let btnSubtract = document.querySelector('#subtract');
let input = document.querySelector('#input_number');

btnAdd.addEventListener('click',  () => {
    input.value = parseInt(input.value) + 1;
});
btnSubtract.addEventListener('click',  () => {
    var val = parseInt(input.value);
    if ( val > 0) {
        input.value = val - 1;
    }
});
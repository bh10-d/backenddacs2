const convertnumber = (number) => {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    // const test = convertnumber(10000000);
let price = document.getElementsByClassName("price-custom-hieu");
var convert = 0;
for (var i = 0; i < price.length; i++) {
    var convert = parseInt(price[i].innerText);
    price[i].innerHTML = convertnumber(convert);
}

console.log(convertnumber(convert));
// console.log(convert);
// console.log(price);

// let test = '100,000,000,0';
// let test1 = '';
// for (var i = 0; i < test.length; i++) {
//     if (test[i] !== ',') {
//         test1 += test[i];
//     }
// }
// console.log(test1);
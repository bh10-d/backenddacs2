const convertnumber = (number) => {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
const test = convertnumber(10000000);
let price = document.getElementsByClassName("product__price");
// let convert = price.val();
console.log(price);
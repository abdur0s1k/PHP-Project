function squareDigits(n) {
    let result = "";

    for (let digit of n.toString()) {
        let num = parseInt(digit, 10); // Преобразуем символ в число
        result += (num * num).toString(); // Возводим в квадрат и добавляем к строке
    }

    return parseInt(result, 10); // Преобразуем строку обратно в число
}

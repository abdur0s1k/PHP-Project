function expandedForm(num) {
    let result = "";
    let placeValue = 1;

    while (num > 0) {
        const digit = num % 10; // Получаем последнюю цифру
        if (digit !== 0) {
            const expandedPart = (digit * placeValue).toString();
            result = expandedPart + (result === "" ? "" : " + " + result); // Добавляем развернутую часть
        }
        num = Math.floor(num / 10); // Убираем последнюю цифру
        placeValue *= 10; // Переходим к следующему разряду
    }

    return result;
}

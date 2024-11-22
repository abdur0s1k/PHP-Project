function expandedForm(num) {
    let result = "";
    let placeValue = 1;

    while (num > 0) {
        const digit = num % 10; 
        if (digit !== 0) {
            const expandedPart = (digit * placeValue).toString();
            result = expandedPart + (result === "" ? "" : " + " + result); 
        }
        num = Math.floor(num / 10); 
        placeValue *= 10; 
    }

    return result;
}

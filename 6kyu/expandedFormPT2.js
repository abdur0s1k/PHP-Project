function expandedForm(num) {
    const [integerPart, decimalPart] = num.toString().split('.');

    const integerExpanded = [];
    for (let i = 0; i < integerPart.length; i++) {
        const digit = integerPart[i];
        if (digit !== '0') {
            integerExpanded.push(digit + '0'.repeat(integerPart.length - i - 1));
        }
    }

    const decimalExpanded = [];
    if (decimalPart) {
        for (let i = 0; i < decimalPart.length; i++) {
            const digit = decimalPart[i];
            if (digit !== '0') {
                decimalExpanded.push(`${digit}/${10 ** (i + 1)}`);
            }
        }
    }

    return [...integerExpanded, ...decimalExpanded].join(' + ');
}

console.log(expandedForm(807.304)); 
console.log(expandedForm(1.24));  
console.log(expandedForm(7.304));   
console.log(expandedForm(0.04));   

function digitalRoot(n) {
    while (n >= 10) {
        let sum = 0;
        while (n > 0) {
            sum += n % 10;
            n = Math.floor(n / 10);
        }
        n = sum;
    }
    return n;
}

console.log(digitalRoot(942)); // 6
console.log(digitalRoot(132189)); // 6
console.log(digitalRoot(493193)); // 2

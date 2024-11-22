function disemvowel(str) {
    const vowels = "aeiouAEIOU";
    let result = "";

    for (let char of str) {
        if (!vowels.includes(char)) {
            result += char;
        }
    }

    return result;
}

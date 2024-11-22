function removeEveryOther(arr) {
    const result = [];

    arr.forEach((value, index) => {
        if (index % 2 === 0) {
            result.push(value);
        }
    });

    return result;
}

// Пример использования
const arr = ["Keep", "Remove", "Keep", "Remove", "Keep"];
const result = removeEveryOther(arr);

console.log(result); 

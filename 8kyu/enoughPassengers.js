function enough(cap, on, wait) {
    const totalPeople = on + wait;

    if (totalPeople <= cap) {
        return 0;
    }

    return totalPeople - cap;
}


console.log(enough(10, 5, 5)); // 0
console.log(enough(10, 5, 6)); // 1
console.log(enough(100, 60, 50)); // 10

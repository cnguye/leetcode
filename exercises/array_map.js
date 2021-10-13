// 1. Make an array of numbers that are doubles of the first array

function doubleNumbers(arr) {
    return arr.map((num) => num * 2);
}
console.log("Problem 1.");
console.log(doubleNumbers([2, 5, 100])); // [4, 10, 200]

// 2. Take an array of numbers and make them strings
function stringItUp(arr) {
    return arr.map((num) => num.toString());
}
console.log("Problem 2.");
console.log(stringItUp([2, 5, 100])); // ["2", "5", "100"]

// 3. Capitalize each of an array of names
function capitalizeNames(arr) {
    return arr.map(
        (num) =>
            num.toLowerCase().charAt(0).toUpperCase() +
            num.slice(1).toLowerCase()
    );
}
console.log("Problem 3.");
console.log(capitalizeNames(["john", "JACOB", "jinGleHeimer", "schmidt"])); // ["John", "Jacob", "Jingleheimer", "Schmidt"]

// 4. Make an array of strings of the names
function namesOnly(arr) {
    // return arr.filter(person => person.age > 20).map(person => person.name)
    // return arr.reduce((filtered, person) => {
    //     if(person.age > 20){
    //         filtered.push(person.name);
    //     }
    //     return filtered;
    // }, [])
    return arr.map((person) => person.name);
}
console.log("Problem 4.");
console.log(
    namesOnly([
        {
            name: "Angelina Jolie",
            age: 80,
        },
        {
            name: "Eric Jones",
            age: 2,
        },
        {
            name: "Paris Hilton",
            age: 5,
        },
        {
            name: "Kayne West",
            age: 16,
        },
        {
            name: "Bob Ziroll",
            age: 100,
        },
    ])
);
// ["Angelina Jolie", "Eric Jones", "Paris Hilton", "Kayne West", "Bob Ziroll"]

// 5. Make an array of strings of the names saying whether or not they can go to The Matrix
function makeStrings(arr) {
    return arr.map((person) =>
        person.age > 20
            ? `${person.name} can go to The Matrix`
            : `${person.name} is under age!!`
    );
}
console.log("Problem 5.");
console.log(
    makeStrings([
        {
            name: "Angelina Jolie",
            age: 80,
        },
        {
            name: "Eric Jones",
            age: 2,
        },
        {
            name: "Paris Hilton",
            age: 5,
        },
        {
            name: "Kayne West",
            age: 16,
        },
        {
            name: "Bob Ziroll",
            age: 100,
        },
    ])
);
// ["Angelina Jolie can go to The Matrix",
// "Eric Jones is under age!!",
// "Paris Hilton is under age!!",
// "Kayne West is under age!!",
// "Bob Ziroll can go to The Matrix"]

// 6. Make an array of the names in h1s, and the ages in h2s
function readyToPutInTheDOM(arr) {
    return arr.map((person) => `<h1>${person.name}</h1><h2>${person.age}</h2>`);
}
console.log("Problem 6.");
console.log(
    readyToPutInTheDOM([
        {
            name: "Angelina Jolie",
            age: 80,
        },
        {
            name: "Eric Jones",
            age: 2,
        },
        {
            name: "Paris Hilton",
            age: 5,
        },
        {
            name: "Kayne West",
            age: 16,
        },
        {
            name: "Bob Ziroll",
            age: 100,
        },
    ])
);
// ["<h1>Angelina Jolie</h1><h2>80</h2>",
// "<h1>Eric Jones</h1><h2>2</h2>",
// "<h1>Paris Hilton</h1><h2>5</h2>",
// "<h1>Kayne West</h1><h2>16</h2>",
// "<h1>Bob Ziroll</h1><h2>100</h2>"]

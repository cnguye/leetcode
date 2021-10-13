let myObj = {
    key: "value",
    hello: "bye",
    in: "out",
    under: "over",
    win: "lose",
    heavy: "lightweight",
    dark: {
        key2: "value2",
        hello2: "bye2",
    },
};

let myArr = [1,2,3,4,5,6];
for (const [key, value] of Object.entries(myArr)) {
    console.log(key, value);
}

for(const items in myArr){
    // console.log(items, myArr[items]);
}

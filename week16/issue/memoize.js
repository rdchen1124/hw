function complex(num){
    console.log(num ,'wait');
    return num*2
}


function memoize(fn){
    let cache = {};
    return (n)=>{
        if(!cache[n]){
            cache[n] = fn(n)
        }
        return cache[n]
    }
}

const memoizeFn = memoize(complex);
const first_1 = memoizeFn(1);
console.log(first_1);
const second_1 = memoizeFn(1);
console.log(second_1);
const first_10 = memoizeFn(10);
console.log(first_10);
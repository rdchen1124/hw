function sayArgs(...args){
    console.log(args);
}

const sleep = (ms) => new Promise(resolve=>{ setTimeout(resolve, ms) });

function deboubce(fn, delay){
    let timer = null;
    return function(...args){
        if(timer){
            clearTimeout(timer);
        }
        timer = setTimeout(()=> fn(...args), delay);
    }
}

async function test(){
    const debounceFn = deboubce(sayArgs, 250);

    debounceFn('9','1','1');
    await sleep(500);
    debounceFn('6','6','6');
    await sleep(2000);
    debounceFn('9','5','2','7');
}
test();
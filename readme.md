# Speaking JS ES5

## Part III

## Standard Global Variables
- browser have many global variables
- all of them are inherited or own of global object



## Constructors
- Array
- Boolean
- Date
- Function
- Number
- Object
- RegExp
- String



## Error Constructors
- Error
- EvalError
- RangeError
- ReferenceError
- SyntaxError
- TypeError
- URIError



## Nonconstructor Functions (Simple Functions)
- `encodeURI(uri)`
    - Special character are all treated as unicode
    - URI characters not `; , / ? : @ & = + $ #`
    - and are also not encoded `a-z A-Z 0-9 - _ . ! ~ * ' ( )`
     
```angular2html
> encodeURI('http://example.com/Für Elise/')
'http://example.com/F%C3%BCr%20Elise/'
```

- `encodeURIComponent(uriComponent)`
    - all are treated as unicode
    - except `a-z A-Z 0-9 - _ . ! ~ * ' ( )`

- `decodeURI(encodedURI)`
    - reverse of `encodeURI(uri)`
    
- `decodeURIComponent(encodedURIComponent)`
    - reverse of `encodeURIComponent(uriComponent)`
    
- Deprecated
    - `escape(str)`
    - `unescape(str) `
    


### Categorizing and Parsing Numbers
- `isFinite(number)`
- `isNaN(value)`
- `parseFloat(string)`
- `parseInt(string, radix)`



## Dynamically Evaluating JavaScript Code via eval() and new Function()



### Evaluating Code Using eval()
- code `eval(str)`
- eval parses the string through regex
```angular2html
> var a = 12;
> eval('a + 5')
17
```
- function or object should be in parenthesis or eval will not work
```angular2html
> eval('{ foo: 123 }')  // code block
123
> eval('({ foo: 123 })')  // object literal
{ foo: 123 }
```



#### Use eval() in strict mode
- eval will not preform in strict mode in some cases
```angular2html
function sloppyFunc() {
    eval('var foo = 123');  // added to the scope of sloppyFunc
    console.log(foo);  // 123
}

function strictFunc() {
    'use strict';
    eval('var foo = 123');
    console.log(foo);  // ReferenceError: foo is not defined
}
```



#### Indirect eval() evaluates in global scope
- calling through a global variable or through `call` method
```angular2html
var x = 'global';
function directEval() {
    'use strict';
    var x = 'local';

    console.log(eval('x')); // local
}


var x = 'global';

function indirectEval() {
    'use strict';
    var x = 'local';

    // Don’t call eval directly
    console.log(eval.call(null, 'x')); // global
    console.log(window.eval('x')); // global
    console.log((1, eval)('x')); // global (1)

    // Change the name of eval
    var xeval = eval;
    console.log(xeval('x')); // global

    // Turn eval into a method
    var obj = { eval: eval };
    console.log(obj.eval('x')); // global
}
```



### Evaluating Code Using new Function()
- `new Function()` is better then `evel`
- `Function()` has this signature
```angular2html
new Function(param1, ..., paramN, funcBody)
```

- example
```angular2html
> var f = new Function('x', 'y', 'return x+y');
> f(3, 4)
7
```

- `new Function` also creates variable with global scope
```angular2html
var x = 'global';

function strictFunc() {
    'use strict';
    var x = 'local';

    var f = new Function('return x');
    console.log(f()); // global
}
```

- this function is also sloppy by default
```angular2html
function strictFunc() {
    'use strict';

    var sl = new Function('return this');
    console.log(sl() !== undefined); // true, sloppy mode

    var st = new Function('"use strict"; return this');
    console.log(st() === undefined); // true, strict mode
}
```


### Best Practices
- avoid both `eval` and `new Function()`
- they are both costly and have potential risk
- they should also not to be used parse json



## Console Api



### Simple logging
- `console.clear()`
    - clear the console
    
- `console.debug(object1, object2?, ...)`
    - same as `console.log`
    
- `console.error(object1, object2?, ...)`
    - shows message with error
    
- `console.info(object1?, object2?, ...)`
    - same as `console.log`
    
- `console.log(object1?, object2?, ...)`
    - outputs values to console
    
- `console.trace()`
    - logs the trace
    
- `console.warn(object1?, object2?, ...)`
    - same as log but shows warning
    


### Checking and Counting
- `console.assert(expr, obj?)`
    - If expr is false, log obj to the console and throw an exception. If it is true, do nothing.



### Formatted Logging
- `console.dir(object)`
    - Print a representation of the object to the console.
    
    

### Profiling and Timing
- `console.time(label)`
    - Start a timer whose label is label.
- `console.timeEnd(label)`
    - Stop the timer whose label is label and print the time that has elapsed since starting it.
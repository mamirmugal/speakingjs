# Speaking JS ES5

## Part III

## Variables: Scopes, Environments, and Closures

### Declaring a Variable
- declaration and assignment in on line `var a = 1;`
- if variable is only declared, and then accessed it will return `undefined`



### Background: Static Versus Dynamic
- `Statically (or lexically)`
    - the code runs the same as it is coded
```
function f() {
	function g() {
	}
}
```

- `Dynamically`
    - the code runs differently as its relation is dynamic
```
function g() {
}
function f() {
	g();
}
```


### The Scope of a Variable
- is the location where is variable is accessible

- `Lexical Scoping`
    - the code specifies the scope and it dont change at runtime

- `Nested Scope`
    - if there are nested scope within direct scope of the variable then the variable is accessible in all of them
```
function foo(arg) {
    function bar() {
        console.log('arg: '+arg);
    }
    bar();
}
console.log(foo('hello')); // arg: hello
```

- `Shadowing Scope`
    - outer and inner variable name is similar, in that case they will retain their scope and outer will not effect the inner
```
var x = "global";
function f() {
    var x = "local";
    console.log(x); // local
}

f();
console.log(x); // global
```



### Variables Are Function-Scoped
- in Js the variables are scoped inside a function, but in brackets like some other languages



### Variable Declarations Are Hoisted
- variable are hoisted but, variable without value is `undefined`
```
function f() {
    var bar;
    console.log(bar);  // undefined
    bar = 'abc';
    console.log(bar);  // abc
}
```

- in `strict` mode will give error if variable is not declared
```
function strictFunc() { 
	'use strict'; 
	x = 123 
}

strictFunc()
ReferenceError: x is not defined
```



### Introducing a New Scope via an IIFE (immediately invoked function expression)
- to restrict variable scope we can use IIFE
```
function f() {
    if (condition) {
        (function () {  // open block
            var tmp = ...;
        }());  // close block
    }
}
```

**NOTE**
- IIFE, should be a anonymous function
- should have parenthesis following the closing brackets
- if 2 IIFE are declared then first should end with semicolon, otherwise second will not run
- IIFE are both costly cognitively and performance wise, so it should be use rarely




### IIFE Variation: Prefix Operators
- this helps in removing parentheses and run the function without semicolon
- it also tell the parser that this is not a function declaration, we can also use `-, !, ~, void`
```
+function() { console.log("Foo!"); }()
!function() { console.log("Foo!"); }()
```



### IIFE Variation: Already Inside Expression Context
- when enforcing expression context we dont need prefix operator
```
var File = function () { // open IIFE
    console.log("called")
}();
called
```



### IIFE Variation: An IIFE with Parameters
-  we can pass variable or set it global
```
var x = 23;
(function (twice) {
    console.log(twice);
}(x * 2));
```

```
var x = 23;
(function () {
    var twice = x * 2;
    console.log(twice);
}());
```



### IIFE Applications
- this an enable to tightly package the data to a function, without using the global variable
- this value will be retained in the function and updated when called
```
var setValue = function () {
    var prevValue;
    return function (value) { // define setValue
        if (value !== prevValue) {
            console.log('Changed: ' + value);
            prevValue = value;
        }
        console.log('private value: ' + prevValue);
    };
}();
```



### Global Variables
- variable defined in global scope are global variables

**Note**
- 2 Disadvantages
    - they are less robust, behave less predictably and are less reusable
    - it global so any js code can access it so there can be name clash
- we can use IIFE to solve this problem or with functions
- modular system also eliminates the problem of global variable



### The Global Object
- global variables are accessible global object `this` or `window`, which points to global/window



### Cross-Platform Considerations
- in browser there is one `this` and `window` per window, like iframe
- in nodejs there are module system so `this` in module is not equal to `global`
- dont use `window.foo` or `global.foo` in code, because if the variable scope is changed this will throw error
- if we need to check `browser api` or `new api` then we need to use window object `window.navigator`
- if there are not present then we can use `shim` (provides new apis, html5 library) or `polyfill` (provides browser apis, navigator)
    - we can check by
```
if (window.someVariable !== undefined) { ... }
if ('someVariable' in window) { ... }
```

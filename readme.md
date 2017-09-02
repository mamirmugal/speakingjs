# Speaking JS ES5

## Part IV

## A Meta Code Style Guide

- [Idiomatic.js](https://github.com/rwaldron/idiomatic.js/) 
- [Popular Conventions on GitHub](http://sideeffect.kr/popularconvention/)
- [JavaScript, the winning style](http://seravo.fi/2013/javascript-the-winning-style)



## Commonly Accepted Best Practices
- Use strict mode.
- Always use semicolons
- Always use strict equality (===) and strict inequality (!==)
- Either use only spaces or only tabs for indentation, but don’t mix them
- Choose either double or single quotes. Single quotes are more common in JS
- Avoid global variables 



### Brace Styles



#### 1TBS (One True Brace Style)
```angular2html
// One True Brace Style
function foo(x, y, z) {
    if (x) {
        a();
    } else {
        b();
        c();
    }
}
```



### Prefer Literals to Constructors
```angular2html
var obj = new Object(); // no
var obj = {}; // yes

var arr = new Array(); // no
var arr = []; // yes

var regex = new RegExp('abc'); // avoid if possible
var regex = /abc/; // yes

var arr = new Array('a', 'b', 'c'); // never ever
var arr = [ 'a', 'b', 'c' ]; // yes
```


#### Conditional operator
- Don’t nest the conditional operator
```angular2html
// Don’t:
return x === 0 ? 'red' : x === 1 ? 'green' : 'blue';

// Better:
if (x === 0) {
    return 'red';
} else if (x === 1) {
    return 'green';
} else {
    return 'blue';
}

// Best:
switch (x) {
    case 0:
        return 'red';
    case 1:
        return 'green';
    default:
        return 'blue';
}
```



#### Abbreviating if statements
```angular2html
foo && bar(); // no
if (foo) bar(); // yes

foo || bar(); // no
if (!foo) bar(); // yes
```



#### Increment operator
```angular2html
// Unsure: what is happening?
return ++foo;

// Easy to understand
++foo;
return foo;
```



#### Checking for undefined
```angular2html
if (x === void 0) x = 0; // not necessary in ES5
if (x === undefined) x = 0; // preferable
```



#### Converting a number to an integer
```angular2html
return x >> 0; // no
return Math.round(x); // yes
```


#### Default values
```angular2html
function f(x) {
    x = x || 0;
    ...
}
```


#### Variables
```angular2html
// no
var foo = 3,
    bar = 2,
    baz;

// yes
var foo = 3;
var bar = 2;
var baz;
```

- Avoid
```angular2html
// Don’t do this
if (v) {
    var x = v;
} else {
    var x = 10;
}
doSomethingWith(x);

var x;
if (v) {
    x = v;
} else {
    x = 10;
}
doSomethingWith(x);
```



### Object Orientation
- Always use constructors.
- Always use new when creating an instance.



#### Avoid closures for private data
- should only be used to keep private data
- otherwise we should use normal functions
- closure make code more complex


#### Write parenthesis if a constructor has no arguments
```angular2html
var foo = new Foo;  // no
var foo = new Foo();  // yes
```


#### Miscellaneous
- Coercing
```angular2html
> +'123'  // no
123
> Number('123')  // yes
123

> ''+true  // no
'true'
> String(true)  // yes
'true'
```


#### Check for the existence of a property via `in` and `hasOwnProperty`
```angular2html
// All properties:
if (obj.foo)  // no
if (obj.foo !== undefined)  // no
if ('foo' in obj) ... // yes

// Own properties:
if (obj.hasOwnProperty('foo')) ... // risky for arbitrary objects
if (Object.prototype.hasOwnProperty.call(obj, 'foo')) ... // safe
```
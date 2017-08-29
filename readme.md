# Speaking JS ES5

## Part I

### Background
- ECMAScript is the official name of javascript
- ECMAScript is used to version JS, ES5 or ES6
- Js did not have exception handling until ES3, because it could not throw exceptions
- In other language you learn language features, but in JS you learn patterns
- JS is mixture of functional programming (higher-order functions; built-in map, reduce, etc.) and object-oriented programming (objects, inheritance).



### Statements, the do things
- `var foo`
```
var x;
if(y > 0)
    x = y
```

- Expressions, they produce values
    - `3 * 7`
    - `var x = y > 0 ? y: -y`
    - `foo(x, y)`



### Semicolons
- Should be used, tell js about the end of the line
- if an expression comes last in a statement, we will use semicolon
    - `var f = function(){};`



### Compound Assignment Operators
- `var x += 1`



### Identifiers and Variable Names
- first character can be unicode, `$`, `_`
- reserved words, `Infinity`, `NaN`, `undefined`



### Primitive Values Versus Objects
- the primitive values are boolean, numbers, strings, null and undefined
- all other values are objects
- the difference is that they are only unique to each other
```
var obj1 = {};  // an empty object
var obj2 = {};  // another empty object
obj1 === obj2   // false
obj1 === obj1   // true
```

- how ever all primitives encoded the same value will be same
```
var prim1 = 123, prim2 = 123;
prim1 === prim2  // true
```



### Primitive Values
- Boolean, `true, false`
- Number, `54, 23.3`
- String, `"asdf", 'asdf'`
- Two non-values, `undefined` and `null`
- they are always immutable
    - there property cannot be changes, added or removed
```
var str = 'abc';

str.length = 1; // try to change property `length`
str.length      // ⇒ no effect
3

str.foo = 3; // try to create property `foo`
str.foo      // ⇒ no effect, unknown property
'undefined'
```



### Objects
- all non-primitive values are objects
- are equal only to its own value, so every value has its own identity
- mutable by default
    - can change, add and remove properties
```
var obj = {};
obj.foo = 123; // add property `foo`
obj.foo
123
```

- `plain object` created by object literal
```
{
    firstName: 'Jane',
    lastName: 'Doe'
}
```

- `array`, created by array literal
    - `[ 'apple', 'banana', 'cherry' ]`

- `regular expression` which is created by regular expression literal
    - `/^a+b+$/`



### Nonvalues - undefined and null
- `undefined` mean no value, or read non-existing value
```
var foo;
foo
'undefined'

function f(x) { return x }
f()
'undefined'

var obj = {}; // empty object
obj.foo
'undefined'
```

- `undefined` and `null` have no properties, not even standard methods such as `toString()`.
- `null` is a special keyword that indicates an absence of value.
- [stackoverflow help](https://stackoverflow.com/questions/5076944/what-is-the-difference-between-null-and-undefined-in-javascript)
- `false, 0, NaN, '', null, undefined` are also considered false.



### Categorizing Values Using typeof and instanceof
- `typeof` mainly used for primitive values
- `instanceof` is manly used for object values
- `typeof null` returning `object` is a bug that can’t be fixed, but it is not an object
```
var b = new Bar();  // object created by constructor Bar
b instanceof Bar
true

{} instanceof Object
true
[] instanceof Array
true
[] instanceof Object  // Array is a subconstructor of Object
true
```



### Booleans
- primitive boolean type will provide boolean value
- some operators can provide boolean
    - binary logical operator `&&`, `||`
    - prefix logical operator `!`
    - comparison operator `==`, `!=`, `!==`, `===`, `>`, `>=`, `<=`, `<`



### Truthy and Falsy
- values interpreted as true are called truthy
- values interpreted as false are called falsy
- `Boolean()` function is used to get boolean result
- the value which will return false
    - undefined, null, false, 0, NaN, '' (empty string)
```
Boolean(3)
true
Boolean({}) // empty object
true
Boolean([]) // empty array
true
```



### Binary Logical Operators
- they are `short-circuiting`, meaning if first condition is determined then second will not be evaluated
    - this mean if first condition is `true` with `or` operator then it will return `true`
    - again if first condition is `false` with `and` operator then it will return `false`
- `&&`, if first is false, return it, otherwise return second
- `or`, if first is true, return it, otherwise return second



### Equality Operators
- they are of 2 type
    - normal, `==`, `!=`
    - strict, `  = = = ` ,  ` != = = `
- recommendation, always use strict



### Number
- All number in JS is floating point
    - `1 === 1.0`, will give true
- An error value
    - `NaN`, when a value cannot be converted to number, it will return `NaN`
    - `Infinity`, an number with is too large or too small is infinity



### Strings
- Strings can be created directly via string literals
- These literals can be single or double quotes
- single character can be accessed by brackets, like an array
- length can be calculated by `.length`
- `String Operators` can be joined by `+` operator



### Functions
- 2 ways to define function, declaration and assigning function expression
- in declaration, we can call function before declaration code
- in assigned, we cannot call the function before assigned code



### The Special Variable arguments
- function can be passed any number of arguments and can be accessed by `arguments`, is an array
- if nothing is passed `arguments` will return undefined
- assigning default values to function argument
```
function pair(x, y) {
    x = x || 0;  // (1)
    y = y || 0;
    return [ x, y ];
}
```


### Enforcing an Arity
```
function pair(x, y) {
    if (arguments.length !== 2) {
        throw new Error('Need exactly 2 arguments');
    }
    ...
}
```



### Converting arguments to an Array
- `arguments` is not array
```
function toArray(arrayLikeObject) {
    return Array.prototype.slice.call(arrayLikeObject);
}
```


### Strict Mode
- `user strict`, will make js more strict



### Variable Scoping and Closures
- variable is declared with `var`, `var x=1, y=2;`
- variable in declared in function will have its scope form its declaration line to the end of the function



### Closures
- the function retains is scope after leaving its scope



### Single Objects
- value can be set and get with objects
- a function can be a part of an object and can be called
- get new property will return `undefined`
- `property in object` will return true if it exists
- `delete` keyword will delete property
- object can have property with `key` and `value`
- property can be defined with `.` or `[]` can be used to get or set value



### Extracting Methods
- if method is extracted from object it loses its connection, and throw an error
```
var jane = {
names: "funcs",
describe: function(){
        'use strict';
        return this.names;
    }
}

var func = jane.describe;
func()
"TypeError: Cannot read property 'name' of undefined"
```

- we can use bind to extract method
```
var obj = {
  names:"Person named Jane"
}
var f = jane.describe.bind(obj);
f()
'Person named Jane'
```

- we can also bind methods, passing name with new object
```
var jane = {
names: "Jane",
describe: function(){
        'use strict';
        return this.names;
    },
tst: function(){
        return this.age() + " " + this.names;
    }
}

var obj = {
  names:"Obj",		// here we are passing name as well
  age: function(){
    return 89
  }
}
var f = jane.tst.bind(obj)
f();
"89 amir"
``` 

- bind method but not adding `names` will give error
```
var jane = {
names: "Jane",
describe: function(){
        'use strict';
        return this.names;
    },
tst: function(){
        return this.age() + " " + this.names;
    }
}


var obj = {			// note names property is missing
  age: function(){
    return 89
  }
}
var f = jane.tst.bind(obj)
f();
"89 undefined" 		// so names will be undefined
```

- **Note when binding, the binding function will not access methods from binded object** 
```
var jane = {
names: "Jane",
describe: function(){
        'use strict';
        return this.names;
    },
tst: function(){
        return this.age() + " " + this.describe();
    }
}


var obj = {
  age: function(){
    return 89
  }
}
var f = jane.tst.bind(obj)
f();
'Uncaught TypeError: this.describe is not a function'
```



### Functions Inside a Method
- this is a special variable in js, so when using in function inside method, always assign to a variable


### Arrays
- array are as objects
- array methods
    - `slice`
    - `push`
    - `pop`
    - `shift`
    - `unshift`
    - `indexOf`
    - `join`
- iterate can be done by `forEach(function(ele, i){})`


### Regular Expression
- `.test()` will return bool
- `.exec()` will match and capture group
- `.replace()` will search and replace